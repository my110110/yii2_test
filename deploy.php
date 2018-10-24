<?php
namespace Deployer;

require 'recipe/yii2-app-basic.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'git@github.com:my110110/yii2_test.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts

// 保存最近五次部署，这样的话回滚最多也只能回滚到前 5 个版本
set('keep_releases', 5);

// 实践证明，这样能减少一些不必要的麻烦,如出现权限相关的问题，也可将此项设置为 true 后尝试
set('writable_use_sudo', false);

// 生产用的主机
host('120.79.2.167')
    ->stage('dev')
    ->user('root')
    ->port(22)
    ->set('branch', 'master') // 最新的主分支部署到生产机
    ->set('deploy_path', '/var/www/html/yii2_test')
    ->identityFile('~/.ssh/id_rsa')
    ->forwardAgent(true)
    ->multiplexing(true)
    ->set('http_user', 'www') // 这个与 nginx 里的配置一致
    ->addSshOption('UserKnownHostsFile', '/dev/null')
    ->addSshOption('StrictHostKeyChecking', 'no');
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});
set('composer_options', 'install --verbose --prefer-dist --optimize-autoloader --no-progress --no-interaction');
task('deploy:copyenv', function () {
    run('cd {{release_path}}&& cp .env.dist .env');
})->desc('Run copyenv');
task('deploy:chomdweb', function () {
    run('cd {{deploy_path}}/current/&& chmod -R 777 *');
})->desc('Run chomdweb');
task('deploy:run_migrations', function () {
    run('{{bin/php}} {{release_path}}/yii migrate up --interactive=0');
})->desc('Run migrations');
task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:copyenv',
    'deploy:chomdweb',
    'deploy:run_migrations',
    'deploy:symlink',
    'cleanup',
    'success',
])->desc('Deploy your project');
// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');


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

set('keep_releases', 5);

set('writable_use_sudo', false);
// Hosts

host('120.79.2.167')
    ->stage('develop')
    ->user('root')
    ->port(22)
    ->set('branch', 'master') // 一般是把 develop 分支弄到测试机测试，没问题再合并
    ->set('deploy_path', '/var/www/html/yii2_test')
    ->identityFile('~/.ssh/id_rsa')
    ->forwardAgent(true)
    ->multiplexing(true)
    ->set('http_user', 'www/html')
    ->addSshOption('UserKnownHostsFile', '/dev/null')
    ->addSshOption('StrictHostKeyChecking', 'no');
    
// Tasks
task('install', function () {
    run('composer install');
});

task('opcache_reset', function () {
    run('{{bin/php}} -r \'opcache_reset();\'');
});

// 自定义任务：重启 php-fpm 服务
task('php-fpm:restart', function () {
    run('systemctl restart php-fpm.service');
});

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');


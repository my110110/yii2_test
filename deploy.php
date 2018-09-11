<?php
namespace Deployer;

require 'recipe/yii2-app-basic.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'my110110');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('172.16.3.2')
    ->stage('debug')
    ->user('root')
    ->port(22)
    ->set('branch', 'develop') // 一般是把 develop 分支弄到测试机测试，没问题再合并
    ->set('deploy_path', '/data/wwwroot/xxx')
    ->identityFile('/home/vagrant/.ssh/id_rsa')
    ->forwardAgent(true)
    ->multiplexing(true)
    ->set('http_user', 'www')
    ->addSshOption('UserKnownHostsFile', '/dev/null')
    ->addSshOption('StrictHostKeyChecking', 'no');
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');


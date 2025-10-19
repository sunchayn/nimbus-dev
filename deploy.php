<?php

namespace Deployer;

require_once __DIR__.'/vendor/autoload.php';

\Dotenv\Dotenv::createImmutable(__DIR__)->load();

require_once 'recipe/laravel.php';

desc('Creates the symbolic links configured for the application');
task('artisan:storage:link:relative', artisan('storage:link --relative', ['min' => 5.3]));

// Configuration
set('repository', 'git@github.com:sunchayn/nimbus-dev.git');
set('branch', 'base');
set('writable_mode', 'chmod');
set('root_path', getenv('DEPLOY_ROOT_PATH'));
set('ssh_hostname', getenv('DEPLOY_SSH_HOSTNAME'));
set('ssh_port', 65002);
set('ssh_username', getenv('DEPLOY_SSH_USERNAME'));
set('php_binary_path', getenv('DEPLOY_PHP_BINARY_PATH'));

// Hosts
host('prod')
    ->set('remote_user', '{{ssh_username}}')
    ->set('hostname', '{{ssh_hostname}}')
    ->set('port', '{{ssh_port}}')
    ->set('bin/php', '{{php_binary_path}}')
    ->set('deploy_path', '~/{{root_path}}')
    ->set('shell', 'bash --noprofile --norc');

// Tasks
task('build', function () {
    run('uptime');
});

desc('Deploy the application');

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:view:cache',
    'artisan:event:cache',
    'artisan:down',
    'artisan:migrate',
    'artisan:up',
    'deploy:publish',
]);

// Hooks
after('deploy:failed', 'deploy:unlock');

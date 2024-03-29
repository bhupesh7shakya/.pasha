<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/bhupesh7shakya/.pasha.git');

// add('shared_files', []);
// add('shared_dirs', []);
// add('writable_dirs', []);

// Hosts

host('${{ secrets.SSH_KNOWN_HOSTS }}')
    ->set('remote_user', 'ubuntu')
    ->set('deploy_path', '/home');
// task
task('my_task', function () {
    run('whoami');
});
// Hooks
after('deploy:failed', 'deploy:unlock');

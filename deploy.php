<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/bhupesh7shakya/.pasha.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('13.126.65.159')
    ->set('remote_user', 'ubuntu')
    ->set('deploy_path', '/var/www')
    ->set('stage', 'production');
// Hooks

after('deploy:failed', 'deploy:unlock');

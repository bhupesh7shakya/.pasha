<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/bhupesh7shakya/.pasha.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('13.126.220.81')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '/home/ubuntu')
    ->setSshMultiplexing(false);

// Hooks

after('deploy:failed', 'deploy:unlock');

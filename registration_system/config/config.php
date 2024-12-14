<?php
/*
*
* These are for the paths
*
*/

$projectRoot = str_replace('/public', '', dirname($_SERVER['SCRIPT_NAME']));
if (!defined('PROJECT_ROOT')) {
    define('PROJECT_ROOT', __DIR__ . '/../');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/cruz/registration_system/');
}

if (!defined('TEMPLATES_PATH')) {
    define('TEMPLATES_PATH', PROJECT_ROOT . 'cruz/registration_system/templates/');
}

if (!defined('SRC_PATH')) {
    define('SRC_PATH', PROJECT_ROOT . 'cruz/registration_system/src/');
}

if (!defined('PUBLIC_PATH')) {
    define('PUBLIC_PATH', PROJECT_ROOT . 'registration_system/public/');
}

return [
    'app' => [
        'default_title' => 'Registration Website',
    ],
    'db' => [
        'host' => 'localhost',
        'user' => '201cruz',
        'password' => 'cruz',
        'name' => 'members_cruz',
        'charset' => 'utf8'
    ],
];
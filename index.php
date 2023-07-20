<?php
ini_set('display_errors','On');

require_once "vendor/autoload.php";

use core\Application;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$config = $dotenv->load();

$config = [
    'db' => [
        'dsn' => $config['DB_DSN'],
        'username' => $config['DB_USER'],
        'password' => $config['DB_PASSWORD']
    ]
];

$project = new Application(__DIR__,$config);
$project->run();



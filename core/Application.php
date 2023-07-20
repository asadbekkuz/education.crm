<?php

namespace core;

use controllers\Controller;
use controllers\SiteController;
use core\db\Connection;

session_start();

class Application
{

    public string $defaultController = 'SiteController';
    public string $defaultAction = 'index';
    private Connection $db;

    private Controller $controller;

    public function __construct($path,$config)
    {
        $this->db = new Connection($config['db']);
        $this->controller = new Controller();
        $this->controller->view->path = $path;
    }

    public function run()
    {

        $request = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));

        if ($request[0] === '' || ($request[0] === 'index.php' && !isset($request[1]))) {
            $className = 'controllers\\' . $this->defaultController;
            $action = $this->defaultAction;
        } else {
            $index = 0;
            if ($request[0] !== 'index.php') {
                $index = 1;
            }
            $className = 'controllers\\' . ucfirst($request[1 - $index]) . 'Controller';
            $action = $request[2 - $index] ?? 'index';
            if (strpos($action, '?') != false) {
                $action = substr($action, 0, strpos($action, '?'));
            }
        }

//        if(!isset($_SESSION['isLogged']))
//        {
//            $className = 'controllers\\' . $this->defaultController;
//            $action = 'login';
//        }
        $obj = new $className;
        $obj->{$action}();
    }

    public function writeLog(string $errorMessage)
    {
        //Something to write to txt log
        $log = "User: " . $_SERVER['REMOTE_ADDR'] . ' - ' . date("F j, Y, g:i a") . PHP_EOL .
            "Message: " . $errorMessage .
            "-------------------------" . PHP_EOL;
        //Save string to log, use FILE_APPEND to append.
        file_put_contents('./debug/log_' . date("j.n.Y") . '.log', $log, FILE_APPEND);
    }
}
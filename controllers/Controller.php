<?php

namespace controllers;

use core\View;

class Controller
{
    public View $view;
    public function __construct()
    {
        $this->view = new View();
    }

    public function render(string $action,array $data = null)
    {
        $actionName = strtolower($this->getClassName()).'/'.$action;
        $this->view->render($actionName,$data);
    }
    public function renderLogin(string $action,array $data = null)
    {
        $actionName = strtolower($this->getClassName()).'/'.$action;
        $this->view->renderLogin($actionName,$data);
    }

    public function getClassName()
    {
        return str_replace('Controller','',str_replace('controllers\\','',get_class($this)));
    }
}
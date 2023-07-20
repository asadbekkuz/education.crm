<?php

namespace core;

class View
{
    public string $path = '';
    public function render($actionName,$data)
    {
        if($data !== null)
        {
            extract($data);
        }

        include dirname(__DIR__).'/views/layouts/base.php';
        include dirname(__DIR__)."/views/{$actionName}.php";
        include dirname(__DIR__)."/views/layouts/baseFooter.php";
    }

    public function renderLogin($actionName,$data)
    {
        if($data !== null)
        {
            extract($data);
        }

        include dirname(__DIR__).'/views/layouts/_header.php';
        include dirname(__DIR__)."/views/{$actionName}.php";
        include dirname(__DIR__)."/views/layouts/__footer.php";
    }

}
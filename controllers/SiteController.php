<?php

namespace controllers;

use models\User;
use PDO;

class SiteController extends Controller
{
    public function index()
    {
        $this->render('index');
    }

    public function login()
    {
        $this->renderLogin('login');
    }

    public function checkUser()
    {
        if (isset($_POST['login'])) {
            $model = new User();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $stmt = $model->checkUser($username, $password);
            if ($stmt->rowCount() > 0) {
                $_SESSION['isLogged'] = 1;
                header('Location: /index.php/site/index');
                exit();
            } else {
                $_SESSION['login_errors'] = 'Username or password incorrect';
            }
        } else {
            $_SESSION['login_errors'] = 'Fill the input field';
        }
        header("Location: /index.php/site/login");
        exit();
    }

    public function logout()
    {
        if (isset($_SESSION['isLogged'])) unset($_SESSION['isLogged']);
        header("Location: /index.php/site/login");
        exit();
    }
}
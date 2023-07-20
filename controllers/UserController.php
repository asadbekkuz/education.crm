<?php

namespace controllers;


use models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = new User();
        $users = $user->getList();
        $pageCount = $user->getPageCount();
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
            $users = $user->getListByPage($page);
        }
        $this->render('index', [
            'users' => $users,
            'pageCount' => $pageCount]);
    }

    public function create()
    {
        $user = new User();
        if (isset($_POST['user_create'])) {
            $user->loadData($_POST);
            if ($user->save()) {
                $_SESSION['message'] = 'User was created succesfully';
            } else {
                $_SESSION['error'] = 'User was not created';
            }
            header("Location: /index.php/user/index");
            exit();
        }
        $this->render('create');
    }

    public function update()
    {
        $user = new User();
        if (isset($_POST['user_update'])) {

            $user->loadData($_POST);

            if ($user->updateById($_POST['id'])) {
                $_SESSION['message'] = 'Update user successfully';
            } else {
                $_SESSION['error'] = 'User didn\'t update';
            }
            header("Location:/index.php/user/index");
            exit();
        }
        $this->render('update', [
            'user' => $user->getById($_GET['id'])]);
    }

    public function view()
    {
        $user = new User();
        $this->render('view', ['user' => $user->getById($_GET['id'])]);
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            if (User::find()->delete($_GET['id'])) {
                $_SESSION['message'] = 'User was successfully deleted';
            } else {
                $_SESSION['error'] = "User cannot be deleted";
            }
            header("Location:/index.php/user/index");
            exit();
        }
    }
}
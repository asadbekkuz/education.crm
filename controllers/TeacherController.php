<?php

namespace controllers;

use models\Teacher;

class TeacherController extends Controller
{


    public function index()
    {
        $teacher = new Teacher();
        $teachers = $teacher->getList();
        $pageCount = $teacher->getPageCount();
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
            $teachers = $teacher->getListByPage($page);
        }
        $this->render('index', [
            'teachers' => $teachers,
            'pageCount' => $pageCount]);
    }

    public function update()
    {
        $teacher = new Teacher();
        if (isset($_POST['teach_update'])) {
            $teacher->loadData($_POST);
            if ($teacher->updateById($_POST['teacher_id'])) {
               $_SESSION['message'] = 'Teacher was updated';
            }else{
                $_SESSION['error'] = 'Teacher didn\'t updated';
            }
            header("Location:/index.php/teacher/index");
            exit();
        }
        $this->render('update', [
            'teacher' => $teacher->getById($_GET['id'])]);
    }

    public function create()
    {
        $teacher = new Teacher();

        if (isset($_POST['teach_create'])) {
            $teacher->loadData($_POST);
            if ($teacher->save()) {
                $_SESSION['message'] = 'Teacher was created successfully';
            } else {
                $_SESSION['error'] = 'Teacher was not created';
            }
            header("Location: /index.php/teacher/index");
            exit();

        }
        $this->render('create');
    }

    public function view()
    {
        $teacher = new Teacher();
        $this->render('view', ['teacher' => $teacher->getById($_GET['id'])]);
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            if (Teacher::find()->delete($_GET['id'])) {
                $_SESSION['message'] = 'Teacher was successfully deleted';
            } else {
                $_SESSION['error'] = "Teacher cannot be deleted";
            }
            header("Location:/index.php/teacher/index");
            exit();
        }
    }
}
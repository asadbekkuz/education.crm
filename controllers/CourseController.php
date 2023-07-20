<?php

namespace controllers;


use components\Component;
use models\Course;
use models\Teacher;


class CourseController extends Controller
{
    public function  index()
    {
        $course = new Course;
        $courses = $course->getList();
        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $page =  $_GET['page'];
            $courses = $course->getListByPage($page);
        }
        $this->render('index',[
            'courses' =>$courses,
            'pageCount' => $course->getPageCount()]);
    }

    public function create()
    {
        $course = new Course();
        $teachers = Teacher::find()->all();
        if (isset($_POST['course_create'])) {
            $course->loadData($_POST);
            if ($course->save()) {
                $_SESSION['message'] = 'Course was created succesfully';
            } else {
                $_SESSION['error'] = 'Course was not created';
            }
            header("Location: /index.php/course/index");
            exit();
        }
        $this->render('create',[
            'teachers'=> $teachers
        ]);
    }
    public function update()
    {
        $course = new Course();
        if (isset($_POST['course_update'])) {

            $course->loadData($_POST);

            if ($course->updateById($_POST['course_id'])) {
                $_SESSION['message'] = 'Course was updated successfully';
            } else {
                $_SESSION['error'] = 'Course didn\'t update';
            }
            header("Location:/index.php/course/index");
            exit();
        }
        $this->render('update', [
            'course' => $course->getById($_GET['id'])]);
    }
    public function view()
    {
        $course = new Course();
        $this->render('view', ['course' => $course->getById($_GET['id'])]);
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            if (Course::find()->delete($_GET['id'])) {
                $_SESSION['message'] = 'Course was successfully deleted';
            } else {
                $_SESSION['error'] = "Course cannot be deleted";
            }
            header("Location:/index.php/course/index");
            exit();
        }
    }

    public function sort()
    {
        if(isset($_POST['column']) && isset($_POST['order']) && isset($_POST['page']))
        {
            $course = new Course();
            $limit = Component::LIMIT;
            $column = $_POST['column'];
            $order = $_POST['order'];
            $page = (int)$_POST['page'];
            if(!($page > 1)){
                $page = 1;
            }
            $offset = ($page - 1) * $limit;
            $courses = $course->sortBySql($offset,$column,$order);
            $this->render('index',[
                'courses'=>$courses,
                'pageCount' => $course->getPageCount()
            ]);
        }
    }
}
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
        $this->render('index',[
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
        if(isset($_POST['columnName']) && isset($_POST['sort']) && isset($_POST['page']))
        {
            $course = new Course();
            $limit = Component::LIMIT;
            $column = $_POST['columnName'];
            $order = $_POST['sort'];
            $page = (int)$_POST['page']; // if false, then it will be 0.
            if(!($page > 1)){
                $page = 1;
            }
            $offset = ($page - 1) * $limit;
            $courses = $course->sortBySql($offset,$column,$order);
            $response = '';
            foreach ($courses as $course) {
                $response .= '<tr>';
                $response .= "<td>".$course['course_id']."</td>";
                $response .= "<td>".$course['course_name']."</td>";
                $response .= "<td>".substr($course['description'],0,20)."</td>";
                $response .= "<td>".$course['duration']."</td>";
                $response .= "<td>".$course['start_date']."</td>";
                $response .= "<td>".$course['end_date']."</td>";
                $response .= "<td>".$course['name']."</td>";
                $response .= "<td>".$course['fee']."</td>";
                $response .= "<td style='display: flex;'>
                            <a href='/index.php/course/update?id=".$course['course_id'] ."' class='btn btn-info'><i class='fas fa-pen'></i></a>
                            <a href='/index.php/course/delete?id=".$course['course_id'] ."' class='btn btn-danger mx-2'><i class='fas fa-trash'></i></a>
                            <a href='/index.php/course/view?id=".$course['course_id'] ."' class='btn btn-primary'><i class='fas fa-eye'></i></a>                           
                        </td>";
                $response .= '</tr>';
            }
            echo $response;
        }
    }

    public function filter()
    {
        if(isset($_POST['search_column']))
        {
            $searchColumn = $_POST['search_column'];
            $searchValue = $_POST['search_value'];
            $course = new Course();
            $courses = $course->getByFilter($searchColumn,$searchValue);

            $this->render('index',[
                'courses' =>$courses,
                'pageCount' => $course->getPageCount()
            ]);
        }

    }
}
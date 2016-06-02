<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 5/31/16
 * Time: 11:32 PM
 */


if(isset($_POST['add_course'])||isset($_POST['delete'])||isset($_POST['update_course'])) {
    
    include_once '../models/autoload.php';
    if (isset($_POST['add_course'])) {


        $data['title'] = htmlspecialchars($_POST['title']);
        $data['from_d'] = htmlspecialchars($_POST['from']);
        $data['to_d'] = htmlspecialchars($_POST['to']);
        $data['hours'] = htmlspecialchars($_POST['hours']);
        $data['content'] = htmlspecialchars($_POST['content']);

        $add = new add($data, 'courses');
        if ($add) {
            header("location:../index.php");
        }
    } elseif (isset($_POST['delete'])) {


        $tbname = $_POST['tb_name'];
        $id = $_POST['course_id'];
        $tmp = new delete($tbname);
        $tmp->deleteRecordById($id);
        if ($tmp) {
            header('location:../index.php');
        }
    } elseif (isset($_POST['update_course'])) {


        $course_id = $_POST['course_id'];
        $data['title'] = htmlspecialchars($_POST['title']);
        $data['from_d'] = htmlspecialchars($_POST['from']);
        $data['to_d'] = htmlspecialchars($_POST['to']);
        $data['hours'] = htmlspecialchars($_POST['hours']);
        $data['content'] = htmlspecialchars($_POST['content']);


        try {
            $action = new update('courses');
            $result = $action->editData($data, $course_id);
            if ($result) {
                header('location:../index.php');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
else
{

    
    // multiple pages
    $data=new display('courses');
    $num_of_courses=count($data->getAllData());
    $num_of_courses_each_page=2;
    $num_of_pages=ceil($num_of_courses/$num_of_courses_each_page);
    $page=1;
    if(isset($_GET['page']))
    {
        $page=htmlspecialchars($_GET['page']);
    }
    $start=$page-1;
    $start *=$num_of_courses_each_page;

    if(isset($_POST['search']))
    {
        $title=htmlspecialchars($_POST['content']);
        $courses=$data->search('title',$title);

    }
    else
    {
        $courses=$data->getDataLimit($start,$num_of_courses_each_page);
    }

    if(isset($_POST['edit']))
    {
        $course_id=$_POST['course_id'];
        $course_data=getCourseData($course_id);
    }
    include_once 'views/admin.php';
    
}

function getCourseData($course_id)
{
    $op=new display('courses');
    return $op->getRecordById($course_id);
}
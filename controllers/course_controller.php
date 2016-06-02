<?php

/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 6/1/16
 * Time: 1:55 PM
 */
if(isset($_POST['insert_task'])||isset($_POST['insert_students'])||isset($_POST['delete'])||isset($_POST['delete_monk'])||isset($_POST['do_task'])) {
    
    include_once '../models/autoload.php';
    
    if (isset($_POST['insert_task'])) {
        session_start();

        $data['title'] = htmlspecialchars($_POST['title']);
        $data['score'] = htmlspecialchars($_POST['score']);
        $data['description'] = htmlspecialchars($_POST['desc_task']);
        $data['createdBy'] = $_SESSION['user_id'];
        $data['course_id'] = $_POST['id'];
        $action = new add($data, 'tasks');

        $action = new display('tasks');
        $task_id = $action->getLastRecord()->id;

        $action = new display('courses_students');
        $monks = $action->getDataByColumn('course_id', $data['course_id']);

        foreach ($monks as $monk) {
            $details['monk_id'] = $monk->monk_id;
            $details['course_id'] = $data['course_id'];
            $details['task_id'] = $task_id;
            $action = new add($details, 'tasks_students');
        }
        header('location:../index.php?p=course&&cid=' . $data['course_id']);
    } elseif (isset($_POST['insert_students'])) {
        session_start();

        $check = $_POST['check'];

        if (!empty($check)) {
            foreach ($check as $member) {
                $data['course_id'] = $_POST['id'];
                $data['monk_id'] = $member;
                $action = new add($data, 'courses_students');
            }
        }

        header('location:../index.php?p=course&&cid=' . $data['course_id']);
    } elseif (isset($_POST['delete'])) {

        $tbname = $_POST['tb_name'];
        $id = $_POST['task_id'];
        $cid = $_POST['course_id'];
        $tmp = new delete($tbname);
        $tmp->deleteRecordById($id);
        if ($tmp) {
            header('location:../index.php?p=course&&cid=' . $cid);
        }
    } elseif (isset($_POST['delete_monk'])) {

        $id = $_POST['id'];
        $cid = $_POST['course_id'];
        $tmp = new delete('courses_students');
        $tmp->deleteRecordById($id);
        if ($tmp) {
            header('location:../index.php?p=course&&cid=' . $cid);
        }
    } elseif (isset($_POST['do_task'])) {
      
        $action = $_POST['action'];
        $monk_id = $_POST['monk_id'];
        $course_id = $_POST['course_id'];
        $task_id = $_POST['task_id'];

        $data = new display('tasks');
        $task_score = $data->getRecordById($task_id)->score;

        $data = new display('courses_students');
        $monk_data = $data->getDataByWhere("monk_id='$monk_id' AND course_id=$course_id")[0];
        $monk_score = $monk_data->score;

        if ($action == 'Done') {
            $status = 1;
            $new_score = $task_score + $monk_score;
        } else {
            $status = 0;
            $new_score = $monk_score - $task_score;
        }

        $values['score'] = $new_score;
        $data = new update('courses_students');
        $data->editData($values, $monk_data->id);

        $data = new display('tasks_students');
        $monk_data = $data->getDataByWhere(" monk_id=$monk_id AND course_id=$course_id AND task_id=$task_id")[0];
        $value['status'] = $status;

        $data = new update('tasks_students');
        $data->editData($value, $monk_data->id);

        header("location:" . $_SERVER['HTTP_REFERER']);
    }
}
else
{
    if(isset($_GET['cid']))
    {
        $id=htmlspecialchars($_GET['cid']);
        $data=new display('courses');
        $course=$data->getRecordById($id);
        if(empty($course))
            header('location:index.php');
        $data=new display('tasks');
        $tasks=$data->getDataLimit(0,6,'id','course_id='.$id);
        
        $data=new display('courses_students');
        $students=$data->getDataByColumn('course_id',$id);
        $num_all_students=count($students);
        $num_students_in_each_page=6;
        $num_all_pages=ceil($num_all_students/$num_students_in_each_page);
        $page=1;
        if(isset($_GET['page']))
        {
            $page=htmlspecialchars($_GET['page']);
        }
        $start=$page-1;
        $start *=$num_students_in_each_page;
        $rows=$data->getDataLimit($start,$num_students_in_each_page,'id','course_id='.$id);
        
      

        include_once 'views/course.php';
    }
    else{header('location:index.php');}

}
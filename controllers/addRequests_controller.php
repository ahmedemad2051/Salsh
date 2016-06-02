<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 6/2/16
 * Time: 4:21 PM
 */
if(isset($_GET['action']))
{
    session_start();
    include_once '../models/autoload.php';

    $value['monk_id']=$_SESSION['user_id'];
    $value['course_id']=$_GET['cid'];

    if($_GET['action']=='cancel')
    {
        $data=new display('requests');
        $row=$data->getDataByWhere("monk_id=".$value['monk_id']." AND course_id=".$value['course_id'])[0];

        $data=new delete('requests');
        $data->deleteRecordById($row->id);
    }
    elseif($_GET['action']=='add')
    {
        $data=new add($value,'requests');
    }
  header('location:'.$_SERVER['HTTP_REFERER']);
    //header('location:../index.php?p=addRequests');
}
else
{
    $monk_id=$_SESSION['user_id'];
    $data=new display('courses_students');
    $my_courses=$data->getDataByColumn('monk_id',$monk_id);
    $data=new display('courses');
    $all_courses=$data->getAllData();
    include_once 'views/addRequests.php';
}
<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 6/2/16
 * Time: 5:34 PM
 */
if(isset($_GET['action']))
{
    include_once '../models/autoload.php';
    $value['course_id']=htmlspecialchars($_GET['cid']);
    $value['monk_id']=htmlspecialchars($_GET['monk_id']);

    $data=new display('requests');
    $row=$data->getDataByWhere("monk_id=".$value['monk_id']." AND course_id=".$value['course_id'])[0];

    $data=new delete('requests');
    $data->deleteRecordById($row->id);

    if($_GET['action']=='accept')
    {
        $data=new add($value,'courses_students');
    }
    header('location:'.$_SERVER['HTTP_REFERER']);
}
else
{
    $course_id=htmlspecialchars($_GET['cid']);
    $data=new display('requests');
    $requests=$data->getDataByColumn('course_id',$course_id);
    include_once 'views/requests.php';
}
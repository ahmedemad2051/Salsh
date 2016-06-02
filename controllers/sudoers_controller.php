<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 6/2/16
 * Time: 9:16 AM
 */
if(isset($_POST['make_sudo'])||isset($_POST['delete'])||isset($_POST['back'])) {
    include_once '../models/autoload.php';
    if (isset($_POST['make_sudo'])) {

        $cid = $_POST['cid'];
        $data = new update('courses_students');
        $action = new display('courses_students');
        $check = $_POST['check'];
        if (!empty($check)) {
            foreach ($check as $member) {
                $id = $action->getDataByWhere("monk_id=$member AND course_id=$cid")[0]->id;
                $values['sudo'] = 1;
                $data->editData($values, $id);
            }
        }


        header('location:../index.php?p=sudoers&&cid=' . $cid);

    } elseif (isset($_POST['delete'])) {


        $action = new display('courses_students');
        $data = new update('courses_students');

        $cid = $_POST['cid'];
        $sudoer_id = $_POST['sudoer_id'];

        $id = $action->getDataByWhere("monk_id=$sudoer_id AND course_id=$cid")[0]->id;

        $values['sudo'] = 0;
        $data->editData($values, $id);

        header('location:' . $_SERVER['HTTP_REFERER']);
    } elseif (isset($_POST['back'])) {
        $cid = $_POST['cid'];
        header('location:../index.php?p=course&&cid=' . $cid);
    }
}
else
{
    
    $cid=htmlspecialchars($_GET['cid']);
    $data=new display('courses_students');
    $monks_in_course=$data->getDataByWhere("course_id=$cid AND sudo=0");
    $get_sudoers_id=$data->getDataByWhere("course_id='$cid' AND sudo=1");
    $all_in_course=[];
    foreach($monks_in_course as $monk)
    {
        $all_in_course[]=$monk->monk_id;
    }
    $data=new display('monks');
    $allmonks=$data->getDataByColumn('admin',0);
    include_once 'views/sudoers.php';
}
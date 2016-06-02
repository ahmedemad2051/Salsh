<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 6/2/16
 * Time: 10:19 AM
 */

  
    
    $id=$_SESSION['user_id'];
    $data=new display('courses_students');
    $all_courses=$data->getDataByColumn('monk_id',$id);

    if(isset($_GET['cid']))
    {
        $course_id=htmlspecialchars($_GET['cid']);
        $monk_data=$data->getDataByWhere("course_id=$course_id AND monk_id=$id")[0];
        $score=$monk_data->score;
        
        
        $data=new display('courses');
        $course_data=$data->getRecordById($course_id);
        $data=new display('tasks_students');
        $tasks=$data->getDataByWhere("course_id=$course_id AND monk_id=$id order by id desc");
        
    }
    
    include_once  'views/monk_page.php';

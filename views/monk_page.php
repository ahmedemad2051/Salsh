<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 6/2/16
 * Time: 10:21 AM
 */
$num_of_courses=count($all_courses);
if($num_of_courses>1)
{
    foreach($all_courses as $course)
    {
        $data=new display('courses');
        $course_info=$data->getRecordById($course->course_id);

        echo "<a class='btn btn-primary btn-style' href='?cid=$course_info->id'>$course_info->title</a>";
    }

    if(isset($_GET['cid']))
    {
        
        include 'views/monk_course.php';
    }
}
elseif($num_of_courses==1)
{

    $course_id=$all_courses->course_id;

    // check if user come to monk page without course id or wrong course id
    if(!isset($_GET['course_id']) || $_GET['course_id']!=$course_id)
    {
        header("location:index.php?course_id=$course_id");
    }

    include "monk_course.php";
}
else
{
    echo "<p class='wait'>wait</p>";
}
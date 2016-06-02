<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 5/31/16
 * Time: 11:15 PM
 */
?>

<form class="form-inline" style="float:left" method="post" action="">
    <input type="submit" name="create_course" value="create course" class="btn btn-success btn-lg btn-style">
</form>

<?php

if(isset($_POST['create_course']))
{
    include 'views/create_course.php';
}
?>

<form class="form-inline form-search" method="post" action="">
    <div class="form-group">
        <input type="search" name="content" class="form-control" id="exampleInputEmail2" placeholder="search from here!">
    </div>
    <button type="submit" name="search" class="btn btn-default">Search</button>
</form>

<table class="table table-bordered table-hover">
    <td>Id</td>
    <td>name</td>
    <td>students</td>
    <td>tasks</td>
    <td>sudoers</td>
    <td>actions</td>
    <?php


   

    foreach($courses as $course)
    {
        echo "<tr>";
        echo "<td>$course->id</td>";
        echo "<td><a href='index.php?p=course&&cid=$course->id'>$course->title</a></td>";
        $data=new display('courses_students');
        $num_students=count($data->getDataByColumn('course_id',$course->id));
        echo "<td>$num_students</td>";

        $data=new display('tasks');
        $num_tasks=count($data->getDataByColumn('course_id',$course->id));
        echo "<td>$num_tasks</td>";

        $data=new display('courses_students');
        $num_sudoers=count($data->getDataByWhere("course_id=$course->id AND sudo=1"));
        echo "<td>$num_sudoers</td>";

        echo

        "<td>
                        <form action='' method='post'>
                            <input type='hidden' name='course_id' value='$course->id'> 
                            <input class='link' type='submit' name='edit' value='edit'>
                        </form>
                        <form method='post' action='controllers/admin_controller.php'>
                            <input type='hidden' name='course_id' value='$course->id'> 
                            <input type='hidden' name='tb_name' value='courses'> 
                            <input class='link link_alert' type='submit' name='delete' value='delete'>
                        </form>
                     </td>    
                    ";
        echo "</tr>";
    }
    ?>
</table>

<ul style="list-style: none;" class="navbar-nav navbar-brand nav-tabs navbar-default nav-pills">
    <?php
    for($i=1;$i<=$num_of_pages;$i++)
    {
        if($i==$page)
        {
            echo "<li style='color:red'>$i</li>";
        }
        else
        {
            echo "<li><a href='?page=$i'>$i</a></li>";
        }
    }
    ?>
</ul>

<?php

if(isset($_POST['edit']))
{
    include 'views/edit.php';
}

?>

<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 6/1/16
 * Time: 2:12 PM
 */
?>


<div class="info-style edit-info-style">
    <span>course name:</span>
    <p><?php echo $course->title ?></p>
    <div class="clearfix"></div>
    <span>hours:</span>
    <p><?php echo $course->hours ?></p>
    <div class="clearfix"></div>
    <span>description:</span>
    <textarea class="form-control" style="height:70px;width:27%" readonly><?php echo $course->content ?></textarea>
</div>

<form method="post" action="">
    <input type="submit" name="add_task" value="add task" class="btn btn-success btn-lg btn-style">
    <input type="submit" name="course_tasks" value="show tasks" class="btn btn-success btn-lg btn-style">
    <input type="submit" name="add_students" value="add students" class="  btn btn-success btn-lg btn-style">

</form>

<?php
    if(isset($_POST['add_task']))
    {
        include 'views/add_task.php';
    }
    elseif(isset($_POST['course_tasks']))
    {
        include 'views/course_tasks.php';
    }
    elseif(isset($_POST['add_students']))
    {
        include 'views/add_students.php';
    }
?>

<table class="table table-bordered table-hover">
    <?php

    echo '<tr>';
    echo "<td>Monks</td>";
    foreach($tasks as $task)
    {
        echo "<td>$task->title</td>";
    }
    echo "<td>Score</td>";
    echo "<td>Required</td>";
    echo "<td>Delete</td>";
    echo '</tr>';
    foreach($rows as $row)
    {
        echo "<tr>";

        $data=new display('monks');
        $monk_info=$data->getRecordById($row->monk_id);
        echo "<td>$monk_info->name</td>";

        foreach($tasks as $task)
        {
            $data=new display('tasks_students');
            $status=@$data->getDataByWhere("task_id=$task->id AND course_id=$id AND monk_id=$monk_info->id")[0]->status;

            if($status!='')
            {
                if($status==0)
                {
                    $action="Done";
                }
                else{$action="unDone";}
              //  echo "<td><a href='do_task.php?task_id=$task->id&course_id=$id&monk_id=$monk_info->id&action=$action'>$action</a></td>";
                echo "
                <td>
                    <form method='post' action='controllers/course_controller.php'>
                        <input type='hidden' name='course_id' value='$course->id'> 
                       <input type='hidden' name='task_id' value='$task->id'> 
                       <input type='hidden' name='monk_id' value='$monk_info->id'> 
                       <input type='hidden' name='action' value='$action'> 
                        <input class='link' type='submit' name='do_task' value='$action'>
                    </form>
                </td>
        ";
            }
            else{echo "<td>_</td>";}

        }


        $allTasks=$data->getDataByWhere("course_id=$id AND monk_id=$row->monk_id");

        $allScore=0;
        foreach($allTasks as $task)
        {
            $data=new display('tasks');
            $score=$data->getDataByWhere("course_id=$id AND id=$task->task_id")[0]->score;

            $allScore +=$score;
        }


        $monk_score=$row->score;
        echo "<td>$monk_score</td>";
        $score_required=$allScore-$monk_score;
        echo "<td>$score_required</td>";
        echo "
        <td>
           <form method='post' action='controllers/course_controller.php'>
                            <input type='hidden' name='course_id' value='$course->id'> 
                           <input type='hidden' name='id' value='$row->id'> 
                            <input class='link link_alert' type='submit' name='delete_monk' value='delete'>
                        </form>
</td>
        ";
        echo "</tr>";
    }

    ?>

</table>

<ul style="list-style: none;" class="navbar-nav navbar-brand nav-tabs navbar-default nav-pills">
    <?php
    for($i=1;$i<=$num_all_pages;$i++)
    {
        if($i==$page)
        {
            echo "<li style='color:red'>$i</li>";
        }
        else
        {
            $id=$_GET['id'];
            echo "<li><a href='?id=$id&page=$i'>$i</a></li>";
        }
    }
    ?>
</ul>    

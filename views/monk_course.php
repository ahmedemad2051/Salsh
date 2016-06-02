<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 6/2/16
 * Time: 10:31 AM
 */
?>

<div class="info-style edit-info-style">
    <span>course name:</span>
    <p><?php echo $course_data->title ?></p>
    <div class="clearfix"></div>
    <span>hours:</span>
    <p><?php echo $course_data->hours ?></p>
    <div class="clearfix"></div>
    <span>description:</span>
    <textarea readonly><?php echo $course_data->content ?></textarea>
</div>



<table class="table table-bordered table-hover tbl-edit">
    <?php

    echo '<tr>';
    echo "<td>Title</td>";
    echo "<td>Score</td>";
    echo "<td>Content</td>";
    echo "<td>Status</td>";

    echo '</tr>';

    $allScore=0;
    foreach($tasks as $task)
    {
        $data=new display('tasks');
        $task_info=$data->getRecordById($task->task_id);

        echo "<tr>";
        echo "<td>$task_info->title</td>";
        echo "<td>$task_info->score</td>";
        echo "<td><textarea readonly>$task_info->description</textarea></td>";
        if($task->status==1)
            echo "<td style='color:green'>Done</td>";
        else
            echo "<td style='color:red'>un Done</td>";
        echo "</tr>";
        $allScore +=$task_info->score;
    }

    $required=$allScore-$score;
    ?>
</table>

<div class='details'>
    <span>all Score</span>
    <h2><?php echo $score; ?></h2>
    <span>Required</span>
    <h2><?php echo $required; ?></h2>
</div>
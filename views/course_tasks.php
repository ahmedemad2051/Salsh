
<table class="table table-bordered table-hover">


        
        

           <td>Title</td>
           <td>Score</td>
           <td>Created By</td>
           <td>Created At</td>
          <td>Delete</td>
        

        <?php
        foreach($tasks as $task)
        {
            echo "<tr>";
                echo "<td>$task->title</td>";
                echo "<td>$task->score</td>";
                echo "<td>$task->createdBy</td>";
                echo "<td>$task->created_at</td>";
                //echo "<td><a href='delete.php?tablename=tasks&course_id=$id&task_id=$task->id'>delete</a></td>";
           echo "<td><form method='post' action='controllers/course_controller.php'>
                            <input type='hidden' name='task_id' value='$task->id'> 
                            <input type='hidden' name='tb_name' value='tasks'> 
                            <input type='hidden' name='course_id' value=$course->id> 
                            <input class='link link_alert' type='submit' name='delete' value='delete'>
                        </form></td>";

            echo "</tr>";
        }
        ?>

</table>
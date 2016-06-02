<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 6/2/16
 * Time: 4:23 PM
 */
?>


    <table class="table table-bordered table-hover">
        <tr>
            <td>Course</td>
            <td>Action</td>
        </tr>
        <?php


        $courses_id=array();
       foreach($my_courses as $course)
        {
            $courses_id[]=$course->course_id;
        }

        foreach($all_courses as $course)
        {
            if(!in_array($course['id'],$courses_id))
            {
                echo "<tr>";
                echo "<td>".$course["title"]."</td>";
                $data=new display('requests');
                $is_founded=$data->getDataByWhere("monk_id='$monk_id' AND course_id='".$course['id']."'");
                $cid=$course['id'];


                
                    
                      if(count($is_founded)>0)
                          echo "<td><a class='btn btn-danger' href='controllers/addRequests_controller.php?cid=$cid&action=cancel'>cancel</a></td>";
                         else
                             echo "<td><a class='btn btn-primary' href='controllers/addRequests_controller.php?cid=$cid&action=add'>add</a></td>";
                echo "</tr>";
            }



        }
        ?>
    </table>

    <a class="btn btn-danger" href="index.php">back</a>


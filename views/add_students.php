<form method="post" action="controllers/course_controller.php">
    <input type="hidden" name="id" value="<?php echo $course->id; ?>">
    <table class="table table-bordered table-hover">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Check</td>
        </tr>
        <?php

        $action=new display('courses_students');
        $monks_in_course=$action->getDataByColumn("course_id",$course->id);
        $all_in_course=[];
        foreach($monks_in_course as $monk)
        {
            $all_in_course[]=$monk->monk_id;
        }
        $action=new display('monks');
        $monks=$action->getDataByColumn("admin",0);
        foreach($monks as $monk)
            {
                if(!in_array($monk->id,$all_in_course))
                {
                    echo "<tr>";
                    echo "<td>$monk->id</td>";

                    echo "<td>$monk->name</td>";
                    echo "<td><input class='big-checkbox' type='checkbox' name='check[]' value='$monk->id'></td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
    
    <input class="btn  btn-primary btn-style" type="submit" name="insert_students" value="add students">

    <a class="btn  btn-danger btn-style" href="index.php?p=course&&cid=<?php echo $course->id; ?>">back</a>
    

</form>
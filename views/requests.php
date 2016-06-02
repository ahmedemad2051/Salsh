<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 6/2/16
 * Time: 5:39 PM
 */
?>

<form method="post">
    <table class="table table-bordered table-hover">
        <tr>
            <td>Course</td>
            <td>Action</td>
        </tr>
        <?php

        foreach($requests as $request)
        {
            $data=new display('monks');
            $monk_data=$data->getRecordById($request->monk_id);

            echo
            "
                            <tr>
                                <td>$monk_data->name</td>
                                <td>
                                    <a class='btn btn-success' href='controllers/requests_controller.php?cid=$course_id&monk_id=$monk_data->id&action=accept'>accept</a>
                                    <a class='btn btn-danger'  href='controllers/requests_controller.php?cid=$course_id&monk_id=$monk_data->id&action=remove'>remove</a>
                                </td>
                            </tr>
                        ";
        }
        ?>
    </table>

    <a class="btn btn-danger" href="index.php?p=course&&cid=<?php echo $course_id ?>">back</a>
</form>

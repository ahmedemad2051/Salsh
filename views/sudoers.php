<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 6/2/16
 * Time: 9:23 AM
 */
?>
<form method="post" action="controllers/sudoers_controller.php">
    <input type="hidden" name="cid" value=<?php echo $cid ?> >
    <table class="table table-bordered table-hover">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Check</td>
        </tr>
        <?php
            foreach($allmonks as $monk)
            {
            if(in_array($monk->id,$all_in_course))
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

    <input class="btn  btn-primary btn-style" type="submit" name="make_sudo" value="make sudo">
    <input type="submit" class="btn  btn-danger btn-style"  name="back" value="back">


</form>

<table class="table table-bordered table-hover">
    <tr>
        <td>admin</td>
        <td>action</td>
    </tr>
    <?php

    foreach($get_sudoers_id as $sudoer_id)
    {
        $sudoer=$data->getRecordById($sudoer_id->monk_id);

        echo "<tr>";
        echo "<td>$sudoer->name</td>";
        echo "<td>
                            <form  method='post' action='controllers/sudoers_controller.php'>
                            <input type='hidden' name='cid' value='$cid' >
                                <input type='hidden' name='sudoer_id' value='$sudoer_id->monk_id'> 
                                <input class='link' type='submit' name='delete' value='delete'>
                            </form>
                          </td>";
        echo "</tr>";
    }
    ?>
</table>

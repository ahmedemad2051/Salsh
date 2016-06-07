<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 5/31/16
 * Time: 7:58 PM
 */

session_start();
include_once 'models/autoload.php';
// check if i go to register page
if(isset($_GET['p'])&& $_GET['p']=='register')
{
    include "controllers/register_controller.php";
    die();
}

// if user not authenticated
if(!isset($_SESSION['status']) || $_SESSION['status']!='Auth')
{
    include "controllers/login_controller.php";
    die();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Slash</title>
    <?php include_once "style.php"; ?>
</head>
<body>

<div id="my_navbar">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Slash</a>
            </div>
            <?php
            // if admin go to course page
            if(isset($_GET['p'])&&$_GET['p']=='course'&&isset($_SESSION['who'])&&$_SESSION['who']=='admin')
            { ?>
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php?p=sudoers&&cid=<?php echo $_GET['cid'] ?>">admins</a>
                </div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php?p=requests&&cid=<?php echo $_GET['cid'] ?>">requests</a>
                </div>
            <?php } ?>

            <?php
            // if user go to his course page
            if(isset($_GET['cid'])&&!isset($_SESSION['who']))
            {
                $id=$_SESSION['user_id'];
                $course_id=$_GET['cid'];
                $data=new display('courses_students');
                $monk_data=$data->getDataByWhere("course_id=$course_id AND monk_id=$id")[0];
                $is_sudo=$monk_data->sudo;
                if($is_sudo==1)
                {
                    echo
                    "
                        <div class='navbar-header'>
                            <a class='navbar-brand' href='index.php?p=course&&cid=$course_id'>sudoer</a>
                        </div>
                    ";
                }
            }
            ?>
            
            <?php 
            if(!isset($_SESSION['who']))
            {
                ?>
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php?p=addRequests">add Requests</a>
                </div>
           <?php }
            ?>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="models/logout.php">Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</div>

<?php 

    if(isset($_GET['p']))
    {

     $file='controllers/'.$_GET['p'].'_controller.php';

        if(file_exists($file))
        {
            if($_GET['p']=='course'||$_GET['p']=='addRequests')
            {
                include_once $file;
            }
            elseif(isset($_SESSION['who'])&&$_SESSION['who']=='admin')
            {
                include_once $file;
            }
        }
        else
        {

            header('location:index.php');
        }
    }
    elseif(isset($_SESSION['who'])&&$_SESSION['who']=='admin')
    {
        include_once 'controllers/admin_controller.php';
    }
    else
    {
        include_once 'controllers/monk_controller.php';
    }
    

?>

</body>
</html>


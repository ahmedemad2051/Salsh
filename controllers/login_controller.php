<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 5/31/16
 * Time: 8:43 PM
 */
if(isset($_POST['login']))
{
    include_once '../models/autoload.php';
    $email=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars($_POST['password']);

    try
    {
 
        $log=new login($email,$password);
        $user=$log->getData();
        if(!empty($user))
        {
            session_start();
            if ($user) {

                $id= $user['id'];
                $_SESSION['user_id'] = $id;
                $_SESSION['status'] = "Auth";
                if($user['admin']==1)
                {
                    $_SESSION['who']='admin';
                    header('location:../index.php');
                }
                else
                {
                    header('location:../index.php');
                }


            }
        }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else
{
    include 'views/login.php';
}
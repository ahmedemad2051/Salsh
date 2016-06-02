<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 5/31/16
 * Time: 10:35 PM
 */

if(isset($_POST['register']))
{
    include_once '../models/autoload.php';
    $data['name'] = htmlspecialchars($_POST['name']);
    $data['mail'] = filter_var(htmlspecialchars($_POST['email']),FILTER_VALIDATE_EMAIL);
    $data['password'] = htmlspecialchars($_POST['password']);

    try
    {
        new register($data);
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
    
}
else
{
    include 'views/register.php';
}
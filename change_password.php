<?php
session_start();
include_once ("dbConnection.php");

$user = $_SESSION['username'];


if($user)
{

    if ($_POST['submit'])
    {
        //start changing pw
        $oldpassword = $_POST['oldpassword'];
        $oldpassword = $_POST['newpassword'];
        $oldpassword = $_POST['repeatnewpassword'];

        echo ("oldpassword");

    }
    else
    {

    }

    echo"
    <form action = 'change_password.php' method = 'POST'>
    Old pasword:<input type='text' name='oldpassword'><p>
    New pasword:<input type='text' name='newpassword'><p>
    Repeat New pasword:<input type='text' name='repeatnewpassword'><p>
    <input type='submit' name='submit' value='Change password'>
    
    ";

}
else
    die("You must be logged in to change your password");



?>
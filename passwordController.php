<?php
/**
 * Created by PhpStorm.
 * User: Mahan
 * Date: 9/3/2018
 * Time: 2:20 PM
 */
include 'includes/functions.php';
include 'includes/sql.php';
include 'includes/database.php';
include 'functions.php';


if(isset($_POST["submit"]))
{
    $date=make_date();
    $password = sha1(sha1($date));

    updatePassword($_POST['email'],$password);

    if(sendForgotPassword($_POST['email'],sha1($date))){
        header("Location: login.php");

    }else{
        echo "Error";
    }
}

?>
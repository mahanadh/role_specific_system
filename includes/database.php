<?php
/**
 * Created by PhpStorm.
 * User: Mahan
 * Date: 9/3/2018
 * Time: 2:40 PM
 */


$servername="localhost";
$username="root";
$password="";
$db="dss";

$conn=new mysqli($servername, $username, $password, $db);

if($conn->connect_error){
    die("Connection Failed:" . $conn->connect_error);
}



?>
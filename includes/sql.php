<?php
/**
 * Created by PhpStorm.
 * User: Mahan
 * Date: 9/3/2018
 * Time: 2:28 PM
 */

require_once ('database.php');
require_once ('functions.php');



function updatePassword($email,$password)
{
    $sql = "UPDATE users SET password='{$password}' WHERE email= '{$email}'";
    return ($sql);
}
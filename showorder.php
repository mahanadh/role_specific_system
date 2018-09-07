<?php
/**
 * Created by PhpStorm.
 * User: Mahan
 * Date: 9/7/2018
 * Time: 2:51 PM
 */
include ('functions.php');
include ('index.php');

$conn = new mysqli('localhost', 'root', '', 'dss');
$query="SELECT * FROM 'users' where username='{$user_name}' && SELECT * FROM 'food' where food_id='{$food_id}'";
$result=mysqli_query($conn ,$query);

// here i will write code for viewing ordered item
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<input name='food_id[]' type='hidden' value='". $row['food_id'] ."'>";
    echo "<td>" . $row['food_name'] . "</td>";
    echo "<td>" . $row['food_quantity'] . "</td>";
    echo "<td>" . $row['food_price']*$row['food_quantity']. "</td>";
    echo "<td>". $row['order_food'] . "</td>";
    echo "</tr>";
}
echo "</table>";
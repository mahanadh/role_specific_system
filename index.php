<?php
include('functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
    </style>
</head>
<body>
<div class="header">
    <h2> Home Page</h2>
</div>
<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <!-- logged in user information -->
    <div class="profile_info">
        <img src="images/user_profile.png"  >

        <div>
            <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['username']; ?></strong>

                <small>
                    <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                    <br>
                    <a href="index.php?logout='1'" style="color: red;">logout</a>
                </small>

            <?php endif ?>
        </div>
    </div>
</div>

<div>
</div>

<?php
$con=mysqli_connect("localhost","root","","dss");
$option = '';
echo "<table border='1'>
<tr>
<th>Food Id</th>
<th>Food Name</th>
<th>Food Quantity</th>
<th>Food Price</th>
<th>Order</th>
</tr>";
?>
<form method='post' action='index.php'>
    <?php

        if(isset($_POST['food_id'])) {
            $food_ids = $_POST['food_id'];

            foreach ($food_ids as $food_id) {

                $ordered = $_POST['ordered' . $food_id];

                if ($ordered > 0) {

                    $query = "SELECT * FROM `food` WHERE food_id ='{$food_id}' ";
                    $updated = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_array($updated)) {
                        $updatedFoodQty = $row['food_quantity'] - $ordered;
                    }

                    $query = "UPDATE `food` SET food_quantity = '{$updatedFoodQty}' WHERE food_id = '{$food_id}'";
                    mysqli_query($db, $query);

                }
            }
        }

    $result = mysqli_query($con,"SELECT * FROM food ORDER BY food_id");
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<input name='food_id[]' type='hidden' value='". $row['food_id'] ."'>";
        echo "<td>" . $row['food_id'] . "</td>";
        echo "<td>" . $row['food_name'] . "</td>";
        echo "<td>" . $row['food_quantity'] . "</td>";
        echo "<td>" . $row['food_price'] . "</td>";
        echo "<td><input type='number' name='ordered" . $row['food_id'] . "'>" . $row['order_food'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <input type='submit' name='submit'>


    <?php
    while($row = mysqli_fetch_array($result)) {
        if (!isset($_POST['submit'])) {
            $conn = new mysqli('localhost', 'root', '', 'dss');
            $order_food = $row['order_food'];
            echo $row['order_food'];
            $query = "UPDATE food SET food_quantity=$order_food ";
            $results = mysqli_query($db, $query);
            print $results;
            header("location", "index.php");
        }
    }
    mysqli_close($con);
    ?>
</form>
</body>
</html>
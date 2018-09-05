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

$result = mysqli_query($con,"SELECT * FROM food ORDER BY food_id");

$option = '';


echo "<table border='1'>
<tr>
<th>Food Id</th>
<th>Food Name</th>
<th>Food Quantity</th>
<th>Food Price</th>
<th>Order</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['food_id'] . "</td>";
    echo "<td>" . $row['food_name'] . "</td>";
    echo "<td>" . $row['food_quantity'] . "</td>";
    echo "<td>" . $row['food_price'] . "</td>";
    echo "<td>" . $row['order_food'] . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "

<form method='post' action='index.php'>
<input type='submit' name='submit'>
 

</form>

";

mysqli_close($con);
?>
</body>
</html>



<?php
include('functions.php');
// if session already started, this loads $_SESSION with existing values:
// Turn off all error reporting
error_reporting(0);
if(isset($_SESSION['user_type'])) {
    // Code for Logged members
    if ($_SESSION['user_type'] === "user") {
        $_SESSION['msg'] = "loggedin";


    }
    else {
        $_SESSION['msg'] = "You must log in  as user first";
        header('location: login.php');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Food</title>
<!--    <link rel="stylesheet" type="text/css" href="style.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">



        <a href="#" class="pull-left" ><img src="images/icons/favicon.ico"></a>

    <a class="navbar-brand" href="#">DSS Canteen Food System </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">


            <li class="nav-item">
                <a class="btn btn-danger" href="home.php?logout='1'">Logout</a>
            </li>

            <li class="nav-item" >
                <a class="btn btn-warning" href="change_password.php">Change Password</a>
            </li>
        </ul>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link disabled" href="showorder.php" style="color: #985f0d;">View orders</a>
            </li>
        </ul>
        <span class="navbar-text">
            <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['username']; ?></strong>

                <small>
<!--                            <i  style="color: #888;">(--><?php //echo ucfirst($_SESSION['user']['user_type']); ?><!--)</i>-->
                        </small>

            <?php endif ?>
            </span>
    </div>
</nav>
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
<?php
$con=mysqli_connect("localhost","root","","dss");
$option = '';
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <br><br>
            <table class="table table-bordered table-hover">
                <thead>
                    <th>S.N.</th>
                    <th class="col-md-2">Food Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th class="col-md-1">Order</th>
                </thead>
                <tbody>
                    <form  onSubmit="if(!confirm('Are you sure to order?')){return false;}" method='post' action='index.php'>
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

                                if ($updatedFoodQty < 0) {
                                    echo "Invalid order!";
                                } else {
                                    $query = "UPDATE `food` SET food_quantity = '{$updatedFoodQty}' WHERE food_id = '{$food_id}'";
                                    mysqli_query($db, $query);
                                    $orderDate = date("Y-m-d H:i:s", strtotime('today'));
                                    $user_id = $_SESSION['user_id'];
                                    $sql = "INSERT INTO order_details (user_id,food_id,ordered_quantity,date, served) values( '$user_id' ,'$food_id' , '$ordered','$orderDate','0') ";
                                    $result = mysqli_query($con, $sql);
                                }

                            }
                        }
                    }

                    $result = mysqli_query($con,"SELECT * FROM food ORDER BY food_id");
                    $i = 1;
                    while($row = mysqli_fetch_array($result))
                    {
                        if($row['added_date']==date("Y-m-d H:i:s", strtotime('today'))) {
                            echo "<tr>";
                            echo "<input name='food_id[]' type='hidden' value='" . $row['food_id'] . "'>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row['food_name'] . "</td>";
                            echo "<td>" . $row['food_quantity'] . "</td>";
                            echo "<td>" . $row['food_price'] . "</td>";
                            if ($row['food_quantity'] < 1) {
                                echo "<td><input class='form-control form-control-sm' type='number' name='ordered" . $row['food_id'] . "' disabled>" . $row['order_food'] . "</td>";
                            } else {
                                echo "<td><input class='form-control form-control-sm' type='number' name='ordered" . $row['food_id'] . "' min = '0' max='" . $row['food_quantity'] . "'>" . $row['order_food'] . "</td>";
                            }
                            echo "</tr>";
                        }
                                } ?>

                                    <tr>
                                        <td colspan="4">
                                        </td>
                                        <td >
                                            <input type='submit' name='submit' value="Place Order" class="btn btn-success btn-sm">
                                        </td>
                                    </tr>
                    </tbody>
                </form>
            </table>
        </div>
    </div>
</div>


</body>
</html>
<?php
include('functions.php');

// Turn off all error reporting
error_reporting(0);

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
$con=mysqli_connect("localhost","root","","dss");

?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Order History</title>
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
                    <a class="btn btn-danger" href="index.php?logout='1'">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="index.php" style="color: green;">HOME</a>
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
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT a.food_name, a.food_price, b.ordered_quantity, b.date FROM food as a INNER JOIN order_details AS b ON a.food_id = b.food_id WHERE user_id = '$user_id' ";
        $result = mysqli_query($con, $sql);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <br><br>
                <h4> Today's Order </h4>
                <table class="table table-bordered table-hover">
                    <thead>
                        <th> S.N. </th>
                        <th> Food Item </th>
                        <th> Quantity </th>
                        <th> Price </th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_array($result)) {
                        $orderDate = date("Y-m-d H:i:s", strtotime('today'));
                        $totalofone=0;
                        if($orderDate == $row['date']) {
                                echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td>" . $row['food_name'] . "</td>";
                                echo "<td>" . $row['ordered_quantity'] . "</td>";
                                echo "<td>" . $row['food_price'] . "</td>";
                                echo "<td>".$totalofone=$row['food_price']*$row['ordered_quantity']."</td>";
                                echo "</tr>";
                                $grandtotal=$grandtotal+$totalofone;
                         }

                        } ?>
                    <?php echo "<td colspan='4' align='right'>Today's Total</td>";?>
                    <?php echo "<td colspan='1'>".$grandtotal."</td>";?>

                    </tbody>
                </table>
            </div>
            <?php
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT a.food_name, a.food_price, b.ordered_quantity, b.date FROM food as a INNER JOIN order_details AS b ON a.food_id = b.food_id WHERE user_id = '$user_id' ";
            $result = mysqli_query($con, $sql);
            ?>
            <div class="col-md-6">
                <br><br>
                <h4> Order History</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                    <th> S.N. </th>
                    <th> Food Item </th>
                    <th> Quantity </th>
                    <th> Price </th>
                    <th> Date </th>
                    <th>Total</th>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_array($result)) {
                        $orderDate = date("Y-m-d H:i:s", strtotime('today'));
                        $totalofone=0;
                        if($orderDate != $row['date']) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row['food_name'] . "</td>";
                            echo "<td>" . $row['ordered_quantity'] . "</td>";
                            echo "<td>" . $row['food_price'] . "</td>";
                            echo "<td>" . date("Y-m-d", strtotime($row['date'])) . "</td>";
                            echo "<td>".$totalofone=$row['food_price']*$row['ordered_quantity']."</td>";
                            echo "</tr>";
                            $grandtotal=$grandtotal+$totalofone;
                        }

                    } ?>
                    <?php echo "<td colspan='5' align='right'>Grand Total</td>";?>
                    <?php echo "<td colspan='1'>".$grandtotal."</td>";?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php
include('functions.php');


// Turn off all error reporting
//error_reporting(0);

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
$con=mysqli_connect("localhost","root","","dss");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <!--    <link rel="stylesheet" type="text/css" href="style.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="#" class="pull-left" ><img src="images/icons/favicon.ico"></a>
    <a class="navbar-brand" href="#">DSS Canteen Food System </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link disabled" href="index.php?logout='1'" style="color: red;">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="home.php" style="color: red;">HOME</a>
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
    if(isset($_POST['serve'])) {
        $order_id = $_POST['orderId'];
        $sql = "UPDATE order_details SET served = 1 WHERE id = '$order_id' ";
        mysqli_query($con, $sql);
    }
?>

<?php
$sql = "SELECT f.food_name, o.ordered_quantity, o.date, o.id, u.username FROM food as f JOIN order_details AS o ON f.food_id = o.food_id JOIN users AS u ON o.user_id = u.id WHERE o.served = 0";
$result = mysqli_query($con, $sql);
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <br><br>
            <h4> View Today's Order </h4>
            <table class="table table-bordered table-hover">
                <thead>
                <th> S.N. </th>
                <th>Ordered by</th>
                <th> Food Item </th>
                <th> Ordered Quantity </th>
                <th> Action </th>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) {
                    $orderDate = date("Y-m-d H:i:s", strtotime('today'));
                   // $totalofone=0;//
                    if($orderDate == $row['date']) {
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>". $row['username']."</td>";
                        echo "<td>" . $row['food_name'] . "</td>";
                        echo "<td>" . $row['ordered_quantity'] . "</td>";
                        echo "<td> 
                               <form action='' method='post'>
                                    <input type='hidden' value='" . $row['id'] . "' name='orderId'>
                                    <input type='submit' class='btn btn-success btn-sm' name='serve' value='Serve'>
                                </form>
                        </td>";
                        //echo "<td>" . $row['food_price'] . "</td>";
                        //echo "<td>".$totalofone=$row['food_price']*$row['ordered_quantity']."</td>";
                        echo "</tr>";
                       // $grandtotal=$grandtotal+$totalofone;
                    }

                } ?>
<!--                --><?php //echo "<td colspan='4' align='right'>Today's Total</td>";?>
<!--                --><?php //echo "<td colspan='1'>".$grandtotal."</td>";?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>




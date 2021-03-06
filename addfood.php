
<?php
include('functions.php');
// if session already started, this loads $_SESSION with existing values:
// Turn off all error reporting
error_reporting(0);
if(isset($_SESSION['user_type'])) {
    // Code for Logged members
    if ($_SESSION['user_type'] === "admin") {
        $_SESSION['msg'] = "loggedin";


    }
    else {
        $_SESSION['msg'] = "You must log in  as user first";
        header('location: login.php');
    }
}

?>
<html>
<head>
    <title>Add Food</title>
  <!--  <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        body{
            background: #D5F5E3;
        }
        .col-md-6
        {
            margin: auto;
        }

    </style>
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
                <a class="btn btn-danger" href="home.php">HOME</a>
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
<div class="container">
    <center>  <h2>Add food</h2></center>
</div>
<!--<form method="post" action="addfood.php">-->
<!--       <div class="input-group">-->
<!--        <label>Food id</label>-->
<!--        <input type="number" name="food_id" placeholder="id">-->
<!---->
<!--    </div>-->
<!--    <div class="input-group">-->
<!--        <label>Food Name</label>-->
<!--        <input type="text" name="food_name" placeholder="name">-->
<!--    </div>-->
<!--    <div class="input-group">-->
<!--        <label>Food Quantity</label>-->
<!--        <input type="number" name="food_quantity" placeholder="quantity">-->
<!--    </div>-->
<!--    <div class="input-group">-->
<!--        <label>Food price</label>-->
<!--        <input type="number" name="food_price" placeholder="price per quantity">-->
<!--    </div>-->
<!--    <div class="input-group">-->
<!--        <button type="submit" class="btn" name="add_food" value="add_food">add food</button>-->
<!--    </div>-->
<!---->
<!--</form>-->
<div class="container">
    <!-- Horizonatal Form -->
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="nameField" class="col-xs-2">Food Name</label>
                    <div class="col-xs-10">
                        <input type="text" name="food_name" class="form-control"  placeholder="food name" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-2">Food Quantity</label>
                    <div class="col-xs-10">
                        <input type="number" name="food_quantity" class="form-control"  placeholder="food quantity" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-2">Food Price</label>
                    <div class="col-xs-10">
                        <input type="number" name="food_price" class="form-control"  placeholder="food price" />
                    </div>
                </div>
                <div class="col-xs-10 col-xs-offset-2">
                    <button type="submit" class="btn btn-primary"  name="add_food" value="add_food" >Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>


            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
$db = mysqli_connect('localhost', 'root', '', 'dss');
if(isset($_POST['add_food']))
{

    $food_name = $_POST['food_name'];
    $food_quantity = $_POST['food_quantity'];
    $food_price=$_POST['food_price'];
    $added_date = date("Y-m-d H:i:s", strtotime('today'));
    $db_host="localhost";  $db_user="root";  $db_password="";  $db="dss";
    $con = mysqli_connect($db_host,$db_user,$db_password,$db);
    $sql = " insert into food (food_name,food_quantity,food_price,added_date) values (' $food_name' , '$food_quantity','$food_price','$added_date') ";
   // echo $sql;
    $result = mysqli_query ( $con , $sql );
    echo $_SESSION['success'];
    header("location: addfood.php");
}

?>
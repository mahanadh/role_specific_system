
<html>
<head>
    <title>Add food</title>
  <!--  <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body style='margin:30px'>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">DSS Canteen Food System </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link disabled" href="index.php?logout='1'" style="color: red;">Logout</a>
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
    <h2>Add food</h2>
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
        <div class="col-xs-6">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-xs-2">Food Id</label>
                    <div class="col-xs-10">
                        <input type="number"  name="food_id" class="form-control"  placeholder="id" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="nameField" class="col-xs-2">Food Name</label>
                    <div class="col-xs-10">
                        <input type="text" name="food_name" class="form-control"  placeholder="food name" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-2">Food Quantity</label>
                    <div class="col-xs-10">
                        <input type="number" name="food_quantity" class="form-control"  placeholder="food price" />
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

    $food_id = $_POST['food_id'];
    $food_name = $_POST['food_name'];
    $food_quantity = $_POST['food_quantity'];
    $food_price=$_POST['food_price'];
    $db_host="localhost";  $db_user="root";  $db_password="";  $db="dss";
    $con = mysqli_connect($db_host,$db_user,$db_password,$db);
    $sql = " insert into food (food_id,food_name,food_quantity,food_price) values ( '$food_id' ,'$food_name' , '$food_quantity','$food_price' ) ";
    $result = mysqli_query ( $con , $sql );
    echo $_SESSION['success'];
    header("location: addfood.php");
}

?>

<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
    <h2>Register</h2>
</div>
<form method="post" action="addfood.php">
       <div class="input-group">
        <label>Food id</label>
        <input type="number" name="food_id" placeholder="id">

    </div>
    <div class="input-group">
        <label>Food Name</label>
        <input type="text" name="food_name" placeholder="name">
    </div>
    <div class="input-group">
        <label>Food Quantity</label>
        <input type="number" name="food_quantity" placeholder="quantity">
    </div>
    <div class="input-group">
        <label>Food price</label>
        <input type="number" name="food_price" placeholder="price per quantity">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="add_food" value="add_food">add food</button>
    </div>

</form>
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


}
header("location: addfood.php");
?>
<?php
include('functions.php');

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
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico">
    <style>
        .header {
            background: #003366;
        }
        button[name=register_btn] {
            background: #003366;
        }

         body{
             background: #D5F5E3;
         }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="#" class="pull-left" ><img src="images/icons/favicon.ico"></a>
    <a class="navbar-brand" href="#">DSS Canteen Food System </a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="btn btn-danger" href="home.php?logout='1'">Logout</a>
        </li>
        <li class="nav-item" >
        <a class="nav-link disabled" href="change_password.php" style="color: red;"> Change password</a>
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

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Add User
                </div>
                <div class="card-body">
                    <a href="register.php"> <i class="fas fa-user-plus fa-7x"></i> </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    View User
                </div>
                <div class="card-body">
                    <a href="view_user.php"> <i class="fas fa-users fa-7x"></i> </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    View Orders
                </div>
                <div class="card-body">
                    <a href="adminViewOrders.php"> <i class="fas fa-list fa-7x"></i> </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Add Food
                </div>
                <div class="card-body">
                    <a href="addfood.php"> <i class="fas fa-utensils fa-7x"></i> </a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
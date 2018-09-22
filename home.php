<?php
include('functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico">
    <style>
        .header {
            background: #003366;
        }
        button[name=register_btn] {
            background: #003366;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="#" class="pull-left" ><img src="images/icons/favicon.ico"></a>
    <a class="navbar-brand" href="#">DSS Canteen Food System </a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link disabled" href="home.php?logout='1'" style="color: red;">Logout</a>
        </li>
        <li class="nav-item" >
        <a class="nav-link disabled" href="change_password.php" style="color: red;">Change Password</a>
    </li>
    </ul>
</nav>
<div class="header">
    <h2>Admin - Home Page</h2>
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


                    <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                    <br>
            <br><br>
                    &nbsp;<button> <a href="create_user.php"> + add user</a></button>
                &nbsp; &nbsp;&nbsp; &nbsp;<button> <a href="adminViewOrders.php" >View today's order</a></button>
                &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; <button> <a href="view_user.php">View users</a> </button>
                &nbsp;&nbsp;&nbsp; &nbsp; <button ><a href="addfood.php"> add food</a></button>



            <?php endif ?>
        </div>





    </div>
</div>
</body>
</html>
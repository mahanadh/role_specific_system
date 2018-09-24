<?php
// Turn off all error reporting
error_reporting(0);
include('functions.php');
// if session already started, this loads $_SESSION with existing values:

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
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico">
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="#" class="pull-left" ><img src="images/icons/favicon.ico"></a>
    <a class="navbar-brand" href="#">DSS Canteen Food System </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="btn btn-danger" href="index.php?logout='1'">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="home.php" style="color: green;">HOME</a>
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
    <h2>Register</h2>
</div>
<!--<form method="post" name="form1" action="register.php" onsubmit="return validate()">-->
<!--    --><?php //display_error(); ?>
<!--    <div class="">-->
<!--        <label>Username</label>-->
<!--        <input type="text" name="username" value="--><?php //echo $username; ?><!--">-->
<!---->
<!--    </div>-->
<!--    <div class="input-group">-->
<!--        <label for="email">Email</label>-->
<!--        <input type="email" name="email" id = "email" value="--><?php //echo $email; ?><!--">-->
<!--    </div>-->
<!--    <div class="input-group">-->
<!--        <label>Password</label>-->
<!--        <input type="password" name="password_1" minlength="8" id="pass">-->
<!--    </div>-->
<!--    <div class="input-group">-->
<!--        <label>Confirm password</label>-->
<!--        <input type="password" name="password_2">-->
<!--    </div>-->
<!--    <div class="input-group">-->
<!--        <button type="submit" class="btn" name="register_btn" >Register</button>-->
<!--    </div>-->
<!--    <p>-->
<!--        Already a member? <a href="login.php">Sign in</a>-->
<!--    </p>-->
<!--</form>-->


<div class="container">
    <!-- Horizonatal Form -->
    <div class="row">
        <div class="col-xs-6">
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="nameField" class="col-xs-2">User Name</label>
                    <div class="col-xs-10">
                        <input type="text" name="username" class="form-control"  placeholder="user name" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-xs-2">Email</label>
                    <div class="col-xs-10">
                        <input type="email" name="email" class="form-control"  placeholder="email" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-2">password</label>
                    <div class="col-xs-10">
                        <input type="password" name="password_1" class="form-control"  placeholder="password" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-2">Re-enter password</label>
                    <div class="col-xs-10">
                        <input type="password" name="password_2" class="form-control"  placeholder=" re password" />
                    </div>
                </div>
                <div class="col-xs-10 col-xs-offset-2">
                    <button type="submit" class="btn btn-primary"  name="register_btn" value="" >Register</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>


            </form>
        </div>
    </div>
</div>

</body>
</html>
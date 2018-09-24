<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Food System Login</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

    <link rel="stylesheet " type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="js/main.js"></script>
    <style>
        .button
        {
            background: orangered;
        }
    </style>
</head>
<body>
<div class="limiter">
    <div class="container-login100" style="background-image: url('images/deerwalk.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
            <span class="login100-form-title p-b-41">Please Login</span>

            <form class="login100-form validate-form p-b-33 p-t-5"  action="login.php" method="post">
               <?php echo display_error();?>

                <div class="wrap-input100 validate-input" data-validate="Enter email">
                    <input class="input100" type="text" name="username" placeholder="username" autofocus required>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="container-login100-form-btn m-t-32">
                    <button class="btn btn-success" type="submit" name="login_btn">Login</button>
                </div>
                <div class="container-login100-form-btn m-t-32">
                    <a href="forgot_password.php">Forgot Password</a>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>
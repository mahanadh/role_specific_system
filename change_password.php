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



    <html>
<head><title>Change Password</title>
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
                <a class="btn btn-danger" href="index.php?logout='1'">Logout</a>
            </li>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link disabled" href="index.php" style="color: green;">HOME</a>
            </li>

        </ul>


    </div>
</nav>
<div class="container">
    <div class="col-xs-6">
<form action="change_password.php" method="post"class="form-horizontal">

    <div class="form-group">
        <label for="" class="col-xs-2"> Username:</label>
        <div class="col-xs-10">
            <input type="text" name="username" required><p>
        </div>
    </div>



    <div class="form-group">
        <label for="" class="col-xs-2"> Old Password:</label>
        <div class="col-xs-10">
            <input type='password' name='password'><p>
        </div>
    </div>


    <div class="form-group">
        <label for="" class="col-xs-2"> New Password:</label>
        <div class="col-xs-10">
            <input type='password' name='newpassword'><p>
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-xs-2">Confirm Password</label>
        <div class="col-xs-10">
            <input type='password' name='confirmnewpassword'><p>
        </div>
    </div>
    <div class="col-xs-10 col-xs-offset-2">
        <label class="btn btn-warning" type='submit' name='submit' value='Change password'>Change Password</label>
    </div>

</form>
</div>
</body>
</html>


<?php
session_start();
include 'dbConnection.php';

if (isset($_POST["submit"])) {

    $username = $_POST['username'];

    $password = md5($_POST['password']);

    $newpassword = md5($_POST['newpassword']);


    $confirmnewpassword = md5($_POST['confirmnewpassword']);

    $query = "SELECT password FROM users WHERE username ='$username'";

    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_row($result);

    if ($password !== $row[0]) {
        echo "You entered an incorrect password";

    } else if ($newpassword == $confirmnewpassword) {

        $query = "UPDATE users SET password='$newpassword' where username='$username'";
        $result = mysqli_query($connection, $query);
        echo "Congratulations You have successfully changed your password";
    } else {
        echo "Passwords do not match";
    }


}
?>
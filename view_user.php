<?php
/**
 * Created by PhpStorm.
 * User: floyd
 * Date: 9/21/2018
 * Time: 3:22 PM
 */
 include ('functions.php');
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
    <title>Home</title>
    <!--    <link rel="stylesheet" type="text/css" href="style.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
$sql="SELECT * FROM users";
 $result=mysqli_query($db,$sql);
 ?>
<div class="col-md-6">
                <br><br>
                <h4> Users list</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                        <th> S.N. </th>
                        <th> User name </th>

                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td><a href='viewbill.php?user_id=". $row['id'] ."'>" . $row['username'] . "</a></td>";
                                echo "</tr>";

                         }
                         ?>


                    </tbody>
                </table>
            </div>
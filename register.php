<?php include('functions.php') ?>



<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/login.js"></script>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico">
</head>
<body onload='document.form1.email.focus()'>
<div class="header">
    <h2>Register</h2>
</div>
<form method="post" name="form1" action="register.php" onsubmit="return validate()">
    <?php display_error(); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>">

    </div>
    <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" id = "email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1" minlength="8" id="pass">
    </div>
    <div class="input-group">
        <label>Confirm password</label>
        <input type="password" name="password_2">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="register_btn" >Register</button>
    </div>
    <p>
        Already a member? <a href="login.php">Sign in</a>
    </p>
</form>

</body>
</html>
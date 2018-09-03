<?php
require 'class/class.phpmailer.php';
require 'class/class.smtp.php';
include 'dbConnection.php';
if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $query = "select * from users where email='$email'";
    echo $query;
    $result = mysqli_query($connection,$query);
    if($result){
        $row = mysqli_fetch_assoc( $result );
        $name= $row['username'];
        $random = substr(md5(mt_rand()), 0, 5);
        $bodyContent = "Hello " . $name."<br> You have requested to reset password!! <br> Your new password is : ".$random."<br> Regards";
        $mail = new PHPMailer;
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
        $mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for gmail
        $mail->Port = '587';                                //Sets the default SMTP server port
        $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'mahan.adhikari@deerwalk.edu.np';                    //Sets SMTP username
        $mail->Password = '@mahima##';                    //Sets SMTP password
        $mail->SMTPSecure = 'tls';                            //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = "mahan.adhikari@deerwalk.edu.np";                    //Sets the From email address for the message
        $mail->FromName = 'Canteen Management System | DSS';                //Sets the From name of the message
        $mail->AddAddress($email, "$name");        //Adds a "To" address
        $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
        $mail->Hostname = 'localhost.localdomain';       //to send unlimited emails from localhost
        $mail->IsHTML(true);                            //Sets message type to HTML if you want to send message with html tags
        $mail->Subject = "Forget Password | Canteen Management System";                //Sets the Subject of the message
        $mail->Body = $bodyContent;                //An HTML or plain text message body
        if ($mail->Send())                                //Send an Email. Return true on success or false on error
        {
            echo "<SCRIPT type='text/javascript'>
			alert('Email Sent!!');
			window.location.replace('login.php');</SCRIPT>";
        } else {
//            echo "<SCRIPT type='text/javascript'>
//			alert('Your email could not be sent. Please try again later.');
//            window.location.replace('forgot_password.php');</SCRIPT>";
////			header("Refresh:0");
        }
    }else{
//        echo "<SCRIPT type='text/javascript'>
//			alert('Email not found!!. Please try again with registered email.');
//            window.location.replace('forgot_password.php');</SCRIPT>";
    }

}
?>
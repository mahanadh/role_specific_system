<?php

require_once("view/libs/libs/phpmailer/class.phpmailer.php");
require_once("view/libs/libs/phpmailer/class.smtp.php");
require ("view/libs/libs/phpmailer/PHPMailerAutoload.php");
include ('database.php');

function sendForgotPassword( $email, $password){
    $mailer = new PHPMailer();
    $mailer->IsSMTP();
    $mailer->SMTPSecure = 'tls';
    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMPTDebug = 2;
    $mailer->Port = 587;
    $mailer->Username = 'mahan2054@email.com';
    $mailer->Password = '2_0_5_4___';
    $mailer->SMTPAuth = true;
    $mailer->From = "mahan2054@gmail.com";
    $mailer->FromName = "DWIT";
    $mailer->Subject = 'Change Password';
    $mailer->isHTML(true);
    $mailer->Body =
        '<p>Hello</p>'.
    '<p>Your new password is '.$password.'</p>';

    $mailer->AddReplyTo( 'rnd@deerwalk.edu.np', 'DWIT' );
    $mailer->AddAddress($email);

    $mailer->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    if($mailer->Send()){
        return 1;
    } else {
        return 0;
    }
}

function make_date(){

    return strftime("%Y-%m-%d %H:%M:%S",time());
}

?>
















<html>
<h1>"This is a <b>SAMPLE<b> email sent through admin vaibhav shanker Otp:'<?php require 'classes/user.php'; $user=new user();
                                                                        $connection=new Dbconnect();
                                                                        $otp =$user->generateRandomString(6);    
                                                                        echo $otp ?>  '<b>PHPMailer<b>';




























<!-- <!-- <?php

require_once 'classes/otp.class.php';
session_start();

$code = $otp->generateRandomString(6);

echo $code;

?> -->

<?php

require_once 'classes/otp.class.php';
session_start();

// if (isset($_POST["email"])) {
$otp = new Sakib\OTP;
$code = $otp->generateRandomString(6);
// $_SESSION['code'] = $code;
echo $code;
$hash = $otp->CreateOTP($email,$code);

$_SESSION['email'] = $email;
$_SESSION['hash'] = $hash;
// echo $hash;
// header("Location: verifyotp.php"); 

?> -->
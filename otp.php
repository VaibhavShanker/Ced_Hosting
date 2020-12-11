<?php

require "vendor/autoload.php";
$robo = 'vaibhavshanker170@gmail.com';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$developmentMode = true;
$mailer = new PHPMailer($developmentMode);
try {
    $mailer->SMTPDebug = 2;
    $mailer->isSMTP();

    if ($developmentMode) {
    $mailer->SMTPOptions = [
        'ssl'=> [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        ]
    ];
    }
    $mailer->Host = 'ssl://smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'vaibhavshanker170@gmail.com';
    $mailer->Password = '7844814420';
    $mailer->SMTPSecure = 'ssl';
    $mailer->Port = 465;

    $mailer->setFrom('vaibhavshanker170@gmail.com', 'Admin');
    $mailer->addAddress('princeshukla4321@gmail.com', 'recipient');

    $mailer->isHTML(true);
    $mailer->Subject = 'PHPMailer Test';
    $mailer->Body = 'This is a <b>SAMPLE<b> email sent through admin vaibhav shanker Otp: -630301-<b>PHPMailer<b>';

    $mailer->send();
    $mailer->ClearAllRecipients();
    echo "MAIL HAS BEEN SENT SUCCESSFULLY";

} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}






session_id("otp");session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{ 
if(isset($_POST['verify']))
	{
        $ckid=$_COOKIE["uid"];
        $ver=$_POST['otp'];
        
        if($ver==$_COOKIE[$ckid])
        {
        $to=$_COOKIE["email"];
        $subject1 = "TOURLANCERS";
        $txt1 = "WELCOME   ".$_COOKIE["uid"]." to the Tourlancers Community" ;
        $header = "From: vaibhavshanker170@gmail.com" ;
        mail($to,$subject1,$txt1,$header);
        setcookie("uid","",time()-3600);
        setcookie($ckid,"",time()-3600);
        setcookie("email","",time()-3600);
        session_id("otp"); session_destroy();
         header('Location: ../index.html');
         }
        else echo $_COOKIE[$ckid]."   ".$_COOKIE["email"]. $ver . $_COOKIE["uid"]; 
        }
}?>

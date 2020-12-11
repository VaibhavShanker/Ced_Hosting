<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// $newotp = $_SESSION['otp'];
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    require "vendor/autoload.php";
    require 'classes/user.php'; 
    $user=new user();
    $connection=new Dbconnect();
    $otp =$user->generateRandomString(6); 
    $_SESSION['votp'] = $otp;   
    
$robo = 'vaibhavshanker170@gmail.com';

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
    $mailer->addAddress($email, 'recipient');

    $mailer->isHTML(true);
    $mailer->Subject = 'This is a email sent through admin vaibhav shanker Otp:';
    // $mailer->Body = 'This is a <b>SAMPLE<b> email sent through admin vaibhav shanker Otp: <b>PHPMailer<b>';
    $mailer->Body = $otp ;
                   

    $mailer->send();
    $mailer->ClearAllRecipients();
    // echo $email;
    // echo $otp ;
    // echo '<br>' ;
    echo "<script>alert('MAIL HAS BEEN SENT SUCCESSFULLY');
    window.location='verifyotp.php';
    </script>";
    //echo "MAIL HAS BEEN SENT SUCCESSFULLY";

} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}

}
?>

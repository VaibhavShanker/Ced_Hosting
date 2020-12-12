<?php
require 'classes/otp.class.php';
require 'classes/user.php';
// session_start();
$useremail = $_SESSION['userdata']['email'];
$votp = $_SESSION['votp'];
if(isset($_POST['submit'])){
    $otp=$_POST['otp'];
if($votp === $otp)
        {
            $con = mysqli_connect("localhost", "root", "", "cedhosting");
            if (!$con) {
              die('Could not connect: ' . mysqli_error($con));
            } 
            $sql = " UPDATE tbl_user SET `email_approved`='1', `active`='1' WHERE `email`='$useremail' ";  
            if ($con->query($sql) === TRUE)  {
            $success = true;
            session_destroy();
            }
        }
        else
        {
            $error = true;
        }    
}
?> 
<?php
require 'header.php';
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OTP Verification without Database</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action="verifyotp.php" method="post">
    <!-- <form action="ty.php" method="post"> -->
        <h3 style="font-size: 20px;" class="text-center">Enter OTP</h3>  
        <div class="form-group">
            <input type="text" name="otp" class="form-control" placeholder="OTP" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Verify</button>
            <a class="btn btn-primary btn-block" href="newotp.php";>Resend OTP</a>
        </div>
        <?php if(isset($error)) {?>
        <div class="alert alert-danger" role="alert"> Verification failed! </div>
        <?php } ?>
        
        <?php if(isset($success)) {?>
        <div class="alert alert-success" role="alert"> Verification success! </div>
        <?php } ?> 
        
    </form>
</div>
<?php
require 'footer.php';
?>


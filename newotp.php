<?php 
    require 'classes/user.php';
    require 'header.php';
        
        $useremail = $_SESSION['userdata']['userid'];
        $userno = $_SESSION['userdata']['userno'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OTP Verification Email</title>
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
    <form action="opt.php" method="post">
        <h3 style="font-size: 20px;" class="text-center">Email Verification need </h3>       
        <div class="form-group">
            <input type="email" name="email" class="form-control" value='<?php echo $useremail; ?>' placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Email Verify</button>       
        </div>
    </form>
    <form action="mob.php" method="post">
        <h3 style="font-size: 20px;" class="text-center">Mobile No. Verification need </h3>       
        <div class="form-group">
            <input type="number" name="email" class="form-control" value='<?php echo $userno; ?>' placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Mobile no. Verify</button>       
        </div>
    </form>
</div>
</body>
</html>       
<?php
require 'footer.php';
?>
    <!-- <a class="btn btn-primary btn-block" href="../filter/datesf.php?id=<?php echo $email; ?>">Submit</a>
        

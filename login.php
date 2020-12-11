<?php
require 'header.php';
?>
<?php	
	require 'classes/user.php';	
	$error=array();
	if (isset($_POST['submit'])) {
		$name=isset($_POST['email'])?$_POST['email']:'';
		$password=isset($_POST['password'])?$_POST['password']:'';
		$user=new user();
		$connection1=new Dbconnect();
		$show=$user->Login($name,$password,$connection1->conn);    
		echo $show;
	}
	
?>

		<!---login--->
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
									 <h3>new customers</h3>
									 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
									 <a class="acount-btn" href="account.php">Create an Account</a>
								</div>
								<div class="col-md-6 login-right">
									<h3>registered</h3>
									<p>If you have an account with us, please log in.</p>
									<form action="#" method="post">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="text" name="email" placeholder="User Name!"> 
									  </div>
									  <div>
										<span>Password<label>*</label></span>
										<input type="password" name="password" placeholder="Passowrd"> 
									  </div>
									  <a class="forgot">Forgot Your Password?</a>
									  <input type="submit" name="submit" value="Login" id="submit">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- login -->
<?php
	require 'footer.php';
?>
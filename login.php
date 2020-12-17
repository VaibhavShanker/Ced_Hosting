<?php
	require 'classes/user.php';	
	$connection=new Dbconnect();
	$error=array();
	if (isset($_POST['submit'])) {
		$name=isset($_POST['email'])?$_POST['email']:'';
		$password=isset($_POST['password'])?$_POST['password']:'';
		$user=new user();		
		$show=$user->Login($name,$password,$connection->conn);    
		echo $show;
	}	
?>
<?php require 'header1.php'; ?>
<div class="header">
				<div class="container">
					<nav class="navbar navbar-default">
						<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<i class="sr-only">Toggle navigation</i>
									<i class="icon-bar"></i>
									<i class="icon-bar"></i>
									<i class="icon-bar"></i>
								</button>				  
								<div class="navbar-brand">
									<!-- <h1><a href="index.html">CED Hosting</a></h1> -->
									<img style="width:280px;height:85px;" src="images/logo.png"> 
								</div>
							</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
								<li class="<?php if($file[0]=="index.php"):?>active<?php  endif; ?>"><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
								<li class="<?php if($file[0]=="about.php"):?>active<?php  endif; ?>"><a href="about.php">About</a></li>
								<li class="<?php if($file[0]=="services.php"):?>active<?php  endif; ?>">
									<a href="services.php" >Services</a>
								</li>
									
								<li class="dropdown <?php if(in_array($file[0],$hostingmenu)):?>active<?php  endif; ?>">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
								<ul class="dropdown-menu">
								<?php 
								  $productparent=new user();
                                  $productparent1=$productparent->productParent($connection->conn);
                                  foreach($productparent1 as $key=>$row2) {
                                  if($row2['prod_parent_id']==1) {
								echo "<li><a href='catpage.php?id=$row2[id]'>$row2[prod_name]</a></li>";
                                  }
                                  }
                            	?>
								</ul>	
						    </li>							
								<li class="<?php if($file[0]=="pricing.php"):?>active<?php  endif; ?>"><a href="pricing.php">Pricing</a></li>
								<li class="<?php if($file[0]=="blog.php"):?>active<?php  endif; ?>"><a href="blog.php">Blog</a></li>
								<li class="<?php if($file[0]=="contact.php"):?>active<?php  endif; ?>"><a href="contact.php">Contact</a></li>
								<li class="<?php if($file[0]=="cart.php"):?>active<?php  endif; ?>"><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>								
								<li class="<?php if($file[0]=="login.php"):?>active<?php  endif; ?>"><a href="login.php">Login</a></li>								
							</ul>
							</div><!-- /.navbar-collapse -->
						</div><!-- /.container-fluid -->
					</nav>
				</div>
			</div>
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
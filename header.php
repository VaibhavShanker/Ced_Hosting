<!DOCTYPE HTML>
	<html>
			<head>
				<title>Ced Hosting </title>
					<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
					<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
					Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
					<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
					<script src="js/jquery-1.11.1.min.js"></script>
					<script src="js/bootstrap.js"></script>
					<!---fonts-->
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<script src="https://kit.fontawesome.com/a076d05399.js"></script>
					<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
					<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
					<!---fonts-->
					<!--script-->
						<script src="js/modernizr.custom.97074.js"></script>
						<script src="js/jquery.chocolat.js"></script>
						<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
						<!--lightboxfiles-->
						<script type="text/javascript">
							$(function() {
							$('.team a').Chocolat();
							});
						</script>	
						<script type="text/javascript" src="js/jquery.hoverdir.js"></script>	
												<script type="text/javascript">
													$(function() {											
														$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );
													});
												</script>						
				    <!--script-->
			</head>
	<body>
		<!---header--->
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
							      require_once 'classes/product.php';                          
								  $productparent=new product();
								  $connection=new Dbconnect();
                                  $productparent1=$productparent->productParent($connection->conn);
                                  foreach($productparent1 as $key=>$row2) {
                                  if($row2['prod_parent_id']==1) {
								echo "<li><a href='catpage.php?id=$row2[id]'>$row2[prod_name]</a></li>";
									// echo "<option value=" >""</option>";
									// query_close($conn);
                                  }
                                  }
                            	?>
								</ul>	
								<!-- <ul class="dropdown-menu">
									<li class="<?php if($file[0]=="linuxhosting.php"):?>active<?php  endif; ?>"><a href="linuxhosting.php">Linux hosting</a></li>
									<li class="<?php if($file[0]=="wordpresshosting.php"):?>active<?php  endif; ?>"><a href="wordpresshosting.php">WordPress Hosting</a></li>
									<li class="<?php if($file[0]=="windowshosting.php"):?>active<?php  endif; ?>"><a href="windowshosting.php">Windows Hosting</a></li>
									<li class="<?php if($file[0]=="cmshosting.php"):?>active<?php  endif; ?>"><a href="cmshosting.php">CMS Hosting</a></li>
								</ul>			 -->
						    </li>
								
							
						
								<li class="<?php if($file[0]=="pricing.php"):?>active<?php  endif; ?>"><a href="pricing.php">Pricing</a></li>
								<li class="<?php if($file[0]=="blog.php"):?>active<?php  endif; ?>"><a href="blog.php">Blog</a></li>
								<li class="<?php if($file[0]=="contact.php"):?>active<?php  endif; ?>"><a href="contact.php">Contact</a></li>
								<li class="<?php if($file[0]=="cart.php"):?>active<?php  endif; ?>"><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
								
								<li class="<?php if($file[0]=="login.php"):?>active<?php  endif; ?>"><a href="login.php">Login</a></li>
								
								
							</ul>












<!-- 
									<li class="active"><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
									<li><a href="about.php">About</a></li>
									
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services<i class="caret"></i></a>
											<ul class="dropdown-menu">												
												<li><a href="#">FAQ's</a></li>
												<li><a href="#">Testimonials</a></li>
												<li><a href="#">History</a></li>
												<li><a href="#">Support</a></li>
												<li><a href="#">Template setting</a></li>												
												<li><a href="#">Portfolio</a></li>
											</ul>
										</li> 
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
										<ul class="dropdown-menu">
										<?php 
											// require 'classes/product.php';	                                 
											// $productparent=new product();
											// $connection=new Dbconnect();
											// $productparent1=$productparent->productParent($connection->conn);
											// foreach($productparent1 as $key=>$row2) {
											// if($row2['prod_parent_id']==1) {
											// echo "<option value=".$row2['link']." >".$row2['prod_name']."</option>";
											// }
											// }
										?>
										</ul>									
									</li>
									<li><a href="blog.php">Blog</a></li>
									<li><a href="pricing.php">Pricing</a></li>																	
									<li><a href="contact.php">Contact</a></li>
									<li><a href="cart.php"><i class="w3-xxlarge fa fa-shopping-cart fa-fw"></i></a></li>
									<li><a href="login.php">Login</a></li>
								</ul>										 -->
							</div><!-- /.navbar-collapse -->
						</div><!-- /.container-fluid -->
					</nav>
				</div>
			</div>
		<!---header--->
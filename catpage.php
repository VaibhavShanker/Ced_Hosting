<?php  	require 'classes/product.php';	
		   $connection=new Dbconnect();
		   $id = $_GET['id']; 	 ?>
<?php 	require 'header1.php';	 ?>
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
								<?php 	$productparent=new product();
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
							</div>	<!-- /.navbar-collapse -->
						</div>	<!-- /.container-fluid -->
					</nav>
				</div>
			</div>
				<div>
				<div class="content"> 	<!---singleblog--->
									<div class="linux-section">
										<div class="container">
											<div class="linux-grids">
												<div class="col-md-8 linux-grid">
												<?php	$passedId = $_GET['id'];       
														$productparent=new product();
														$productparent1=$productparent->productParent($connection->conn);
														foreach($productparent1 as $key=>$row2) {
															if($row2['id']==$passedId) {
															echo    '<h2> '.$row2['prod_name'].'</h2> ';                                        
															}                                    
														}  ?>
												<ul>
													<li><span>Unlimited </span> Domains, Disk Space, Bandwidth and Email Addresses</li>
													<li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>
													<li><span>Powered by </span> CloudLinux, cPanel (demo), Apache, MySQL, PHP, Ruby & more</li>
													<li><span>Launch  </span> your business with Rs. 2000* Google AdWords Credit *</li>
													<li><span>30 day </span> Money Back Guarantee</li>
												</ul>
													<a href="#">view plans</a>
												</div>
												<div class="col-md-4 linux-grid1">
													<img src="images/linux.png" class="img-responsive" alt=""/>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-prices">
						<div class="container">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">								
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
										<div class="linux-prices">
										    <?php	$child_id=new product();
													$child_id1=$child_id->fetchChildId($connection->conn, $id);
													if(isset($child_id1)) {
													foreach($child_id1 as $key=>$row) {
														$id1=$row['id'];
														$prod_id=new product();
														$prod_id1=$prod_id->fetchProductDetails($connection->conn, $id1);
														if(isset($prod_id1)) {
														foreach($prod_id1 as $key2=>$row2) {	?>
											<div class="col-md-3 linux-price">
												<div class="linux-top">
												<h4><?php echo $row['prod_name']; ?></h4>
												</div>
												<div class="linux-bottom">
													<h5>₹. <?php echo $row2['mon_price']; ?>/- <span class="month">Per Month</span></h5>
													<h5>₹. <?php echo $row2['annual_price']; ?>/- <span class="month">Per Year</span></h5>
													<?php $js1=json_decode($row2['description'], true); ?>
													<h6><?php  echo $js1['freedomain']; ?> Domain</h6>
													<?php  $js=json_decode($row2['description']);
													       foreach($js as $key3=>$row3) { ?>													
													<ul>
													<li><strong><?php  echo $key3; ?> :</strong><?php  echo $row3; ?></li>													
													   <?php } ?>
													<li><strong>High Performance :</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/india.png"></li>
													</ul>
												</div>
												<a href="" data-toggle="modal" data-target="#modalLoginForm<?php echo $row2['prod_id']; ?>">
                                                   Buy Now</a>
											</div>                                            
											<?php				}
															}
														}
													}  			?>											
											<div class="clearfix"></div>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>

					<div class="modal-footer d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary my-4" value="Edit" name="edit">
                      </div>
					<!-- clients -->
				<div class="clients">
					<div class="container">
						<h3>Some of our satisfied clients include...</h3>
						<ul>
							<li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
							<li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
							<li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
							<li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
							<li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
							<li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
						</ul>
					</div>
				</div>
       <!-- clients -->

<?php require "footer.php"; ?>
<?php
      session_start();
      if(isset($_SESSION['userdata'])) {
          echo $_SESSION['userdata']['userid'];
      } else {
        header("Location: ../index.php");
      }
?>
<!--  -->


  <?php
    require '../classes/product.php';
    require "header.php";
    $connection=new Dbconnect();
  ?>


<?php

	$error=array();
	if (isset($_POST['submit'])) {		
	$prod_parent_id=isset($_POST['drop'])?$_POST['drop']:"";
    $prod_name=isset($_POST['name'])?$_POST['name']:"";
    $link=isset($_POST['link'])?$_POST['link']:"";

    $mon_price=isset($_POST['mon_price'])?$_POST['mon_price']:"";
    $annual_pricee=isset($_POST['annual_price'])?$_POST['annual_price']:"";
    $sku=isset($_POST['sku'])?$_POST['sku']:"";
    
    $webspace=isset($_POST['webspace'])?$_POST['webspace']:"";
    $bandwidth=isset($_POST['bandwidth'])?$_POST['bandwidth']:"";
    $freedomain=isset($_POST['freedomain'])?$_POST['freedomain']:"";
    $ltsupport=isset($_POST['ltsupport'])?$_POST['ltsupport']:"";
    $mailbox=isset($_POST['mailbox'])?$_POST['mailbox']:"";	

		date_default_timezone_set("Asia/Calcutta");
    $prod_launch_date=date("Y-m-d h:i:s"); 
		$product=new product();
    // echo $prod_parent_id, $prod_name, $link, $prod_launch_date, $mon_price, $annual_pricee, $sku, $webspace, $bandwidth, $freedomain, $ltsupport, $mailbox;
    $show=$product->addproducts($prod_parent_id, $prod_name, $link, $prod_launch_date, $mon_price, $annual_pricee, $sku, $webspace, $bandwidth, $freedomain, $ltsupport, $mailbox, $connection->conn);
    echo $show;
	}
?>

   <!-- Page content -->
   <br><br><br><br><br><br>
    <div class="container mt--8 pb-5" style='margin-top: 80000px;'>
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-3">
            <h1>Create New Product</h1>
            <h4>Enter Product Details</h4>              
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form action="add_product.php" method="post">
                    <!-- Product Category -->
                    <div class="form-group mb-3">
                      <label for="exampleFormControlSelect1">Select Product Category &#160;&#160;<span style="color:red">*</span></label>
                        <div class="input-group input-group-merge input-group-alternative">                    
                            <div class="input-group-prepend">                    
                              <span class="input-group-text"><!-- <i class="ni ni-email-83"></i> --></span>
                            </div>  
                            <select name="drop" class="form-control" placeholder="SELECT " >
                            <option selected>Please Select</option>
                            <?php                                  
                                  $productparent=new product();
                                  $productparent1=$productparent->productParent($connection->conn);
                                  foreach($productparent1 as $key=>$row2) {
                                  if($row2['id']==1) {
                                    echo "<option value=".$row2['id']." >".$row2['prod_name']."</option>";
                                  }
                                  }
                            ?>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Enter Product Name &#160;&#160;<span style="color:red">*</span></label>
                        <div class="input-group input-group-merge input-group-alternative">                    
                            <div class="input-group-prepend">                    
                            <span class="input-group-text"><!--<i class="ni ni-email-83"></i>--></span> 
                            </div>
                          <input name="name" class="form-control" placeholder="" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Page URL</label>
                        <div class="input-group input-group-merge input-group-alternative">                    
                            <div class="input-group-prepend">                    
                            <span class="input-group-text"><!--<i class="ni ni-email-83"></i>--></span> 
                            </div>
                          <input name="link" class="form-control" placeholder="" type="text" required>
                        </div>
                    </div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <!-- Product Description -->
                    <h2>Product Description</h2>
                    <h4>Enter Product Description Below</h4>
                    <hr class="my8">
                      <form role="form">
                        <div class="form-group mb-3">
                          <label for="exampleFormControlSelect1">Enter Monthly Price &#160;&#160;<span style="color:red">*</span></label>
                            <div class="input-group input-group-merge input-group-alternative">                    
                                <div class="input-group-prepend">                    
                                  <span class="input-group-text"><!-- <i class="ni ni-email-83"></i> --></span>
                                </div>  
                                <input name='mon_price' class="form-control" placeholder="ex: 23" type="text" required>                                
                            </div>  
                          <p><small>This would be Monthly Plan</small></p>
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">Enter Annual Price  &#160;&#160;<span style="color:red">*</span></label>
                            <div class="input-group input-group-merge input-group-alternative">                    
                                <div class="input-group-prepend">                    
                                <span class="input-group-text"><!--<i class="ni ni-email-83"></i>--></span> 
                                </div>
                              <input name='annual_price' class="form-control" placeholder="ex: 23" type="text" required>
                            </div>
                          <p><small>This would be Annual Price</small></p>
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">SKU  &#160;&#160;<span style="color:red">*</span></label>
                            <div class="input-group input-group-merge input-group-alternative">                    
                                <div class="input-group-prepend">                    
                                <span class="input-group-text"><!--<i class="ni ni-email-83"></i>--></span> 
                                </div>
                              <input name='sku' class="form-control"  type="text" required>
                            </div>
                        </div>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        <!-- Features -->                    
                        <h2>Features</h2>
                        <hr class="my8">
                          <form role="form">
                            <div class="form-group mb-3">
                              <label for="exampleFormControlSelect1">Web Space(in GB) &#160;&#160;<span style="color:red">*</span></label>
                                <div class="input-group input-group-merge input-group-alternative">                    
                                    <div class="input-group-prepend">                    
                                      <span class="input-group-text"><!-- <i class="ni ni-email-83"></i> --></span>
                                    </div>  
                                    <input name='webspace' class="form-control" placeholder="" type="text" required>                                
                                </div>  
                              <p><small>Enter 0.5 for 512 MB</small></p>
                            </div>
                            <div class="form-group">
                            <label for="exampleFormControlSelect1">Bandwidth (in GB)  &#160;&#160;<span style="color:red">*</span></label>
                                <div class="input-group input-group-merge input-group-alternative">                    
                                    <div class="input-group-prepend">                    
                                    <span class="input-group-text"><!--<i class="ni ni-email-83"></i>--></span> 
                                    </div>
                                  <input name='bandwidth' class="form-control" placeholder="" type="text" required>
                                </div>
                              <p><small>Enter 0.5 for 512 MB</small></p>
                            </div>
                            <div class="form-group">
                            <label for="exampleFormControlSelect1">Free Domain   &#160;&#160;<span style="color:red">*</span></label>
                                <div class="input-group input-group-merge input-group-alternative">                    
                                    <div class="input-group-prepend">                    
                                    <span class="input-group-text"><!--<i class="ni ni-email-83"></i>--></span> 
                                    </div>
                                  <input name='freedomain' class="form-control" placeholder="" type="text"required>
                                </div>
                              <p><small>Enter 0 if no domain available in this service</small></p>
                            </div>
                            <div class="form-group">
                            <label for="exampleFormControlSelect1">Language / Technology Support  &#160;&#160;<span style="color:red">*</span></label>
                                <div class="input-group input-group-merge input-group-alternative">                    
                                    <div class="input-group-prepend">                    
                                    <span class="input-group-text"><!--<i class="ni ni-email-83"></i>--></span> 
                                    </div>
                                  <input name='ltsupport' class="form-control" placeholder="" type="text">
                                </div>
                              <p><small>Separate by (,) Ex: PHP, MySQL, MongoDB</small></p>
                            </div>
                            <div class="form-group">
                            <label for="exampleFormControlSelect1">Mailbox  &#160;&#160;<span style="color:red">*</span></label>
                                <div class="input-group input-group-merge input-group-alternative">                    
                                    <div class="input-group-prepend">                    
                                    <span class="input-group-text"><!--<i class="ni ni-email-83"></i>--></span> 
                                    </div>
                                  <input name='mailbox' class="form-control" placeholder="" type="text" required>
                                </div>                        
                              <p><small>Enter Number of mailbox will be provided, enter 0 if none</small></p>
                            </div>  
                            <hr style="height:2px;border-width:100%;color:gray;background-color:gray">
                <div class="text-center">
                  <button type="submit" name="submit" value="submit" class="btn btn-primary my-4">Create Now</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>   
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
<?php
    require "footer.php";
?>
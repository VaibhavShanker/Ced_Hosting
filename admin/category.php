  <?php   require "header.php";
          require '../classes/product.php';
          $connection=new Dbconnect(); 
  ?>
  <?php   $error=array();
          if (isset($_POST['submit'])) {		
            $prod_parent_id=isset($_POST['drop'])?$_POST['drop']:"";
            $prod_name=isset($_POST['name'])?$_POST['name']:"";
            $link=isset($_POST['link'])?$_POST['link']:"";	
            date_default_timezone_set("Asia/Calcutta");
            $prod_launch_date=date("Y-m-d h:i:s"); 
            $product=new product();
            $connection=new Dbconnect();
            $show=$product->addproduct($prod_parent_id, $prod_name, $link, $prod_launch_date, $connection->conn);
            echo $show;
          }
  ?><br><br><br><br><br><br>
<div class="container mt--8 pb-5" style='margin-top: 80000px;'>
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-3">
            <h1>Create New Category</h1>
            <h4>Enter Category Details</h4>              
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form action="category.php" method="post"> 
                    <!-- Product Category -->                   
                    <div class="form-group mb-3">
                      <label for="exampleFormControlSelect1">Select Category &#160;&#160;<span style="color:red">*</span></label>
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
                    <label for="exampleFormControlSelect1">Sub-Categories &#160;&#160;<span style="color:red">*</span></label>
                        <div class="input-group input-group-merge input-group-alternative">                    
                            <div class="input-group-prepend">                    
                              <span class="input-group-text"><!--<i class="ni ni-email-83"></i>--></span> 
                            </div>
                          <input name="name" class="form-control" placeholder="" type="text" require>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Page URL</label>
                        <div class="input-group input-group-merge input-group-alternative">                    
                            <div class="input-group-prepend">                    
                              <span class="input-group-text"><!--<i class="ni ni-email-83"></i>--></span> 
                            </div>
                          <input name="link" type="textarea" class="mytextarea" placeholder="" require>
                          <!-- <textarea class="mytextarea"></textarea> -->
                        </div>
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
  </div><br><br>
            <!-- Card header -->
      <div class="row">
        <div class="col">
          <div class="card ">
          <div class="card-header border-0">
              <h3 class="mb-0">Sub-category table</h3>
            </div>
            <div class="table-responsive">
            <table class="table align-items-center table-flush" id="myTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Product Id</th>
                    <th scope="col" class="sort" 
                    data-sort="budget">Parent Product Name</th>
                    <th scope="col" class="sort" 
                    data-sort="status">Product Name </th>
                    <th scope="col">Link</th>
                    <th scope="col">Product Availability</th>
                    <th scope="col" class="sort" 
                    data-sort="completion">Product Launch Date</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>                   
                  </tr>
                </thead>
                <tbody class="list">
                <?php
                $cat=new product();
                $cat1=$cat->createCategoryTable($connection->conn);
                foreach ($cat1 as $key=>$row) {
                  if($row['id']==1) {
                    continue;
                  }  
                ?>                
                  <tr>
                    <th scope="row">
                        <?php echo $row['id']; ?>
                    </th>
                    <td class="budget">
                    <?php 
                    $pp=$row['prod_parent_id'];
                    $productparent=new product();
                    $productparent1=$productparent->productParent($connection->conn, $pp);
                    foreach($productparent1 as $key=>$row2) {
                      if($row2['id']==1) {
                        echo $row2['prod_name'];
                      }
                    }
                     ?>
                    </td>
                    <td>
                    <?php echo $row['prod_name']; ?>                     
                    </td>
                    <td>
                    <?php 
                    if ($row['html']=="") {
                        $link="Null";
                    } else {
                        $link=$row['html'];

                    }
                    echo $link;                    
                    ?>                      
                    </td>
                    <td>
                    <?php                     
                    if($row['prod_available']==1) {
                      echo "Available";

                    } else if($row['prod_available']==0) {
                      echo "Not Available";
                    }
                     ?>                      
                    </td>
                    <td class="text-left">
                    <?php echo $row['prod_launch_date']; ?>
                    </td>                    
                    <td>
                    <div class="text-center">
                        <a href="" class="btn btn-primary my-4" data-toggle="modal" data-target="#modalLoginForm<?php echo $row['id']; ?>">
                        Edit</a>
                    </div>
                    </td>
                    <form action='' method="POST">
                    <td>
                    <div class="text-center">                    
                        <input type="hidden" value="<?php echo $row['id']; ?>" name="deleteidfield" class="btn btn-danger btn-md btn-rounded mb-4">
                        <input type="submit" value="Delete" name="delete" class="btn btn-danger btn-primary my-4">
                     </div>
                    </td>
                    </form>
                  </tr>                  
                  <div class="modal fade" id="modalLoginForm<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="POST">
                      <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Edit Subcategory</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Service</label>
                            <input type="text" id="defaultForm-email" class="form-control validate" value="Hosting" disabled>
                         </div>
                        <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Sub-category Name</label>
                        <input type="text" id="defaultForm-pass" class="form-control validate" value="<?php  echo $row['prod_name']; ?>" name="prodname">
                        </div>
                        <input type="text" id="defaultForm-pass" class="form-control validate" value="<?php  echo $row['id']; ?>" name="idfield" hidden>
                        <div class="md-form mb-4">
                          <label data-error="wrong" data-success="right" for="defaultForm-pass">Link</label>
                          <input type="text" id="defaultForm-pass" class="form-control validate" value="<?php  echo $row['html']; ?>" name="prodlink">
                        </div>
                        <div class="md-form mb-4">
                          <label data-error="wrong" data-success="right" for="defaultForm-pass">Product Availability</label>                                                 
                          <select id="defaultForm-pass" class="form-control validate" name="avail">
                          <?php
                              if($row['prod_available']==1) {
                                  echo '<option value="'.$row['prod_available'].'">Available</option>';
                                  echo '<option value="0">Not Available</option>';
                              } else if($row['prod_available']==0) {
                                echo '<option value="'.$row['prod_available'].'">Not Available</option>';
                                echo '<option value="1">Available</option>';
                              }
                          ?>                          
                          </select>
                          </div>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <input type="submit" class="btn btn-default" value="Edit" name="edit">
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <?php 
                    }                
                ?>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
  </div>
  </div>
        <?php
            if(isset($_POST['edit'])) {
                $avail=isset($_POST['avail'])?$_POST['avail']:'';
                $prodname=isset($_POST['prodname'])?$_POST['prodname']:'';
                $prodlink=isset($_POST['prodlink'])?$_POST['prodlink']:'';
                $idfield=isset($_POST['idfield'])?$_POST['idfield']:'';
                $edit=new product();
                $edit->editSubCategory($avail, $prodname, $prodlink, $idfield, $connection->conn);
            }
            if(isset($_POST['delete'])) {
                $deleteidfield=isset($_POST['deleteidfield'])?$_POST['deleteidfield']:'';    
                $delete=new product();
                $delete->deleteSubCategory($deleteidfield, $connection->conn);        
            }
        ?>
        <?php
            require "footer.php";
        ?>
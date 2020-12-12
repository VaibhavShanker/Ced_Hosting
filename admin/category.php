<?php
      session_start();
      if(isset($_SESSION['userdata'])) {
          echo $_SESSION['userdata']['userid'];
      } else {
        header("Location: ../index.php");
      }
?>
<?php
	require '../classes/product.php';
	$error=array();
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
?>

  <?php
   require "header.php";
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
                                  $connection=new Dbconnect();
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
                          <input name="name" class="form-control" placeholder="" type="text" require>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Page URL</label>
                        <div class="input-group input-group-merge input-group-alternative">                    
                            <div class="input-group-prepend">                    
                            <span class="input-group-text"><!--<i class="ni ni-email-83"></i>--></span> 
                            </div>
                          <input name="link" class="form-control" placeholder="" type="text" require>
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
  </div><br><br><br><br><br><br>

      <!-- Page content -->
      <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0">
                <h3 class="mb-0">Prodect Table</h3>
              </div>



<!-- Light table -->
<div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Project</th>
                    <th scope="col" class="sort" data-sort="budget">Budget</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col">Users</th>
                    <th scope="col" class="sort" data-sort="completion">Completion</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php                                  
                                  $productparent=new product();
                                  $connection=new Dbconnect();
                                  $productparent1=$productparent->productParent($connection->conn);
                                  foreach($productparent1 as $key=>$row2) {
                                  if($row2['prod_parent_id']==1) {
                                   
                ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <!-- <a href="#" class="avatar rounded-circle mr-3">
                        <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                        </a> -->
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?php echo $row2['prod_name']; ?></span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                                   <?php echo $row2['link']; ?>
                              </td>
                    <th scope="row">
                                <div class="media align-items-center">
                                  <div class="media-body">
                                    <span class="name mb-0 text-sm"> <?php echo $row2['prod_name']; ?></span>
                                  </div>
                                </div>
                              </th>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                    </td>
                    <td>
                      <!-- <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                        </a>
                      </div> -->
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">60%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>






































































<!-- <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                        </a>
                      </div> -->
<!-- 
    
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
                                  $connection=new Dbconnect();
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
                          <input name="name" class="form-control" placeholder="" type="text" require>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Page URL</label>
                        <div class="input-group input-group-merge input-group-alternative">                    
                            <div class="input-group-prepend">                    
                            <span class="input-group-text"><!--<i class="ni ni-email-83"></i>--></span> 
                            </div>
                          <input name="link" class="form-control" placeholder="" type="text" require>
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




                                   <!-- <a class="btn btn-primary my-4" href="delete.php?dis_id=<?php echo $row2['id'];; ?>">Delete</a>
                               -->
                              </td>
                              <td class="budget">
                              <a class="btn btn-primary my-4" href="">Update</a>
                              </td>
                              <td class="text-right">
                                <!-- <div class="dropdown">
                                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="#">Updatre</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">States</a>
                                  </div>
                                </div> -->
                              </td>
                            </tr>
                            <tr>
                              <?php // echo "<option value=".$row2['id']." >".."</option>"; 
                                    }
                                }
                              ?> 
                          </tbody>
                        </table>
                      </div>
                      <!-- Card footer -->
                      <div class="card-footer py-4">
                        <nav aria-label="...">
                          <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1">
                                <i class="fas fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active">
                              <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#">
                                <i class="fas fa-angle-right"></i>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
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
              </div>
              </div>
<?php
    require "footer.php";
?>
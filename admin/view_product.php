<?php
      session_start();
      if(isset($_SESSION['userdata'])) {
          echo $_SESSION['userdata']['userid'];
      } else {
        header("Location: ../index.php");
      }
      require '../classes/product.php';
?>


  <?php
   require "header.php";
  ?><br><br><br><br><br><br>



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
                              <th scope="col" class="sort" data-sort="name">Product Parent Id</th>
                              <th scope="col" class="sort" data-sort="name">Product Name</th>
                              <th scope="col" class="sort" data-sort="budget">Link</th>
                              <th scope="col" class="sort" data-sort="status">Product Available</th>
                              <!-- <th scope="col">Users</th> -->
                              <th scope="col" class="sort" data-sort="completion">Product Launch Date</th>
                              <th scope="col" class="sort" data-sort="completion">Delete</th>
                              <th scope="col" class="sort" data-sort="completion">Update</th>
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
                            <td class="budget">
                                   <?php echo $row2['prod_parent_id']; ?>
                              </td>
                              <th scope="row">
                                <div class="media align-items-center">
                                  <div class="media-body">
                                    <span class="name mb-0 text-sm"> <?php echo $row2['prod_name']; ?></span>
                                  </div>
                                </div>
                              </th>
                              <td class="budget">
                                   <?php echo $row2['link']; ?>
                              </td>
                              <td>
                                <span class="badge badge-dot mr-4">
                                  <i class="bg-warning"></i>
                                  <span class="status">pending</span>
                                </span>
                              </td>
                              <td> 
                              <span class="badge badge-dot mr-4">
                                  <!-- <i class="ni ni-calendar-grid-58"> &nbsp;</i> -->
                                  <span class="status"><?php echo $row2['prod_launch_date']; ?></span>
                                </span>
                              </td>
                              <td class="budget">
                                   
                              <!-- function loadDoc4() {
                                        var xhttp = new XMLHttpRequest();
                                        xhttp.onreadystatechange = function() {
                                          if (this.readyState == 4 && this.status == 200) {
                                            document.getElementById("display").innerHTML =
                                            this.responseText;
                                            
                                          }
                                        };
                                        xhttp.open("GET", "all_users.php", true);
                                        xhttp.send();
                                      } -->

                              <!-- <button onclick="document.getElementById('id01').style.display='block'">Delete</button>

                              <div id="id01" class="modal">
                                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                                <form class="modal-content" action="/action_page.php">
                                  <div class="container">
                                    <h1>Delete Product</h1>
                                    <p>Are you sure you want to delete your Product?</p>
                                  
                                    <div class="clearfix">
                                      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
                                    </div>
                                  </div>
                                </form>
                              </div>

                              <script>
                              // Get the modal
                              var modal = document.getElementById('id01');

                              // When the user clicks anywhere outside of the modal, close it
                              window.onclick = function(event) {
                                if (event.target == modal) {
                                  modal.style.display = "none";
                                }
                              }
                              </script> -->



                       




                                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Delete</button>

                                  <!-- Modal -->
                                  <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Update</h4>
                                        </div>
                                        <div>
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
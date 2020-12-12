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
                                      <!-- <span class="status">pending</span> -->
                                      <span class="status">
                                      <?php                     
                                      if($row2['prod_available']==1) {
                                        echo "Available";

                                      } else if($row2['prod_available']==0) {
                                        echo "Not Available";
                                      }
                                      ?>
                                      </span>
                                    </span>
                                  </td>
                                  <td> 
                                  <span class="badge badge-dot mr-4">
                                      <!-- <i class="ni ni-calendar-grid-58"> &nbsp;</i> -->
                                      <!-- <span class="status">del</span>
                                    </span>
                                  </td>

                                  <td> 
                                  <span class="badge badge-dot mr-4"> -->
                                      <!-- <i class="ni ni-calendar-grid-58"> &nbsp;</i> -->
                                      <!-- <span class="status">update</span>
                                    </span>
                                  </td>
                                  </tr>
                </tbody>
              </table>
            </div>  -->
                           <!-- </tbody>

                                  </tr> -->



                                  <!-- <td> 
                                  <span class="badge badge-dot mr-4"> -->
                                      <!-- <i class="ni ni-calendar-grid-58"> &nbsp;</i> -->
                                      <!-- <span class="status"><?php echo $row2['prod_launch_date']; ?></span>
                                    </span>
                                  </td>
                                  <td class="budget">
                                      <?php echo $row2['link']; ?>
                                  </td>
                                  <td class="budget">
                                      <?php echo $row2['link']; ?>
                                  </td> -->
                                   
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



                       




                                  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Delete</button> -->

                                  <!-- Modal -->
                                  <!-- <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Update</h4>
                                          <div class="container">
                                       
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Large Modal</button> -->

                                        <!-- Modal -->
                                        <!-- <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Modal Header</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                          <p>This is a large modal.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                        </div>




                                        </div> -->
                                        <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Delete</button> -->

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

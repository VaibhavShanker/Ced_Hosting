<?php                                 
                                  // $con = mysqli_connect("localhost", "root", "", "cedhosting");
                                  // if (!$con) {
                                  //   die('Could not connect: ' . mysqli_error($con));
                                  // }
                                  // $sql = "SELECT * FROM tbl_product";
                                  // $result = $con->query($sql);                                            
                            // ?>   

                            <select name="drop" class="form-control" placeholder="SELECT " >
                            <option selected>Please Select</option>

                            
                            <?php
                            
                            
                            // if ($result->num_rows > 0) {
                                  //     while ($row = $result->fetch_assoc()) {
                                  //         echo "<option value=".$row['id']." >".$row['prod_name']."</option>";
                                  //     }
                                  // } else {
                                  //     echo "0 results";
                                  // }                                                
                            ?>    
                            </select>



                            <!-- <titel> -->

                            <?php                                 
											$con = mysqli_connect("localhost", "root", "", "cedhosting");
											if (!$con) {
												die('Could not connect: ' . mysqli_error($con));
											}
											$sql = "SELECT * FROM tbl_product";
											$result = $con->query($sql);                                            
									?>   
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
										<ul class="dropdown-menu">
										<?php
											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) {
													echo "<li><a href=".$row['link'].">".$row['prod_name']."</a></li>";
												}
											} else {
												echo "0 results";
											}                                                
										?>

										<?php	
											require 'classes/product.php';				
											$productparent=new product();
											$connection=new Dbconnect();
											$productparent1=$productparent->productParent($connection->conn);
											foreach($productparent1 as $key=>$row2) {
											// if($row2['id']==1) {
												echo "<li><a href=".$row2['link'].">".$row2['prod_name']."</a></li>";
												// echo "<option value=".$row2['id']." >".$row2['prod_name']."</option>";
											}
											}
										?>
										</ul>	
<?php
// session_start();
require 'Dbconnect.php';
class product
    {
            public $prod_parent_id;    
            public $prod_name;
            public $link;
            public $prod_available;
            public $prod_launch_date;


        // Add Product
            function addproduct($prod_parent_id, $prod_name, $link, $prod_launch_date, $conn)
            {      
                $error=array();
                $sql1 = "SELECT * FROM tbl_product WHERE prod_name='".$prod_name."'";
                $result = $conn->query($sql1);
                if ($result->num_rows > 0) {
                    $error[]=array("id"=>'form','msg'=>"Product Already Present");
                }  
                if (count($error)==0) {
                    $sql = "INSERT INTO tbl_product (prod_parent_id, prod_name, link, prod_available, prod_launch_date)
                        VALUES ('".$prod_parent_id."','".$prod_name."','".$link."',1,'".$prod_launch_date."')";
                    if ($conn->query($sql) === true) {
                        echo  "<script>alert('Product Add successfully');</script>";
                        // echo  "<script>alert('Please verify your Email/Mobile No. to LogIn');window.location='newotp.php';</script>";
                    } else {
                        echo '<p style="color:red;margin-left:30%;font-size:20px;
                        margin-top:10px">Unsuccesful, Product Not Add <p>';    
                    }
                } else {
                    foreach ($error as $err) {
                        $display=$err['msg'];
                    }
                }
            }

        //  select date
            function productParent($conn) 
            {
                $arr=array();
                $sql="SELECT * from tbl_product";
                $result = $conn->query($sql);
                if($result->num_rows >0) {
                while($row=$result->fetch_assoc()) {        
                array_push($arr, $row);
                }
                return $arr;
                }
                
            }
            
        // ck
            function deleteproduct(){
                $sql = "DELETE FROM tbl_location WHERE `id`='$dis_id' ";
                    if (mysqli_query($con, $sql)) {
                        echo "<script>alert('Record deleted successfully');
                        window.location='location.php';
                        </script>";
                    } else {
                    echo "Error deleting record: " . mysqli_error($con);
                    }
                echo "</table>";
                mysqli_close($con);
            }
//ck del
            function del(){                        
                $id=$_REQUEST['id'];
                $sql = "DELETE FROM tbl_product WHERE `id`='$id' ";
                    if (mysqli_query($con, $sql)) {
                        echo "<script>alert('Record deleted successfully');
                        window.location='category.php';
                        </script>";
                    } else {
                    echo "Error deleting record: " . mysqli_error($con);
                    }
                mysqli_close($con);
            }

           // Delete Category
            function deleteSubCategory($connn, $deleteidfield) {

                $sql="DELETE from tbl_product WHERE `id`='".$deleteidfield."'";
                
                if($connn->con->query($sql)==true) {
                echo '<script>alert("Sub-Category Deleted!!");window.location="category.php";
                     </script>';
                return true;
                }
                }
                

        // Add Product
            function addproducts($prod_parent_id, $prod_name, $link, $prod_launch_date, $mon_price, $annual_pricee, $sku, $webspace, $bandwidth, $freedomain, $ltsupport, $mailbox, $conn)            
            {      
                $error=array();
                // $sql1 = "SELECT * FROM tbl_product WHERE prod_name='".$prod_name."'";
                // $result = $conn->query($sql1);
                // if ($result->num_rows > 0) {
                //     $error[]=array("id"=>'form','msg'=>"Product Already Present");
                // }  
                if (count($error)==0) {
                    $sql = "INSERT INTO tbl_product (prod_parent_id, prod_name, link, prod_available, prod_launch_date)
                        VALUES ('".$prod_parent_id."','".$prod_name."','".$link."',1,'".$prod_launch_date."')";

                    if ($conn->query($sql) === true) {
                        $lastindex=$conn->insert_id;
                        echo  "<script>alert('Cates Add successfully');</script>";
                    } else {
                        echo '<p style="color:red;margin-left:30%;font-size:20px;
                        margin-top:10px">Unsuccesful, cates Not Add <p>';    
                    }
                }
                if (count($error)==0) {
                    $arr=array("webspace"=>$webspace,"bandwidth"=>$bandwidth,"freedomain"=>$freedomain,
                    "ltsupport"=>$ltsupport,"mailbox"=>$mailbox);
                    $js=json_encode($arr);
                    
                    $sql = "INSERT INTO tbl_product_description (prod_id, description, mon_price, annual_price, sku)
                    VALUES ('".$lastindex."','".$js."','".$mon_price."','".$annual_pricee."','".$sku."')";
                    
                    if ($conn->query($sql) === true) {
                        echo  "<script>alert('Product Add successfully');</script>";                     
                    
                    } else {
                        echo '<p style="color:red;margin-left:30%;font-size:20px;
                        margin-top:10px">Unsuccesful, Product Not Add <p>';    
                    }
                   

                } else {
                    foreach ($error as $err) {
                        $display=$err['msg'];
                    }
                }

               
            }























    }
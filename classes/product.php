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
                    echo  "<script>alert('Product Already Present');</script>";
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
       

            // Delete Category
            function deleteSubCategory($deleteidfield, $conn) {
                $sql="DELETE from tbl_product WHERE `id`='.$deleteidfield.'";        
                if($conn->query($sql)==true) {
                    echo '<script>alert("Sub-Category Deleted Successfully!!");window.location="category.php";</script>';
                    return true;
                }
            }


            //Edit
            function editSubCategory($avail, $prodname, $prodlink, $idfield, $conn) {
                $sql="UPDATE tbl_product SET `prod_available`='".$avail."' , `prod_name`='".$prodname."' , 
                `html`='".$prodlink."' WHERE `id`='".$idfield."'";
                if($conn->query($sql)==true) {
                    echo '<script>
                    alert("Sub-Category Updated!!");
                    window.location="category.php";
                    </script>';
                }
            }


            // Add Product
            function addproducts($prod_parent_id, $prod_name, $link, $prod_launch_date, $mon_price, $annual_pricee, $sku, $webspace, $bandwidth, $freedomain, $ltsupport, $mailbox, $conn)            
            {      
                $error=array();
                if (count($error)==0) {
                    $sql = "INSERT INTO tbl_product (prod_parent_id, prod_name, html, prod_available, prod_launch_date)
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

            
            //ParentName
            function ParentName($prod_parent_id, $conn) {
                $sql="SELECT * from tbl_product WHERE `id`='".$prod_parent_id."'";
                $result=$conn->query($sql);
                if($result->num_rows >0) {
                    while($row=$result->fetch_assoc()) {
                        echo $row['prod_name'];
                    }
                }
            }


            // ProductTable
            function ProductTable($conn) {
                $arr=array();
                $sql="SELECT * from tbl_product INNER JOIN tbl_product_description ON tbl_product.id=tbl_product_description.prod_id";
                $result=$conn->query($sql);
                if($result->num_rows >0) {
                    while($row=$result->fetch_assoc()) {                   
                        array_push($arr, $row);
                    }
                    return $arr;
                }
            }

            // function ProTable($passedId, $conn) {
            //     $arr=array();
            //     $sql="SELECT * from tbl_product INNER JOIN tbl_product_description ON tbl_product.id=tbl_product_description.prod_id WHERE prod_parent_id=$passedId "; //
            //     $result=$conn->query($sql);
            //     if($result->num_rows >0) {
            //         while($row=$result->fetch_assoc()) {                   
            //             array_push($arr, $row);
            //         }
            //         return $arr;
            //     }
            // }


            function ProTable($passedId, $conn) {
                $arr=array();
                $sql="SELECT * from tbl_product INNER JOIN tbl_product_description ON tbl_product.id=tbl_product_description.prod_id WHERE `prod_parent_id`='.$passedId.'";
                $result=$conn->query($sql);
                if($result->num_rows >0) {
                    while($row=$result->fetch_assoc()) {                   
                        array_push($arr, $row);
                    }
                    return $arr;
                }
            }

            // ParentProductId
            function ParentProductId($prod_parent_id, $conn) {
                $sql="SELECT * from tbl_product WHERE `id`='".$prod_parent_id."'";
                $result=$conn->query($sql);
                if($result->num_rows >0) {
                    while($row=$result->fetch_assoc()) {
                        return $row['prod_parent_id'];
                    }
                }
            }

            
            // parentNameSecond
            function parentNameSecond($prod_parentid1, $conn) {
                $sql="SELECT * from tbl_product WHERE `id`='".$prod_parent_id1."'";
                $result=$conn->query($sql);
                if($result->num_rows >0) {
                    while($row=$result->fetch_assoc()) {
                        return $row['prod_name'];
                    }
                }
            }


            // viewProducts
            function viewProducts($parent_id1, $conn) {
                $arr=array();
                $sql="SELECT * from tbl_product WHERE `prod_parent_id`='".$pi1."'";
                $result=$conn->query($sql);
                if($result->num_rows >0) {
                    while($row=$result->fetch_assoc()) {
                        array_push($arr, $row);
                    }
                    return $arr;
                }    
            }


            // deleteProduct
            function deleteProduct($deleteidfield, $conn) {
                $sql="DELETE from tbl_product WHERE `id`='".$deleteidfield."'";            
                if($conn->query($sql)==true) {
                echo '<script>alert("Product Deleted Successfully!!");window.location="view_product.php";</script>';                   
                }
            }


            //Updated Product 
            function editProduct($selectcat, $idfield, $prodname, $prodlink, $avail, $mprice,$aprice, $esku, $webspace, $bandwidth, $freedomain, $ltsupport, $mailbox, $conn) {
                 $sql="UPDATE tbl_product SET `prod_parent_id`='".$selectcat."' , `prod_name`='".$prodname."' , 
                `prod_available`='".$avail."' , `html`='".$prodlink."' WHERE `id`='".$idfield."'";
                if($conn->query($sql)==true) {                    
                }    
                $arr=array("webspace"=>$webspace,"bandwidth"=>$bandwidth,"freedomain"=>$freedomain,
                "ltsupport"=>$ltsupport,"mailbox"=>$mailbox);    
                $js=json_encode($arr);    
                $sql1="UPDATE tbl_product_description SET `description`='".$js."' , `mon_price`='".$mprice."' , 
                `annual_price`='".$aprice."' , `sku`='".$esku."' WHERE `prod_id`='".$idfield."'";
                if($conn->query($sql1)==true) {    
                    echo '<script>alert("Product Updated Successfully!!");window.location="view_product.php";
                    </script>';                    
                }
            }


            // CategoryTable
            function createCategoryTable($conn) {
                $arr=array();
                $sql="SELECT * from tbl_product";
                $result=$conn->query($sql);
                if($result->num_rows >0) {
                    while($row=$result->fetch_assoc()) {                       
                        array_push($arr, $row);    
                    }
                    return $arr;
                }    
            }
    



            //catDetails
            function catDetails($conn, $id) {
                $arr=array();
                $sql="SELECT * from tbl_product WHERE `id`='".$id."'";
                $result=$conn->query($sql);
                if($result->num_rows >0) {
                    while($row=$result->fetch_assoc()) {
                        array_push($arr, $row);    
                    }
                    return $arr;
                }
            }
    
            //
            function fetchChildId($conn, $id) {
                $arr=array();
                $sql="SELECT * from tbl_product WHERE `prod_parent_id`='".$id."'";
                $result=$conn->query($sql);
                if($result->num_rows >0) {
                    while($row=$result->fetch_assoc()) {
                        array_push($arr, $row);
                    }
                    return $arr;
                }
            }

    
            function fetchProductDetails($conn, $id1) {    
                $arr=array();
                $sql="SELECT * from tbl_product INNER JOIN tbl_product_description ON tbl_product.id=tbl_product_description.prod_id WHERE `prod_id`='".$id1."'";
                $result=$conn->query($sql);
                if($result->num_rows >0) {
                    while($row=$result->fetch_assoc()) {
                        array_push($arr, $row);
                    }
                    return $arr;
                }
            }



    }
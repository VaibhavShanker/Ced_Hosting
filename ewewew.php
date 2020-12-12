<?php
$deleteidfield=isset($_POST['deleteidfield'])?$_POST['deleteidfield']:'';

$delete=new Product();
$delete->deleteSubCategory($connn, $deleteidfield);
?>
<?php

    function deleteSubCategory($connn, $deleteidfield) {

    $sql="DELETE from tbl_product WHERE `id`='".$deleteidfield."'";

    if($connn->con->query($sql)==true) {
    echo '<script>
    alert("Sub-Category Deleted!!");
    window.location="category.php";
    </script>';
    return true;
    }
    }

?>

<?php
    if(!(session_id())) {
        session_start();
        }
?>


<?php

    $arr=array("webspace"=>$webspace,"bandwidth"=>$bandwidth,"freedomain"=>$freedomain,
    "ltsupport"=>$ltsupport,"mailbox"=>$mailbox);
    $js=json_encode($arr);

?>

sned $js in prod description table in description column


<?php 
    //new
    if(session_id()) {
    session_start();
    }
?>








<!-- 
my select -->
elseif (count($error)==0) {

$arr=array("webspace"=>$webspace,"bandwidth"=>$bandwidth,"freedomain"=>$freedomain,
"ltsupport"=>$ltsupport,"mailbox"=>$mailbox);
$js=json_encode($arr);

$sql = "INSERT INTO tbl_product_description (prod_id, description, mon_price, annual_pricee, sku)
VALUES (0,'".$js."','".$mon_price."','".$annual_pricee."','".$sku."')";

if ($conn->query($sql) === true) {
    echo  "<script>alert('Product Add successfully');</script>";                     

} else {
    echo '<p style="color:red;margin-left:30%;font-size:20px;
    margin-top:10px">Unsuccesful, Product Not Add <p>';    
}
}
<!-- se -->


if(session_id()) {
session_start();
}










    
if (count($error)==0) {
                    $sql = "INSERT INTO tbl_product (prod_parent_id, prod_name, link, prod_available, prod_launch_date)
                        VALUES ('".$prod_parent_id."','".$prod_name."','".$link."',1,'".$prod_launch_date."')";

                    if ($conn->query($sql) === true) {
                        // $lastindex=$conn->insert_id;
                        echo  "<script>alert('Cates Add successfully');</script>";
                    } else {
                        echo '<p style="color:red;margin-left:30%;font-size:20px;
                        margin-top:10px">Unsuccesful, cates Not Add <p>';    
                    }

                // }


                // if (count($error)==0) {

                    // $arr=array("webspace"=>$webspace,"bandwidth"=>$bandwidth,"freedomain"=>$freedomain,
                    // "ltsupport"=>$ltsupport,"mailbox"=>$mailbox);
                    // $js=json_encode($arr);
                    
                    $sql = "INSERT INTO tbl_product_description (prod_id, description, mon_price, annual_pricee, sku)
                    VALUES (1,1,'".$mon_price."','".$annual_pricee."','".$sku."')";
                    
                    if ($conn->query($sql) === true) {
                        echo  "<script>alert('Product Add successfully');</script>";                     
                    
                    } else {
                        echo '<p style="color:red;margin-left:30%;font-size:20px;
                        margin-top:10px">Unsuccesful, Product Not Add <p>';    
                    }
                    }










                    <ul class="dropdown-menu">
								<?php 
								 require_once 'classes/product.php';                                 
                                  $productparent=new product();
                                  $connection=new Dbconnect();
                                  $productparent1=$productparent->productParent($connection->conn);
                                  foreach($productparent1 as $key=>$row2) {
                                  if($row2['prod_parent_id']==1) {
								echo "<li><a href='$row2[link]'>$row2[prod_name]</a></li>";
									// echo "<option value=" >""</option>";
									// query_close($conn);
                                  }
                                  }
                            	?>
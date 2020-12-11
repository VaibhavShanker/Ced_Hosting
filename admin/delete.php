<?php
      $dis_id=$_REQUEST['dis_id'];
      require '../classes/Dbconnect.php';
      // $con = mysqli_connect("localhost", "root", "", "Schema");
      //   if (!$con) {
      //     die('Could not connect: ' . mysqli_error($con));
      //   }
        $sql = "DELETE FROM tbl_product WHERE `id`='$dis_id' ";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Record deleted successfully');
                window.location='category.php';
                </script>";
            } else {
            echo "Error deleting record: " . mysqli_error($conn);
            }

      echo "</table>";
      mysqli_close($con);
?>
<!-- 2213489496 -->
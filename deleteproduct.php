
<?php
session_start();
include ('connection.php');

 if (isset($_GET['pid'])) {
 	$pid=$_GET['pid'];

  $del= "DELETE FROM PRODUCT WHERE PRODUCT_ID=$pid";
  # code...
  $re=oci_parse($connection,$del);
  $e=oci_execute($re);
  if($e){
    header("location:traderproduct.php");
  }



}
  ?>

<?php
session_start();
include('connection.php');

if (isset($_GET['sid'])) {
  $sid = $_GET['sid'];

  $del = "DELETE FROM SHOP WHERE SHOP_ID=$sid";
  # code...
  $re = oci_parse($conn, $del);
  $e = oci_execute($re);
  if ($e) {
    header("location:tradershop.php");
  }
}
?>
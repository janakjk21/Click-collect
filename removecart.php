<?php
session_start();
include('./connection.php');

if (isset($_GET['cartid'])) {

  $cartid = $_GET['cartid'];

  $del = "DELETE FROM CART WHERE  CART_ID=$cartid";


  $re = oci_parse($conn, $del);
  $e = oci_execute($re);

  if ($e) {
    header('location:cart.php');
  }
}

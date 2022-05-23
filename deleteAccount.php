<?php
include "connection.php";
session_start();
$name = $_SESSION['cid'];
$sql = "DELETE FROM CUSTOMER WHERE CUSTOMER_ID= '$name'";
$query = oci_parse($conn, $sql) or die("Account deleting failed!!");
oci_execute($query);
session_unset();
session_destroy();
header("Location: index.php");
?>

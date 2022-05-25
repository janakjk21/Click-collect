<?php
session_start();
include('connection.php');

$next_wednesday = date('m/d/Y',strtotime('next Wednesday'));  
$next_thrusday = date('m/d/Y',strtotime('next Thursday'));
$next_friday = date('m/d/Y',strtotime('next Friday'));    
   



if(isset($_GET['cid']) && isset($_GET['cartid']) && isset($_GET['delday']) && isset($_GET['deltime'])){ 

    $asd = $_GET['delday'];
    $asw = $_GET['deltime'];

    if($asd =="Thursday"){
        $date = $next_thrusday; 
    }
    if($asd =="Friday"){
        $date = $next_friday; 
    }

    if($asd =="Wednesday"){
        $date = $next_wednesday; 
    }


    $cid = $_GET['cid'];
    $c = $_GET['cartid'];

    $x = "SELECT * FROM CART WHERE CUSTOMER_ID='$cid'";
    $y = oci_parse($conn,$x);
    oci_execute($y);
    while($z = oci_fetch_assoc($y)){
        $j = $z['CUSTOMER_ID'];
        $k = $z['PRODUCT_ID'];
        $b = $z['CART_ID'];
        $q = $z['QUANTITY'];

        $as = "SELECT * FROM PRODUCT WHERE PRODUCT_ID='$k'";
        $ad = oci_parse($conn,$as);
        $ax = oci_execute($ad);
        $ae = oci_fetch_assoc($ad);
        $da = $ae['PRODUCTQUANTITY'];
        $az = $da-$q;

        $ew = "UPDATE PRODUCT SET PRODUCTQUANTITY = '$az' WHERE PRODUCT_ID='$k'";
        $re = oci_parse($conn,$ew);
        oci_execute($re);

        $l = "INSERT INTO ORDER_DETAIL  (ORDER_ID,ORDAY,ORTIME,ORDATE,QUANTITY,PRODUCT_ID,CUSTOMER_ID) VALUES (ORDER_DETAIL_SEQ.nextval,'$asd','$asw',TO_DATE('$date', 'mm/dd/yyyy'),'$q','$k','$j')";
        // echo"hahah";
        $m = oci_parse($conn,$l);
        oci_execute($m);
        if($m){ 
            $at = "DELETE FROM CART WHERE CART_ID='$b'";
            $e = oci_parse($conn,$at);
            $f = oci_execute($e);
            if($f){ 
            header('location:cart.php');

            }

        }
    }

    


  




   
    


}

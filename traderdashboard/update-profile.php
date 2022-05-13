<?php

include "../connection.php";
    
        $id = $_POST['traderId'];
        $name = $_POST['traderName'];
        $email = $_POST['email'];
        $address = $_POST['traderAddress'];
        $phone = $_POST['phone'];

        if($_FILES['fileName']['name'] != ""){

                $file_name = $_FILES['fileName']['name'];
                $temp_name = $_FILES['fileName']['tmp_name'];
                move_uploaded_file($temp_name, "images/".$file_name);
                
                $sql = "UPDATE TRADER SET NAME = '$name', TRADER_EMAIL = '$email', TRADER_PHONE = '$phone', TRADER_ADDRESS = '$address', TRADER_PROFILE='$file_name' WHERE TRADER_ID = '$id'";
        }
        else{
                $sql = "UPDATE TRADER SET NAME = '$name', TRADER_EMAIL = '$email', TRADER_PHONE = '$phone', TRADER_ADDRESS = '$address' WHERE TRADER_ID = '$id'";     
        }
        $query=oci_parse($conn,$sql);
        oci_execute($query);

        if($query){
                        echo "<script>alert('Your profile has been updated')</script>";
                        ?>
        <META HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/Click-collect/traderdashboard/index.php#viewItem">
        <?php
                }   
                
        
        ?>
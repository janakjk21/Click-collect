<?php
$active = 'Account';
SESSION_START();
include 'connection.php';
$trader_session = $_SESSION['tid'];
$session_id = $_GET['sid'];

$get_shop = "select * from SHOP WHERE SHOP_ID='$session_id'";

$run_shop = oci_parse($conn, $get_shop);

oci_execute($run_shop);

$row_shop = oci_fetch_array($run_shop);

$shop_id = $row_shop['SHOP_ID'];
$shop_name = $row_shop['SHOP_NAME'];
$shop_address = $row_shop['SHOP_ADDRESS'];
$shop_contact = $row_shop['SHOP_PHONE'];
$shop_email = $row_shop['SHOP_EMAIL'];
$shop_photo = $row_shop['SHOP_PHOTO'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Shop - Click & Collect Groceries</title>
    <link rel="stylesheet" href="Styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="Styles/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .column {
            width: 100%;
            padding: 50px;
            border: 2px solid #74b72e;
            border-radius: 2px;
            margin-top: 10px;
            margin-left: 25px;
            text-align: left;
            box-shadow: 0% 2px #74b72e;

        }

        .sad {
            background-color: #74b72e;
            border: none;
        }


        
        .btn-primary {
            background: #ed0651;

        }

        #search .navbar-form {
            float: right;
        }

        #search {
            clear: both;
            border-top: solid 1px #74b72e;
            text-align: right;
        }

        #search .navbar-form .input-group {
            display: table;
        }

        #search .navbar-form .input-group .form-control {
            width: 100%;
        }

        #slider {
            margin-bottom: 40px;
        }
    </style>
</head>

<body>

    <?php
    if (isset($_SESSION['cid'])) {
        $customerid = $_SESSION['cid'];
    }
    ?>

    <?php
    include './navbar.php';
    ?>

    <div class="row">
    <div class="col-md-2"></div>
        <div class=" column col-md-8">
            <h1 align="center"> Edit Your Shop </h1>

            <form action="" method="post" enctype="multipart/form-data">


                <div class="form-group">
                    <!-- form-group Begin -->
                    <label> Shop Name: </label>
                    <input type="text" name="SHOP_NAME" class="form-control" value="<?php echo $shop_name; ?>" required>
                </div><!-- form-group Finish -->


                <div class="form-group">
                    <!-- form-group Begin -->
                    <label> Shop Address: </label>
                    <input type="text" name="SHOP_ADDRESS" class="form-control" value="<?php echo $shop_address; ?>" required>
                </div>


                <div class="form-group">
                    <!-- form-group Begin -->

                    <label> Shop Contact: </label>

                    <input type="text" name="SHOP_PHONE" class="form-control" value="<?php echo $shop_contact; ?>" required>

                </div><!-- form-group Finish -->

                <div class="form-group">
                    <!-- form-group Begin -->
                    <label> Shop Email: </label>
                    <input type="email" name="SHOP_EMAIL" class="form-control" value="<?php echo $shop_email; ?>" required>
                </div><!-- form-group Finish -->

                <div class="form-group">
                    <!-- form-group Begin -->

                    <label> Shop Photo: </label>

                    <input type="file" name="SHOP_PHOTO" class="form-control form-height-custom">

                    <img class="img-responsive" style="width: 100px; height: 100px;" src="./assets/img/shop/<?php echo $shop_photo; ?>" alt="product Image">

                </div><!-- form-group Finish -->

                <div class="text-center">
                    <!-- text-center Begin -->
                    <button name="update" class="btn btn-primary sad">
                        <!-- btn btn-primary Begin -->
                        <i class="fa fa-user-md"></i> Update Now
                    </button><!-- btn btn-primary inish -->
                </div>
                <br><!-- text-center Finish -->
            </form><!-- form Finish -->
        </div>
    </div>
    </div>
    <br>
    <?php include 'footer.php'; ?>

    <?php

    if (isset($_POST['update'])) {

        $update_id = $shop_id;
        $s_name = $_POST['SHOP_NAME'];
        $s_address = $_POST['SHOP_ADDRESS'];
        $s_contact = $_POST['SHOP_PHONE'];
        $s_email = $_POST['SHOP_EMAIL'];
        $s_photo = $_FILES['SHOP_PHOTO']['name'];
        $p_img1_tmp = $_FILES['SHOP_PHOTO']['tmp_name'];

        if (!empty($s_photo)) {

            move_uploaded_file($p_img1_tmp, "tradershop/$s_photo");


            $update_shop = "UPDATE SHOP SET SHOP_NAME='$s_name',SHOP_ADDRESS='$s_address',SHOP_PHONE='$s_contact',SHOP_EMAIL='$s_email',SHOP_PHOTO='$s_photo' WHERE SHOP_ID='$update_id' ";
        } else {
            $update_shop = "UPDATE SHOP SET SHOP_NAME='$s_name',SHOP_ADDRESS='$s_address',SHOP_PHONE='$s_contact',SHOP_EMAIL='$s_email' WHERE SHOP_ID='$update_id' ";
        }
        $run_shop = oci_parse($connection, $update_shop);

        oci_execute($run_shop);

        if ($run_shop) {

            echo "<script>alert('Your shop has been updated successfully.')</script>";

            echo "<script>window.open('tradershop.php','_self')</script>";
        }
    }


    ?>
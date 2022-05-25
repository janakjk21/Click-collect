<?php
SESSION_START();
include('./connection.php');
$active = 'Account';
$trader_session = $_SESSION['tid'];

$get_trader = "select * from TRADER where TRADER_ID='$trader_session'";

$run_trader = oci_parse($conn, $get_trader);

oci_execute($run_trader);

$row_trader = oci_fetch_array($run_trader);

$trader_id = $row_trader['TRADER_ID'];
$trader_name = $row_trader['NAME'];
$trader_address = $row_trader['TRADER_ADDRESS'];
$trader_contact = $row_trader['TRADER_PHONE'];
$trader_email = $row_trader['TRADER_EMAIL'];
$trader_cat = $row_trader['CATEGORY'];
$trader_image = $row_trader['TRADER_PROFILE'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CleckDiced</title>
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
        .padding-nav {
            padding-top: 10px;
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

        .column2 {
            width: 100%;
            padding: 50px;
            border: 2px solid #74b72e;
            border-radius: 2px;
            margin-top: 10px;
            text-align: left;
            box-shadow: 0% 2px #74b72e;

        }

        .sad {
            background-color: #f60606;
            border: none;
        }
    </style>

</head>

<body>
    <?php include './navbar.php'; ?>

    <div class="row d-flex">
        <div class=" col-md-2"></div>
        <div class=" col-md-8">
            <h1 align="center"> Edit Your Account </h1>

            <form action="" method="post" enctype="multipart/form-data">


                <div class="form-group">
                    <!-- form-group Begin -->
                    <label> Trader Name: </label>
                    <input type="text" name="NAME" class="form-control" value="<?php echo $trader_name; ?>" required>
                </div><!-- form-group Finish -->


                <div class="form-group">
                    <!-- form-group Begin -->
                    <label> Trader Address: </label>
                    <input type="text" name="TRADER_ADDRESS" class="form-control" value="<?php echo $trader_address; ?>" required>
                </div>


                <div class="form-group">
                    <!-- form-group Begin -->

                    <label> Trader Contact: </label>

                    <input type="text" name="TRADER_PHONE" class="form-control" value="<?php echo $trader_contact; ?>" required>

                </div><!-- form-group Finish -->

                <div class="form-group">
                    <!-- form-group Begin -->
                    <label> Trader Email: </label>
                    <input type="text" name="TRADER_EMAIL" class="form-control" value="<?php echo $trader_email; ?>" required>
                </div><!-- form-group Finish -->


                <div class="form-group">
                    <!-- form-group Begin -->
                    <label> Trader Image: </label>
                    <input type="file" name="TRADER_PROFILE" class="form-control form-height-custom">
                    <img class="img-responsive" style="width: 25%; height: 25%;" src="traimage/<?php echo isset($t_image) ? $t_image : $trader_image ?>" alt="trader Image">
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

        $update_id = $trader_id;
        $t_name = $_POST['NAME'];
        $t_address = $_POST['TRADER_ADDRESS'];
        $t_contact = $_POST['TRADER_PHONE'];
        $t_email = $_POST['TRADER_EMAIL'];
        $t_image = $_FILES['TRADER_PROFILE']['name'];
        $t_image_tmp = $_FILES['TRADER_PROFILE']['tmp_name'];
        if (!empty($t_image)) {

            move_uploaded_file($t_image_tmp, "traimage/$t_image");
            $update_trader = "UPDATE TRADER SET NAME='$t_name',TRADER_ADDRESS='$t_address',TRADER_PHONE='$t_contact',TRADER_PROFILE='$t_image' where trader_ID='$update_id' ";
        } else {
            // move_uploaded_file ($t_image_tmp,"traimage/$t_image");
            $update_trader = "UPDATE TRADER SET NAME='$t_name',TRADER_ADDRESS='$t_address',TRADER_PHONE='$t_contact' where trader_ID='$update_id' ";
        }



        $run_trader = oci_parse($conn, $update_trader);

        oci_execute($run_trader);

        if ($run_trader) {

            echo "<script>alert('Your account has been updated successfully. Please login again.')</script>";

            echo "<script>window.open('traderprofile.php','_self')</script>";
        }
    }

    ?>
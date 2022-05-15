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


        .navbar {
            background-color: #000000;
        }

        .navbar-collapse .right {
            float: right;
        }

        .navbar-brand {
            float: left;
            padding: 10px 15px;
            font-size: 18px;
            line-height: 20px;
            height: 70px;
        }

        .navbar-brand:hover,
        .navbar-brand:focus {
            text-decoration: none;
        }

        .navbar ul.nav>li>a {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
        }

        .navbar ul.nav>li>a:hover {
            background: #e7e7e7;
        }

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
    </style>
</head>

<body>

    <?php
    if (isset($_SESSION['cid'])) {
        $customerid = $_SESSION['cid'];
    ?>
        <div id="navbar" class="navbar navbar-default">
            <!-- navbar navbar-default Begin -->
            <div class="container">
                <!-- container Begin -->
                <div class="navbar-header">
                    <!-- navbar-header Begin -->
                    <a href="index.php" class="navbar-brand home">
                        <!-- navbar-brand home Begin -->
                        <img src="logo.png" alt="" style="width: 110px; height:50px;">
                        <!-- <img src="hungerWW.png" alt="Logo Mobile" class="visible-xs"> -->
                    </a><!-- navbar-brand home Finish -->
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div><!-- navbar-header Finish -->
                <div class="navbar-collapse collapse" id="navigation">
                    <!-- navbar-collapse collapse Begin -->
                    <div class="padding-nav">
                        <!-- padding-nav Begin -->
                        <ul class="nav navbar-nav left">
                            <!-- nav navbar-nav left Begin -->
                            <li class="<?php if ($active == 'Home') echo "active"; ?>">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="<?php if ($active == 'Shop') echo "active"; ?>">
                                <a href="shop.php">Shop</a>
                            </li>
                            <li class="<?php if ($active == 'Account') echo "active"; ?>">

                                <a href="customerview.php">My Account</a>
                            </li>
                            <li class="<?php if ($active == 'Cart') echo "active"; ?>">
                                <a href="cart.php">Shopping Cart</a>
                            </li>
                            <li class="<?php if ($active == 'Contact') echo "active"; ?>">
                                <a href="contact1.php">Contact Us</a>
                            </li>
                        </ul><!-- nav navbar-nav left Finish -->
                    </div><!-- padding-nav Finish -->

                    <a href="customerview.php" class="btn navbar-btn btn-primary right">

                        <?php


                        echo "Welcome: " . $_SESSION['NAME'] . "";



                        ?>

                    </a>
                    <a href="cart.php" class="btn navbar-btn btn-primary right">
                        <!-- btn navbar-btn btn-primary Begin -->
                        <i class="fa fa-shopping-cart"></i>
                        <span>Cart</span>
                    </a><!-- btn navbar-btn btn-primary Finish -->

                    <div class="navbar-collapse collapse right">
                        <!-- navbar-collapse collapse right Begin -->
                        <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                            <!-- btn btn-primary navbar-btn Begin -->
                            <span class="sr-only">Toggle Search</span>
                            <i class="fa fa-search"></i>
                        </button><!-- btn btn-primary navbar-btn Finish -->
                    </div><!-- navbar-collapse collapse right Finish -->
                    <div class="collapse clearfix" id="search">
                        <!-- collapse clearfix Begin -->
                        <form method="get" action="results.php" class="navbar-form">
                            <!-- navbar-form Begin -->
                            <div class="input-group">
                                <!-- input-group Begin -->
                                <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                                <span class="input-group-btn">
                                    <!-- input-group-btn Begin -->
                                    <button type="submit" name="search" value="Search" class="btn btn-primary">
                                        <!-- btn btn-primary Begin -->
                                        <i class="fa fa-search"></i>
                                    </button><!-- btn btn-primary Finish -->
                                </span><!-- input-group-btn Finish -->
                            </div><!-- input-group Finish -->
                        </form><!-- navbar-form Finish -->
                    </div><!-- collapse clearfix Finish -->
                </div><!-- navbar-collapse collapse Finish -->
            </div><!-- container Finish -->
        </div><!-- navbar navbar-default Finish -->
    <?php
    } elseif (isset($_SESSION['tid'])) {
        $traderid = $_SESSION['tid'];
    ?>
        <div id="navbar" class="navbar navbar-default">
            <!-- navbar navbar-default Begin -->
            <div class="container">
                <!-- container Begin -->
                <div class="navbar-header">
                    <!-- navbar-header Begin -->
                    <a href="index.php" class="navbar-brand home">
                        <!-- navbar-brand home Begin -->
                        <img src="logo.png" alt="" style="width: 110px; height:50px;">
                        <!-- <img src="hungerWW.png" alt="Logo Mobile" class="visible-xs"> -->
                    </a><!-- navbar-brand home Finish -->
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div><!-- navbar-header Finish -->
                <div class="navbar-collapse collapse" id="navigation">
                    <!-- navbar-collapse collapse Begin -->
                    <div class="padding-nav">
                        <!-- padding-nav Begin -->
                        <ul class="nav navbar-nav left">
                            <!-- nav navbar-nav left Begin -->
                            <li class="<?php if ($active == 'Home') echo "active"; ?>">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="<?php if ($active == 'Shop') echo "active"; ?>">
                                <a href="shop.php">Shop</a>
                            </li>
                            <li class="<?php if ($active == 'Account') echo "active"; ?>">

                                <a href="traderprofile.php">My Account</a>
                            </li>
                            <li class="<?php if ($active == 'Cart') echo "active"; ?>">
                                <a href="login.php">Shopping Cart</a>
                            </li>
                            <li class="<?php if ($active == 'Contact') echo "active"; ?>">
                                <a href="contact1.php">Contact Us</a>
                            </li>
                        </ul><!-- nav navbar-nav left Finish -->
                    </div><!-- padding-nav Finish -->

                    <a href="traderprofile.php" class="btn navbar-btn btn-primary right">

                        <?php


                        echo "Welcome: " . $_SESSION['NAME'] . "";



                        ?>

                    </a>
                    <a href="login.php" class="btn navbar-btn btn-primary right">
                        <!-- btn navbar-btn btn-primary Begin -->
                        <i class="fa fa-shopping-cart"></i>
                        <span>Cart</span>
                    </a><!-- btn navbar-btn btn-primary Finish -->

                    <div class="navbar-collapse collapse right">
                        <!-- navbar-collapse collapse right Begin -->
                        <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                            <!-- btn btn-primary navbar-btn Begin -->
                            <span class="sr-only">Toggle Search</span>
                            <i class="fa fa-search"></i>
                        </button><!-- btn btn-primary navbar-btn Finish -->
                    </div><!-- navbar-collapse collapse right Finish -->
                    <div class="collapse clearfix" id="search">
                        <!-- collapse clearfix Begin -->
                        <form method="get" action="results.php" class="navbar-form">
                            <!-- navbar-form Begin -->
                            <div class="input-group">
                                <!-- input-group Begin -->
                                <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                                <span class="input-group-btn">
                                    <!-- input-group-btn Begin -->
                                    <button type="submit" name="search" value="Search" class="btn btn-primary">
                                        <!-- btn btn-primary Begin -->
                                        <i class="fa fa-search"></i>
                                    </button><!-- btn btn-primary Finish -->
                                </span><!-- input-group-btn Finish -->
                            </div><!-- input-group Finish -->
                        </form><!-- navbar-form Finish -->
                    </div><!-- collapse clearfix Finish -->
                </div><!-- navbar-collapse collapse Finish -->
            </div><!-- container Finish -->
        </div><!-- navbar navbar-default Finish -->
    <?php
    } else {
    ?>
        <div id="navbar" class="navbar navbar-default">
            <!-- navbar navbar-default Begin -->
            <div class="container">
                <!-- container Begin -->
                <div class="navbar-header">
                    <!-- navbar-header Begin -->
                    <a href="index.php" class="navbar-brand home">
                        <!-- navbar-brand home Begin -->
                        <img src="logo.png" alt="" style="width: 110px; height:50px;">
                        <!-- <img src="hungerWW.png" alt="Logo Mobile" class="visible-xs"> -->
                    </a><!-- navbar-brand home Finish -->
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div><!-- navbar-header Finish -->
                <div class="navbar-collapse collapse" id="navigation">
                    <!-- navbar-collapse collapse Begin -->
                    <div class="padding-nav">
                        <!-- padding-nav Begin -->
                        <ul class="nav navbar-nav left">
                            <!-- nav navbar-nav left Begin -->
                            <li class="<?php if ($active == 'Home') echo "active"; ?>">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="<?php if ($active == 'Shop') echo "active"; ?>">
                                <a href="shop.php">Shop</a>
                            </li>
                            <li class="<?php if ($active == 'Account') echo "active"; ?>">

                                <a href="login.php">My Account</a>
                            </li>
                            <li class="<?php if ($active == 'Cart') echo "active"; ?>">
                                <a href="cart.php">Shopping Cart</a>
                            </li>
                            <li class="<?php if ($active == 'Contact') echo "active"; ?>">
                                <a href="contact1.php">Contact Us</a>
                            </li>
                        </ul><!-- nav navbar-nav left Finish -->
                    </div><!-- padding-nav Finish -->

                    <a href="customerview.php" class="btn navbar-btn btn-primary right">

                        <?php
                        echo "Welcome: Guest";

                        ?>

                    </a>
                    <a href="cart.php" class="btn navbar-btn btn-primary right">
                        <!-- btn navbar-btn btn-primary Begin -->
                        <i class="fa fa-shopping-cart"></i>
                        <span>Cart</span>
                    </a><!-- btn navbar-btn btn-primary Finish -->

                    <div class="navbar-collapse collapse right">
                        <!-- navbar-collapse collapse right Begin -->
                        <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                            <!-- btn btn-primary navbar-btn Begin -->
                            <span class="sr-only">Toggle Search</span>
                            <i class="fa fa-search"></i>
                        </button><!-- btn btn-primary navbar-btn Finish -->
                    </div><!-- navbar-collapse collapse right Finish -->
                    <div class="collapse clearfix" id="search">
                        <!-- collapse clearfix Begin -->
                        <form method="get" action="results.php" class="navbar-form">
                            <!-- navbar-form Begin -->
                            <div class="input-group">
                                <!-- input-group Begin -->
                                <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                                <span class="input-group-btn">
                                    <!-- input-group-btn Begin -->
                                    <button type="submit" name="search" value="Search" class="btn btn-primary">
                                        <!-- btn btn-primary Begin -->
                                        <i class="fa fa-search"></i>
                                    </button><!-- btn btn-primary Finish -->
                                </span><!-- input-group-btn Finish -->
                            </div><!-- input-group Finish -->
                        </form><!-- navbar-form Finish -->
                    </div><!-- collapse clearfix Finish -->
                </div><!-- navbar-collapse collapse Finish -->
            </div><!-- container Finish -->
        </div><!-- navbar navbar-default Finish -->
    <?php } ?>
    <div class="row">
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

                    <img class="img-responsive" style="width: 100px; height: 100px;" src="tradershop/<?php echo $shop_photo; ?>" alt="product Image">

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
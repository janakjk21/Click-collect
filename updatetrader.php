<?php
SESSION_START();
include('./connection.php');
$active = 'Account';
$trader_session = $_SESSION['tid'];

$get_trader = "select * from TRADER where TRADER_ID='$trader_session'";

$run_trader = oci_parse($connection, $get_trader);

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
        <div class=" column2 col-md-8">
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



        $run_trader = oci_parse($connection, $update_trader);

        oci_execute($run_trader);

        if ($run_trader) {

            echo "<script>alert('Your account has been updated successfully. Please login again.')</script>";

            echo "<script>window.open('traderprofile.php','_self')</script>";
        }
    }

    ?>
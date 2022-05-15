<?php
SESSION_START();
include('./connection.php');
$active = 'Account';
$product_session = $_GET['pid'];

$get_product = "select * from PRODUCT where PRODUCT_ID='$product_session'";

$run_product = oci_parse($connection, $get_product);

oci_execute($run_product);

$row_product = oci_fetch_array($run_product);

$product_id = $row_product['PRODUCT_ID'];
$product_image1 = $row_product['PRODUCT_PIC1'];
$product_image2 = $row_product['PRODUCT_PIC2'];
$product_image3 = $row_product['PRODUCT_PIC3'];
$product_name = $row_product['PRODUCT_NAME'];
$product_category = $row_product['CATEGORY'];
$product_price = $row_product['PRODUCTPRICE'];
$product_quantity = $row_product['PRODUCTQUANTITY'];
$product_unit = $row_product['PRODUCTUNIT'];
$product_minorder = $row_product['MINORDER'];
$product_maxorder = $row_product['MAXORDER'];
$product_description = $row_product['PRODUCTDES'];
$product_discount = $row_product['DISAMOUNT'];
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


        .sad1 {
            background-color: #74b72e;
            border: none;
        }

        li {
            font-family: Arial, Helvetica, sans-serif;
        }

        h4 {
            margin-left: 0px;
            color: #003366;
            font-family: Arial, Helvetica, sans-serif;
            /*outline: 1px solid grey;*/
        }

        li i {
            color: #74b72e;

            font-family: Arial, Helvetica, sans-serif;
        }

        .view {
            float: left;
            background-color: #f1f1f1;
            width: 180px;
            height: 100%;
            position: relative;
        }

        .view a {
            float: left;
            color: black;
            padding: 25px;
            text-decoration: black;
        }

        .view a.active {
            background-color: #003366;
            ;
            color: white;
            width: 180px;
        }

        .view a:hover:not(.active) {
            background-color: #74b72e;
            color: white;
            width: 180px;
        }

        .column {
            width: 100%;
            padding: 50px;
            border: 1px solid #74b72e;
            margin: 10px;
            margin-left: 10px;
            text-align: left;
            box-shadow: 0% 2px #74b72e;
        }

        .column2 {
            margin-right: 0px;
            width: 50%;
            border: 0px solid #74b72e;
            /*margin: 10px;*/
            /*padding: 10px;*/
        }

        .column3 {
            justify-content: center;
            margin-left: 0px;
        }

        .column4 {
            margin-top: 5px;
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
            <h1 align="center"> Edit Your Product </h1>

            <form action="" method="post" enctype="multipart/form-data">
                <!-- form Begin -->

                <div class="form-group">
                    <!-- form-group Begin -->

                    <label> Product Image 1: </label>

                    <input type="file" name="PRODUCT_PIC1" class="form-control form-height-custom">

                    <img class="img-responsive" style="width: 100px; height: 100px;" src="products/<?php echo $product_image1; ?>" alt="product Image">

                </div><!-- form-group Finish -->


                <div class="form-group">
                    <!-- form-group Begin -->

                    <label> Product Image 2: </label>

                    <input type="file" name="PRODUCT_PIC2" class="form-control form-height-custom">

                    <img class="img-responsive" style="width: 100px; height: 100px;" src="products/<?php echo $product_image2; ?>" alt="<?php echo $product_image2; ?>">

                </div><!-- form-group Finish -->


                <div class="form-group">
                    <!-- form-group Begin -->

                    <label> Product Image 3: </label>

                    <input type="file" name="PRODUCT_PIC3" class="form-control form-height-custom">

                    <img class="img-responsive" style="width: 100px; height: 100px;" src="products/<?php echo $product_image3; ?>" alt="product Image">

                </div><!-- form-group Finish -->



                <div class="form-group">
                    <!-- form-group Begin -->

                    <label> Product Name: </label>

                    <input type="text" name="PRODUCT_NAME" class="form-control" value="<?php echo $product_name; ?>" required>

                </div><!-- form-group Finish -->

                <div class="form-group">
                    <!-- form-group Begin -->


                    <label>Product Category </label>
                    <select name="CATEGORY" class="form-control">

                        <option>Bakery</option>
                        <option>Butcher</option>
                        <option>Delicatessen</option>
                        <option>Fishmonger</option>
                        <option>Green Grocery</option>



                    </select>
                </div>

                <div class="form-group">
                    <!-- form-group Begin -->

                    <label>Product Price: </label>

                    <input type="text" name="PRODUCTPRICE" class="form-control" value="<?php echo $product_price; ?>" required>

                </div>

                <div class="form-group">
                    <!-- form-group Begin -->

                    <label>Product Quantity: </label>

                    <input type="text" name="PRODUCTQUANTITY" class="form-control" value="<?php echo $product_quantity; ?>" required>


                </div><!-- form-group Finish -->


                <div class="form-group">
                    <!-- form-group Begin -->

                    <label>Product Unit: </label>

                    <input type="text" name="PRODUCTUNIT" class="form-control" value="<?php echo $product_unit; ?>" required>


                </div><!-- form-group Finish -->


                <div class="form-group">
                    <!-- form-group Begin -->

                    <label>Minimum Order: </label>

                    <input type="text" name="MINORDER" class="form-control" value="<?php echo $product_minorder; ?>" required>


                </div><!-- form-group Finish -->



                <div class="form-group">
                    <!-- form-group Begin -->

                    <label>Maximum Order: </label>

                    <input type="text" name="MAXORDER" class="form-control" value="<?php echo $product_maxorder; ?>" required>


                </div><!-- form-group Finish -->

                <div class="form-group">
                    <!-- form-group Begin -->

                    <label>Product Description: </label>

                    <input type="text" name="PRODUCTDES" class="form-control" value="<?php echo $product_description; ?>" required>

                </div>
                <div class="form-group">
                    <!-- form-group Begin -->

                    <label>Discount Amount: </label>

                    <input type="text" name="DISAMOUNT" class="form-control" value="<?php echo $product_discount; ?>">

                </div>



                <div class="text-center">
                    <!-- text-center Begin -->

                    <button name="update" class="btn btn-primary sad">
                        <!-- btn btn-primary Begin -->

                        <i class="fa fa-user-md"></i> Update Now

                    </button><!-- btn btn-primary inish -->

                </div><!-- text-center Finish -->
                <br>

            </form><!-- form Finish -->
        </div>
    </div>

    <br>
    <?php include 'footer.php'; ?>
</body>

</html>

<?php

if (isset($_POST['update'])) {

    $update_id = $product_id;
    $p_img1 = $_FILES['PRODUCT_PIC1']['name'];
    $p_img1_tmp = $_FILES['PRODUCT_PIC1']['tmp_name'];
    $p_img2 = $_FILES['PRODUCT_PIC2']['name'];
    $p_img2_tmp = $_FILES['PRODUCT_PIC2']['tmp_name'];
    $p_img3 = $_FILES['PRODUCT_PIC3']['name'];
    $p_img3_tmp = $_FILES['PRODUCT_PIC3']['tmp_name'];
    $p_name = $_POST['PRODUCT_NAME'];
    $p_category = $_POST['CATEGORY'];
    $p_price = $_POST['PRODUCTPRICE'];
    $p_quantity = $_POST['PRODUCTQUANTITY'];
    $p_unit = $_POST['PRODUCTUNIT'];
    $p_minorder = $_POST['MINORDER'];
    $p_maxorder = $_POST['MAXORDER'];
    $p_description = $_POST['PRODUCTDES'];
    $product_discount = $_POST['DISAMOUNT'];

    if (!empty($p_img1 && $p_img2 && $p_img3)) {

        move_uploaded_file($p_img1_tmp, "products/$p_img1");
        move_uploaded_file($p_img2_tmp, "products/$p_img2");
        move_uploaded_file($p_img3_tmp, "products/$p_img3");

        $update_product = "UPDATE PRODUCT SET PRODUCT_PIC1='$p_img1',PRODUCT_PIC2='$p_img2',PRODUCT_PIC3='$p_img3',PRODUCT_NAME='$p_name',CATEGORY='$p_category',PRODUCTPRICE='$p_price',PRODUCTQUANTITY='$p_quantity',PRODUCTUNIT='$p_unit',MINORDER='$p_minorder',MAXORDER='$p_maxorder',PRODUCTDES='$p_description',DISAMOUNT ='$product_discount' where PRODUCT_ID='$update_id' ";
    } elseif (!empty($p_img1 && $p_img2) && empty($p_img3)) {
        move_uploaded_file($p_img1_tmp, "products/$p_img1");
        move_uploaded_file($p_img2_tmp, "products/$p_img2");

        $update_product = "UPDATE PRODUCT SET PRODUCT_PIC1='$p_img1',PRODUCT_PIC2='$p_img2', PRODUCT_NAME='$p_name',CATEGORY='$p_category',PRODUCTPRICE='$p_price',PRODUCTQUANTITY='$p_quantity',PRODUCTUNIT='$p_unit',MINORDER='$p_minorder',MAXORDER='$p_maxorder',PRODUCTDES='$p_description',DISAMOUNT ='$product_discount'  where PRODUCT_ID='$update_id' ";
    } elseif (!empty($p_img1 && $p_img3) && empty($p_img2)) {
        move_uploaded_file($p_img1_tmp, "products/$p_img1");
        move_uploaded_file($p_img3_tmp, "products/$p_img3");

        $update_product = "UPDATE PRODUCT SET PRODUCT_PIC1='$p_img1',PRODUCT_PIC3='$p_img3', PRODUCT_NAME='$p_name',CATEGORY='$p_category',PRODUCTPRICE='$p_price',PRODUCTQUANTITY='$p_quantity',PRODUCTUNIT='$p_unit',MINORDER='$p_minorder',MAXORDER='$p_maxorder',PRODUCTDES='$p_description',DISAMOUNT ='$product_discount'  where PRODUCT_ID='$update_id' ";
    } elseif (!empty($p_img2 && $p_img3) && empty($p_img1)) {
        move_uploaded_file($p_img2_tmp, "products/$p_img2");
        move_uploaded_file($p_img3_tmp, "products/$p_img3");
        $update_product = "UPDATE PRODUCT SET PRODUCT_PIC2='$p_img2',PRODUCT_PIC3='$p_img3', PRODUCT_NAME='$p_name',CATEGORY='$p_category',PRODUCTPRICE='$p_price',PRODUCTQUANTITY='$p_quantity',PRODUCTUNIT='$p_unit',MINORDER='$p_minorder',MAXORDER='$p_maxorder',PRODUCTDES='$p_description',DISAMOUNT ='$product_discount'  where PRODUCT_ID='$update_id' ";
    } elseif (!empty($p_img2) && empty($p_img1 && $p_img3)) {
        move_uploaded_file($p_img2_tmp, "products/$p_img2");
        $update_product = "UPDATE PRODUCT SET PRODUCT_PIC2='$p_img2',PRODUCT_NAME='$p_name',CATEGORY='$p_category',PRODUCTPRICE='$p_price',PRODUCTQUANTITY='$p_quantity',PRODUCTUNIT='$p_unit',MINORDER='$p_minorder',MAXORDER='$p_maxorder',PRODUCTDES='$p_description',DISAMOUNT ='$product_discount'  where PRODUCT_ID='$update_id' ";
    } elseif (!empty($p_img1) && empty($p_img2 && $p_img3)) {
        move_uploaded_file($p_img1_tmp, "products/$p_img1");
        $update_product = "UPDATE PRODUCT SET PRODUCT_PIC1='$p_img1', PRODUCT_NAME='$p_name',CATEGORY='$p_category',PRODUCTPRICE='$p_price',PRODUCTQUANTITY='$p_quantity',PRODUCTUNIT='$p_unit',MINORDER='$p_minorder',MAXORDER='$p_maxorder',PRODUCTDES='$p_description',DISAMOUNT ='$product_discount'  where PRODUCT_ID='$update_id' ";
    } elseif (!empty($p_img3) && empty($p_img1 && $p_img2)) {
        move_uploaded_file($p_img3_tmp, "products/$p_img3");
        $update_product = "UPDATE PRODUCT SET PRODUCT_PIC3='$p_img3', PRODUCT_NAME='$p_name',CATEGORY='$p_category',PRODUCTPRICE='$p_price',PRODUCTQUANTITY='$p_quantity',PRODUCTUNIT='$p_unit',MINORDER='$p_minorder',MAXORDER='$p_maxorder',PRODUCTDES='$p_description',DISAMOUNT ='$product_discount'  where PRODUCT_ID='$update_id' ";
    } else {
        $update_product = "UPDATE PRODUCT SET  PRODUCT_NAME='$p_name',CATEGORY='$p_category',PRODUCTPRICE='$p_price',PRODUCTQUANTITY='$p_quantity',PRODUCTUNIT='$p_unit',MINORDER='$p_minorder',MAXORDER='$p_maxorder',PRODUCTDES='$p_description',DISAMOUNT ='$product_discount'  where PRODUCT_ID='$update_id' ";
    }

    $run_product = oci_parse($connection, $update_product);

    oci_execute($run_product);

    if ($run_product) {

        echo "<script>alert('Your product has been updated successfully.')</script>";

        echo "<script>window.open('traderproduct.php','_self')</script>";
    }
}

?>
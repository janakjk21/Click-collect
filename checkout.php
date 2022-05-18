<?php
session_start();
include('connection.php');
$active = 'Cart';
if (!isset($_SESSION['cid'])) {
    header("location: customerview.php");
} else {
    $customerid = $_SESSION['cid'];
    $_SESSION['cid'] = $customerid;
}



function collection()
{
    date_default_timezone_set("Asia/Kathmandu");

    $a = date("Y/m/d");
    $b = date("l");
    $c = date("h:i:sa");




    if ($b == "Sunday" || $b == "Monday" || $b == "Tuesday") {

        $day1 = <<<SPLIT
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
 
SPLIT;
        echo $day1;
    } else if ($b == "Wednesday") {
        # code...
        $day2 = <<<SPLIT
                        
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
 
SPLIT;
        echo $day2;
    } else if ($b == "Thursday") {
        # code...
        $day1 = <<<SPLIT
                        
                        <option value="Friday">Friday</option>
                        <option value="Wednesday">Next Wednesday</option>
                        
                        
 
SPLIT;
        echo $day1;
    } else if ($b == "Friday") {
        # code...
        $day1 = <<<SPLIT
                        <option value="Wednesday"> Next Wednesday</option>
                        <option value="Thursday"> Next Thursday</option>
                        
                        
                         
SPLIT;
        echo $day1;
    } else {
        $day1 = <<<SPLIT
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
 
SPLIT;
        echo $day1;
    }
}



function timer()
{

    $b = date("l");
    $c = date("h G");

    if ($b == "Sunday" || $b == "Monday" || $b == "Tuesday" || $b == "Saturday") {

        $d5 = <<<SPLIT
                        <option value="10am to 1pm">10 a.m to 1 p.m</option>
                        <option value="1pm to 4pm">1 p.m to 4 p.m</option>
                        <option value="4pm to 7pm">4 p.m to 7p.m</option>
 
SPLIT;
        echo $d5;
    } else {

        if ($c > "18" || $c < "10") {

            $d1 = <<<SPLIT
                        <option value="10am to 1pm">10 a.m to 1 p.m</option>
                        <option value="1pm to 4pm">1 p.m to 4 p.m</option>
                        <option value="4pm to 7pm">4 p.m to 7p.m</option>
 
SPLIT;
            echo $d1;
        } elseif ($c < 13) {
            # code...
            $d2 = <<<SPLIT
                        <option value="1pm to 4pm">1 p.m to 4 p.m</option>
                        <option value="4pm to 7pm">4 p.m to 7p.m</option>
 
SPLIT;
            echo $d2;
        } elseif ($c < 16) {
            # code...
            $d3 = <<<SPLIT
                        <option value="4pm to 7pm">4 p.m to 7p.m</option>
 
SPLIT;
            echo $d3;
        }
    }
}

if (isset($_POST['submit'])) {
    $asd = $_POST['day'];
    $asw = $_POST['timing'];
}
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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .bloc_left_price {
            color: #c01508;
            text-align: center;
            font-weight: bold;
            font-size: 150%;
        }

        .category_block li:hover {
            background-color: #007bff;
        }

        .category_block li:hover a {
            color: #ffffff;
        }

        .category_block li a {
            color: #343a40;
        }

        .add_to_cart_block .price {
            color: #c01508;
            text-align: center;
            font-weight: bold;
            font-size: 200%;
            margin-bottom: 0;
        }

        .add_to_cart_block .price_discounted {
            color: #343a40;
            text-align: center;
            text-decoration: line-through;
            font-size: 140%;
        }

        .product_rassurance {
            padding: 10px;
            margin-top: 15px;
            background: #ffffff;
            border: 1px solid #6c757d;
            color: #6c757d;
        }

        .product_rassurance .list-inline {
            margin-bottom: 0;
            text-transform: uppercase;
            text-align: center;
        }

        .product_rassurance .list-inline li:hover {
            color: #343a40;
        }

        .pagination {
            margin-top: 20px;
        }

        .td {
            width: 80px;
            height: 60px;

        }

        img {
            width: 80px;
            height: 60px;

        }

        .btn-primary {
            background-color: #ff5300;
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
    <!-- cart section -->
    <div id="content">
        <!-- #content Begin -->
        <div class="container">
            <!-- container Begin -->
            <div id="cart" class="col-md-9">
                <!-- col-md-9 Begin -->

                <div class="box">
                    <!-- box Begin -->

                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" enctype="multipart/form-data">
                        <!-- form Begin -->

                        <h1>Shopping Cart</h1>

                        <?php


                        $t = 0;


                        $a = "SELECT * FROM CART,PRODUCT WHERE CART.PRODUCT_ID=PRODUCT.PRODUCT_ID AND CUSTOMER_ID='$customerid'";
                        $b = oci_parse($conn, $a);
                        $c = oci_execute($b);
                        $f = oci_num_rows($b);
                        echo '<div class="table-responsive">';
                        echo '<table class="table table-striped text-center">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th scope="col">Product</th>';
                        echo '<th scope="col">Product Name</th>';
                        echo '<th scope="col">Price</th>';
                        echo '<th scope="col" class="text-center">Quantity</th>';
                        echo '<th scope="col" class="text-right">Total Price</th>';
                        echo '<th>Action</th>';
                        echo '</tr>';
                        echo '</thead>';
                        while ($d = oci_fetch_assoc($b)) {
                            echo '<tbody>';
                            $m = $d['PRODUCT_ID'];
                            echo '<tr>';
                            echo '<td><img src="products/' . $d['PRODUCT_PIC1'] . '" /> </td>';
                            echo '<td>' . $d['PRODUCT_NAME'] . '</td>';
                            $dis = $d['DISAMOUNT'];
                            echo '<td>$' . ($d['PRODUCTPRICE'] - ($d['PRODUCTPRICE'] * ($dis / 100))) . '</td>';
                            echo '<td>' . $d['QUANTITY'] . '</td>';
                            $m = $d['QUANTITY'] * ($d['PRODUCTPRICE'] - ($d['PRODUCTPRICE'] * ($dis / 100)));
                            $t = $t + $m;
                            $id = $d['CART_ID'];

                            echo '<td class="text-right">$' . $m . '</td>';
                            echo '<td class="text-right"><button class="btn btn-sm btn-danger"><a href="removecart.php?cartid=' . $id . '" style="text-decoration:none; color:white; font-style:bold;"> Remove</a></button> </td>';
                            echo '</tr>';
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Grand Total</strong></td>
                            <td class="text-right"><strong> <?php echo "$" . $t;  ?></strong></td>
                            </td>
                        </tr>
                        </tbody>
                        </table>
                        <div class="box-footer">
                            <!-- box-footer Begin -->

                            <div class="pull-left">
                                <!-- pull-left Begin -->

                                <a href="shop.php" class="btn btn-default">
                                    <!-- btn btn-default Begin -->
                                    <i class="fa fa-chevron-left"></i> Continue Shopping
                                </a><!-- btn btn-default Finish -->
                            </div><!-- pull-left Finish -->
                            <div class="pull-right">
                                <!-- pull-right Begin -->
                                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
                                    <input type="hidden" name="business" value="sunnycrextha-facilitator@gmail.com">
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="upload" value="1">
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="business" value="hungerworld2020@gmail.com">
                                    <input type="hidden" name="return" value="http://localhost/final/order.php?cid=<?php echo $customerid; ?>&cartid=<?php echo $id; ?>&delday=<?php echo $asd; ?>&deltime=<?php echo $asw;   ?>">
                                    <input type="hidden" name="cancel_return" value="http://localhost/final/login.php">



                                    <?php

                                    $m = "SELECT * FROM CART,PRODUCT WHERE CART.PRODUCT_ID=PRODUCT.PRODUCT_ID AND CUSTOMER_ID='$customerid'";
                                    $n = oci_parse($conn, $m);
                                    $o = oci_execute($n);
                                    $g = 0;
                                    while ($p = oci_fetch_assoc($n)) {

                                        $g = $g + 1;

                                        echo '<input type="hidden" name="item_name_' . $g . '" value="' . $p['PRODUCT_NAME'] . '">';
                                        echo '<input type="hidden" name="amount_' . $g . '" value="' . $p['PRODUCTPRICE'] . '">';
                                        echo '<input type="hidden" name="quantity_' . $g . '" value="' . $p['QUANTITY'] . '">';
                                    }
                                    ?>






                                    <br>
                                    <br>
                                    <div class="clearfix">
                                        <div class="float-right">
                                            <button style="background:#012169; color:white; font-style:bold; border:none;" type="submit" name="submit" class="btn btn-primary"> Pay Via Paypal</button>
                                        </div>
                                    </div>

                                </form>
                            </div><!-- pull-right Finish -->

                        </div><!-- box-footer Finish -->

                    </form><!-- form Finish -->

                </div><!-- box Finish -->

            </div><!-- #row same-heigh-row Finish -->

        </div><!-- col-md-9 Finish -->

        <div class="col-md-3">
            <!-- col-md-3 Begin -->

            <div id="order-details" class="box">
                <!-- box Begin -->

                <div class="box-header">
                    <!-- box-header Begin -->

                    <h3>Order Details</h3>

                </div><!-- box-header Finish -->

                <p class="text-muted">
                    <!-- text-muted Begin -->
                    Pricing is calculated according to the delivery details and items added in cart
                </p><!-- text-muted Finish -->

                <div class="table-responsive">
                    <!-- table-responsive Begin -->

                    <table class="table">
                        <!-- table Begin -->

                        <tbody>
                            <!-- tbody Begin -->


                            <tr>
                                <!-- tr Begin -->

                                <td> Delivery Charge</td>
                                <td> $0 </td>

                            </tr><!-- tr Finish -->

                            <tr class="total">
                                <!-- tr Begin -->

                                <td> Total </td>
                                <th><?php echo '$' . $t;  ?> </th>

                            </tr><!-- tr Finish -->

                        </tbody><!-- tbody Finish -->

                    </table><!-- table Finish -->

                </div><!-- table-responsive Finish -->

            </div><!-- box Finish -->

        </div><!-- col-md-3 Finish -->


    </div><!-- container Finish -->
    </div><!-- #content Finish -->


    <!-- footer section -->





    <?php include 'footer.php'; ?>
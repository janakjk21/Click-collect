<?php
session_start();
if (!isset($_SESSION['cid'])) {
    header("location:invoice.php");
    # code...
} else {
    $customerid = $_SESSION['cid'];
}
include('connection.php');
$active = 'Account';
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


        .sad {
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
            color: rgb(44, 95, 45);

            font-family: Arial, Helvetica, sans-serif;
        }

        .view {
            float: left;
            background-color: #f1f1f1;
            width: 200px;
            height: 100%;
            /*position: relative;*/
            position: fixed;
        }

        .view a {
            float: left;
            color: black;
            padding: 19px;
            text-decoration: black;
        }

        .view a.active {
            background-color: #003366;
            color: white;
            width: 200px;
        }

        .view a:hover:not(.active) {
            background-color: #74b72e;
            color: white;
            width: 200px;
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
        <div class="col-md-3">
            <div class="panel panel-default sidebar-menu">
                <!--  panel panel-default sidebar-menu Begin  -->

                <div class="panel-heading">
                    <!--  panel-heading  Begin  -->

                    <?php

                    $customer_session = $_SESSION['cid'];

                    $get_customer = "select * from CUSTOMER where CUSTOMER_ID='$customer_session'";

                    $run_customer = oci_parse($conn, $get_customer);
                    $connect = oci_execute($run_customer);
                    $row_customer = oci_fetch_array($run_customer);

                    $customer_image = $row_customer['PROFILEPIC'];

                    $customer_name = $row_customer['NAME'];

                    if (!isset($_SESSION['cid'])) {
                    } else {

                        echo "
            
                <center>
                
                    <img src='images/$customer_image' class='img-responsive' >
                
                </center>
                
                <br/>
                
                <h3 class='panel-title' align='center'>
                
                    Name: $customer_name
                
                </h3>
            
            ";
                    }

                    ?>

                </div><!--  panel-heading Finish  -->

                <div class="panel-body">
                    <!--  panel-body Begin  -->

                    <ul class="nav-pills nav-stacked nav">
                        <!--  nav-pills nav-stacked nav Begin  -->

                        <li class="<?php if (isset($_GET['editprofile'])) {
                                        echo "active";
                                    } ?>">

                            <a class="active" href="customerview.php">Edit Profile</a>

                        </li>

                        <li class="<?php if (isset($_GET['myorder'])) {
                                        echo "active";
                                    } ?>">

                            <a href="cusorder.php">My Orders</a>

                        </li>

                        <li class="<?php if (isset($_GET['delaccount'])) {
                                        echo "active";
                                    } ?>">

                            <a href="deleteaccount.php?cid='.$customerid.'">Delete Account</a>

                        </li>

                        <li class="<?php if (isset($_GET['invoice'])) {
                                        echo "active";
                                    } ?>">

                            <a href="invoice.php">Payments</a>

                        </li>

                        <li>

                            <a href="logout.php">Log Out</a>

                        </li>

                    </ul><!--  nav-pills nav-stacked nav Begin  -->

                </div><!--  panel-body Finish  -->

            </div><!--  panel panel-default sidebar-menu Finish  -->
        </div>
        <div class="col-9">
            <?php
            $z = null;
            $a = "SELECT * FROM ORDER_DETAIL,PRODUCT WHERE CUSTOMER_ID='$customerid' AND ORDER_DETAIL.PRODUCT_ID=PRODUCT.PRODUCT_ID";
            $b = oci_parse($conn, $a);
            $c = oci_execute($b);
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped text-center">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">ORDER ID</th>';
            echo '<th scope="col">PRODUCT NAME</th>';
            echo '<th scope="col">PRODUCT UNIT PRICE</th>';
            echo '<th scope="col">QUANTITY</th>';
            echo '<th scope="col">TOTAL PRICE</th>';
            echo '<th scope="col">Invoice</th>';
            echo '</tr>';
            echo '</thead>';
            while ($d = oci_fetch_assoc($b)) {
                echo '<tbody>';
                echo '<tr>';
                $ab = $d['QUANTITY'] * $d['PRODUCTPRICE'];
                echo '<td>' . $d['ORDER_ID'] . '</td>';
                echo '<td>' . $d['PRODUCT_NAME'] . '</td>';
                echo '<td>$' . $d['PRODUCTPRICE'] . '</td>';
                echo '<td>' . $d['QUANTITY'] . '' . $d['PRODUCTUNIT'] . '</td>';

                echo '<td>$' . $ab . '</td>';

                echo '<td><a href="cusinvoice.php?oid=' . $d['ORDER_ID'] . '" class="btn btn-success">View Invoice</a></td>';
            }
            ?>



            </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- footer section -->


    <?php include_once 'footer.php'; ?>


</body>

</html>
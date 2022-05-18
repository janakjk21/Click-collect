<?php
session_start();
$active = 'Shop';
include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CLeckDiced</title>
    <link rel="stylesheet" href="Styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .columnbox {
            padding: 50px;
            border: 2px solid #74b72e;
            border-radius: 2px;
            margin-top: 10px;
            text-align: left;
            box-shadow: 0% 2px #74b72e;

        }

        .box1 {
            background-color: lightgrey;
            width: 350px;
            border: 3px solid #74b72e;
            padding: 7px;
            margin: 9px;
        }

        .box-offer {
            background-color: gray;
            width: 350px;
            border: 3px solid #74b72e;
            padding: 7px;
            margin: 9px;
        }

        .box1-offer {
            background-color: lightgrey;
            width: 350px;
            border: 3px solid #74b72e;
            padding: 7px;
            margin: 9px;
        }

        .shopbuttons .btn {
            width: 100%;
            border: 3px solid #74b72e;
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

        #content .productshop {
            background: #ffffff;
            border: 3px solid #74b72e;
            margin-bottom: 30px;
            box-sizing: border-box;

        }

        #content .productshop .text {
            padding: 10px 10px 0px;
        }

        #content .productshop .text p.price {
            font-size: 18px;
            text-align: center;
            font-weight: 400;
        }

        #content .productshop .text .button {
            text-align: center;
            clear: both;
        }

        #content .productshop .text .button .btn {
            margin-bottom: 10px;
        }

        #content .productshop .text h3 {
            text-align: center;
            font-size: 20px;
        }

        #content .productshop .text h3 a {
            color: rgb(85, 85, 85);
        }
    </style>

</head>

<body>
    <?php include './navbar.php' ?>
    <?php
    if (isset($_SESSION['cid'])) {
        $customerid = $_SESSION['cid'];
    ?>

    <?php } ?>
    <div id="content" style="margin-top:5%;margin-buttom:5%;">
        <!-- #content Begin -->
        <div class="container">
            <div class='row'>
                <div class="col-md-3">
                    <!--col-md-3 begin-->
                    <div class="panel panel-default sidebar-menu">
                        <!-- panel panel-default sidebar-menu Begin -->
                        <div class="panel-heading">
                            <!-- panel-heading Begin -->
                            <h3 class="panel-title" style="padding-left: 70px; font-size: 25px; font-family: 'Comic Sans MS', cursive, sans-serif">OFFER</h3>
                        </div><!-- panel-heading Finish -->

                        <div class="panel-body">
                            <!-- panel-body Begin -->
                            <img src="banner_meat.jpg" style=" height: 100%; width: 100%;">
                        </div><!-- panel-body Finish -->

                    </div><!-- panel panel-default sidebar-menu Finish -->
                    <div class="panel panel-default sidebar-menu">
                        <!-- panel panel-default sidebar-menu Begin -->
                        <div class="panel-heading">
                            <!-- panel-heading Begin -->
                            <h3 class="panel-title" style="padding-left: 70px; font-size: 25px; font-family: 'Comic Sans MS', cursive, sans-serif">OFFER</h3>
                        </div><!-- panel-heading Finish -->

                        <div class="panel-body">
                            <!-- panel-body Begin -->
                            <img src="meat.jpg" style=" height: 100%; width: 100%;">
                        </div><!-- panel-body Finish -->

                    </div><!-- panel panel-default sidebar-menu Finish -->
                </div>
                <!--col-md-3 end-->
                <div class="col-md-9">
                    <!-- col-md-9 Begin -->
                    <div class="box">
                        <!-- box Begin -->
                        <h1>Shop</h1>
                        <p>
                            Food shopping is one of the most essential purchases
                            that people will make. From picking up a single pint of milk,
                            to filling an over-flowing trolley, food
                            retailers are swamped with customers, especially around seasonal occasions.


                        </p>
                    </div>

                    <div class="row box">
                        <?php

                        $i = 0;

                        $get_p = "SELECT * FROM ( select * from SHOP ) WHERE ROWNUM <= 8 ";

                        $run_p = oci_parse($conn, $get_p);
                        oci_execute($run_p);
                        while ($row_p = oci_fetch_array($run_p)) {
                            $sid = $row_p['SHOP_ID'];
                            // echo"$sid";
                            $p_des = $row_p['SHOP_PHOTO'];
                            $s_name = $row_p['SHOP_NAME'];

                            echo '<div class="col card">';
                            echo '<div class="productshop">';

                            echo '<img src="./assets/img/' . $row_p['SHOP_PHOTO'] . '" alt="product image" class="img-responsive">';
                            echo '<div class ="text">';

                            echo '<h3>';

                            echo '<a href="test.php?
                                sid=' . $row_p['SHOP_ID'] . '">' . $row_p['SHOP_NAME'] . '</a>';

                            echo '</h3>';
                            echo '<p class="shopbuttons">';

                            echo '<a class="btn btn-default" href="test.php?
                                sid=' . $row_p['SHOP_ID'] . '">View Shop</a>';
                            echo '</p>';

                            echo '</div>';
                            echo '</div>';
                            echo '</div>';

                            $i++;
                        } ?>

                    </div>

                </div>
            </div>
            <!-- container Begin -->

            <!--col-md-9-->

        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>
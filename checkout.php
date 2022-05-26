<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Click & Collect Groceries </title>
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


        .btn-primary {
            background-color: #ff5300;
            border: none;
        }




        .padding-nav {
            padding-top: 10px;
        }

        .btn-primary {
            background: #ed0651;

        }
    </style>
</head>

<body>
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










    <?php include './navbar.php'; ?>
    <!-- cart section -->
    <div id="content" style="margin-top:4%;margin-bottom:4%">
        <!-- #content Begin -->
        <div class="container">
            <div class="row">
                <!-- container Begin -->
                <div id="cart" class="col-md-9">
                    <!-- col-md-9 Begin -->

                    <div style=" box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;padding:5%">
                        <!-- box Begin -->

                        <form action=" https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" enctype="multipart/form-data">
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
                                echo '<td><img src="./assets/img/product/' . $d['PRODUCT_PIC1'] . '" /> </td>';
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
                                        <input type="hidden" name="business" value="sunnycrextha-facilitator@gmail.com">
                                        <input type="hidden" name="return" value="http://localhost/Click-collect/order.php?cid=<?php echo $customerid; ?>&cartid=<?php echo $id; ?>&delday=<?php echo $asd; ?>&deltime=<?php echo $asw;   ?>">
                                        <input type="hidden" name="cancel_return" value="http://Click-collect/login.php">



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

                </div>
                <!-- #row same-heigh-row Finish -->
            </div>
            <div class="col-md-3 " style=" box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
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

            </div>
        </div><!-- col-md-9 Finish -->

        <!-- col-md-3 Finish -->


    </div><!-- container Finish -->
    </div><!-- #content Finish -->


    <!-- footer section -->





    <?php include 'footer.php'; ?>
</body>

</html>
<?php

include('connection.php');


if (!isset($_SESSION['cid'])) {
    session_start();
} else {

    $customerid = $_SESSION['cid'];
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
                        <option value="Wednesday">Next Wednesday</option>
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






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cart - Click & Collect Groceries</title>
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
    </style>

</head>

<body>
    <?php include './navbar.php'; ?>

    <!-- cart section -->
    <div id="content" style="margin-top:40px;">
        <!-- #content Begin -->
        <div class="container">
            <div class='row'>
                <div id="cart" class="col-md-9">
                    <!-- col-md-9 Begin -->

                    <div class="box" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                        <!-- box Begin -->

                        <form action="checkout.php" method="post" enctype="multipart/form-data">
                            <!-- form Begin -->

                            <h1>Shopping Cart</h1>

                            <?php
                            $customerid = $_SESSION['cid'];

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




                                    <form method="POST" action="checkout.php" enctype="multipart/form-data" style="height: 400px; width: 300px; background-color: none;">

                                        <br>
                                        <h2 style="text-align: center; color:#ff5300;">Collection Day And Time</h2><br>

                                        <select name="day" style="color:black;" class="form-control">
                                            <?php collection(); ?>
                                        </select>

                                        <select name="timing" style="color:black; margin-top: 10px;" class="form-control">
                                            <?php timer(); ?>
                                        </select>

                                        <br>
                                        <div class="text-center">

                                            <button type="submit" name="submit" class="btn btn-success"> Checkout</button>
                                        </div>

                                    </form>

                                </div><!-- pull-right Finish -->

                            </div><!-- box-footer Finish -->

                        </form><!-- form Finish -->

                    </div><!-- box Finish -->

                </div>
            </div>

            <div class="col-md-3">
                <!-- col-md-3 Begin -->

                <div id="order-details" class="box" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
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
            <!-- container Begin -->
            <!-- #row same-heigh-row Finish -->

        </div><!-- col-md-9 Finish -->

        <!-- col-md-3 Finish -->


    </div><!-- container Finish -->
    </div><!-- #content Finish -->


    <!-- footer section -->

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




</body>

</html>
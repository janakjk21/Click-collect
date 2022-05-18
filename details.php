<?php
session_start();
$active = 'Shop';
include('connection.php');
error_reporting(0);
if (isset($_SESSION['cid'])) {

    $customerid = $_SESSION['cid'];
}
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
}

if (isset($_POST['addtocart'])) {
    $torder = $_POST['torder'];
    $x = "SELECT * FROM PRODUCT WHERE PRODUCT_ID='$pid'";
    $y = oci_parse($conn, $x);
    oci_execute($y);
    while ($z = oci_fetch_assoc($y)) {
        if ($z['PRODUCTQUANTITY'] > 0) {
            if ($torder < $z['MINORDER'] || $torder > $z['MAXORDER']) {
                $ermessage = "Place A Valid Order !!!";
            } else {
                $d = "SELECT CART_ID FROM CART WHERE  PRODUCT_ID='$pid' AND CUSTOMER_ID='$customerid' ";
                $e = oci_parse($conn, $d);
                $f = oci_execute($e);
                oci_fetch_assoc($e);
                $g = oci_num_rows($e);
                if ($g > 0) {
                    $ermessage = "You Have Already Make An Order For This Product,Please Check You cart !!!";
                } else {
                    $a = "INSERT INTO CART (CART_ID,QUANTITY,CUSTOMER_ID,PRODUCT_ID) VALUES (CART_SEQ.nextval,'$torder','$customerid','$pid')";
                    $b = oci_parse($conn, $a);
                    $c = oci_execute($b);
                    if ($c) {
                        // echo "timi kun thauma chau";
                        header('location:cart.php');
                    } else {
                        // echo'tablema gayenau';
                    }
                }
            }
        } else {
            $ermessage = "Product is out of Stock!";
        }
    }
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

        @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .product-title,
        .price,
        .sizes,
        .colors,
        .stock,
        .min,
        .max {
            text-transform: UPPERCASE;
            font-weight: bold;
        }

        .checked,
        .price span,
        .stock span,
        .min span,
        .max span {
            color: #74b72e;
        }

        .product-title,
        .rating,
        .product-description,
        .price,
        .vote,
        .sizes {
            margin-bottom: 15px;
        }

        .product-title {
            color: #74b72e;
            margin-top: 0;
        }

        .size {
            margin-right: 10px;
        }

        .size:first-of-type {
            margin-left: 40px;
        }

        .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px;
        }

        .color:first-of-type {
            margin-left: 20px;
        }

        .add-to-cart,
        .like {
            background: #74b72e;
            padding: 1.2em 1.5em;
            border: none;
            opacity: 0.8;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
            transition: background .3s ease;
        }

        .add-to-cart:hover,
        .like:hover {
            background: #74b72e;
            opacity: 1;
            color: #fff;
        }

        .cancel {

            padding: 1.2em 1.5em;
            border: none;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
            transition: background .3s ease;
        }

        .not-available {
            text-align: center;
            line-height: 2em;
        }

        .not-available:before {
            font-family: fontawesome;
            content: "\f00d";
            color: #fff;
        }

        .orange {
            background: #ff9f1a;
        }

        .green {
            background: #85ad00;
        }

        .blue {
            background: #0076ad;
        }

        .tooltip-inner {
            padding: 1.3em;
        }

        @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
    </style>

</head>

<body>
    <?php
    if (isset($_SESSION['cid'])) {
        $customerid = $_SESSION['cid'];
    ?>

    <?php } ?>
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <?php
                if (isset($ermessage)) {
                ?>
                    <div class='alert alert-danger' id='myAlert'>
                        <a class='close' data-dismiss='alert'>&times;
                        </a>
                        <?php
                        echo "$ermessage";
                        ?>
                    </div>
                <?php
                }
                ?>
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
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <?php
                            $a = "SELECT * FROM PRODUCT WHERE PRODUCT_ID='$pid'";

                            $b = oci_parse($conn, $a);
                            oci_execute($b);
                            while ($c = oci_fetch_assoc($b)) {

                                echo '<div class="preview-pic tab-content">';
                                echo '<div class="tab-pane active" id="pic-1">';
                                echo '<div id="myCarousel" class="carousel slide" data-ride="carousel">';
                                echo '<div id="ProductImage">';
                                echo '<ol class="carousel-indicators">';
                                echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
                                echo '<li data-target="#myCarousel" data-slide-to="1"></li>';
                                echo '<li data-target="#myCarousel" data-slide-to="2"></li>';
                                echo '</ol>';
                                echo '<div class="carousel-inner">';
                                echo '<div class="item active">';
                                echo '<center>';
                                echo '<img class="img-responsive" src="./assets/img/' . $c['PRODUCT_PIC1'] . '" alt="Product1">';
                                echo '</center>';
                                echo '</div>';
                                echo '<div class="item">';
                                echo '<center>';
                                echo '<img class="img-responsive" src="./assets/img/' . $c['PRODUCT_PIC2'] . '" alt="Product2">';

                                echo '</center>';
                                echo '</div>';
                                echo '<div class="item">';
                                echo '<center>';
                                echo '<img class="img-responsive" src="./assets/img/' . $c['PRODUCT_PIC3'] . '" alt="Product3">';
                                echo '</center>';
                                echo '</div>';

                                echo '</div>';
                                echo '<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>';
                                echo '<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
   </a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="details col-md-6">';
                                echo '<h3 class="product-title">' . $c['PRODUCT_NAME'] . '</h3>';
                                echo '<br>';
                                if ($c['DISAMOUNT'] > 0) {
                                    echo '<h4 class="price">Price: <s><span>$' . $c['PRODUCTPRICE'] . '/' . $c['PRODUCTUNIT'] . '</span></s></h4>';
                                    $d = $c['DISAMOUNT'];
                                    $c['PRODUCTPRICE'] = $c['PRODUCTPRICE'] - ($c['PRODUCTPRICE'] * ($d / 100));
                                    echo '<h4 class="price">Discount Price: <span>$' . ($c['PRODUCTPRICE'] - ($c['PRODUCTPRICE'] * ($d / 100))) . '/' . $c['PRODUCTUNIT'] . '</span></h4>';
                                } else {
                                    echo '<h4 class="price">Price: <span>$' . $c['PRODUCTPRICE'] . '/' . $c['PRODUCTUNIT'] . '</span></h4>';
                                }
                                if ($c['PRODUCTQUANTITY'] > 0) {
                                    echo '<h4 class="stock">STOCK AVAILABLE: <span>' . $c['PRODUCTQUANTITY'] . $c['PRODUCTUNIT'] . '</span></h4>';
                                } else {
                                    echo '<h4 class="stock">STOCK AVAILABLE: <span> OUT OF STOCK!!</span></h4>';
                                }
                                echo '<h4 class="min">Minimum order: <span>' . $c['MINORDER'] . $c['PRODUCTUNIT'] . '</span></h4>';
                                echo '<h4 class="max">maximum order: <span>' . $c['MAXORDER'] . $c['PRODUCTUNIT'] . '</span></h4>';
                                echo '<br>';
                                echo '<form action="" method="POST" enctype="multipart/form-data">';
                                echo '<input type="hidden" name="pid" value="' . $c['PRODUCT_ID'] . '">';
                                echo '<h4 class="stock">My order: <span><input type="text" style="width:60px;" name="torder">&nbsp' . $c['PRODUCTUNIT'] . '</h4>';
                                echo '<br>';
                                echo '<br>';

                                echo '<button class="add-to-cart btn btn-default" type="submit" name="addtocart">add to cart</button>';
                                echo '<button class="cancel btn btn-danger" style="margin-left:5px; ";  name="cancel"><a href="shop.php" style="color:white;">Cancel</a></button>';
                                echo '</form>';


                                echo '<br>';


                                echo '<div class="row" id="thumbs">';
                                echo '<div class="col-xs-4">';
                                echo '<a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb"><img  src="products/' . $c['PRODUCT_PIC1'] . '" alt="Product1" class="img-responsive"></a>';
                                echo '</div>';

                                echo '<div class="col-xs-4">';
                                echo '<a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb"><img  src="products/' . $c['PRODUCT_PIC2'] . '" alt="product2" class="img-responsive"></a>';
                                echo '</div>';
                                echo '<div class="col-xs-4">';
                                echo '<a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb"><img  src="products/' . $c['PRODUCT_PIC3'] . '" alt="Product3" class="img-responsive"></a>';
                                echo '</div>';
                                echo '</div>';


                                echo '</div>';
                                echo '</div>';
                                echo '<br>';
                                echo '<div class="box" id="details">';

                                echo '<h4>Product Details</h4>';

                                echo '<p class="product-description">' . $c['PRODUCTDES'] . '</p>';
                                echo '<br>';

                                echo '<hr>';

                                echo '</div>';
                            }
                            ?>

                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <div class="preview col-md-6">
                            <h2 style="color:#74b72e;">Product Reviews</h2>

                            <?php
                            $x = "SELECT * FROM REVIEW,CUSTOMER WHERE PRODUCT_ID='$pid' AND REVIEW.CUSTOMER_ID=CUSTOMER.CUSTOMER_ID";
                            $y = oci_parse($conn, $x);
                            $z = oci_execute($y);
                            while ($v = oci_fetch_assoc($y)) {
                                echo '<h4>' . $v['NAME'] . '</h4>';
                                echo '<p style="color:#74b72e;">' . $v['REVIEW'] . '</p>';
                            }

                            ?>

                        </div>

                        <?php
                        if (isset($_SESSION['cid'])) { ?>
                            <div class="details col-md-6">
                                <h2 style="color:#74b72e;">Add Review on this Product</h2>
                                <br>

                                <form action="" method="POST">
                                    <textarea rows="5" cols="60" name="review">
        	 </textarea><br>
                                    <input type="submit" name="re" value="Submit" class="btn btn-success" />
                                </form>
                            <?php
                            if (isset($_POST['re'])) {
                                $review = $_POST['review'];

                                $e = "INSERT INTO REVIEW (REVIEW,CUSTOMER_ID,PRODUCT_ID) VALUES ('$review','$customerid','$pid')";
                                $r = oci_parse($conn, $e);
                                $t = oci_execute($r);
                            }
                        } else {
                            // header("location:login.php");

                        }
                            ?>
                            </div>

                    </div>

                    </br>



                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>


    <script type="text/javascript">
        $(document).ready(function() {
            $(".close").click(function() {
                $('#myAlert').alert();

            });

        });
    </script>
</body>

</html>
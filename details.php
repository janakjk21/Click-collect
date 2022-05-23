<?php
session_start();
$active = 'Shop';
include('connection.php');
error_reporting(0);
if (isset($_SESSION['cid'])) {

    $customerid = $_SESSION['cid'];
    echo $customerid;
}
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $product_id = $_GET['pid'];
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
                        echo 'tablema gayenau';
                    }
                }
            }
        } else {
            $ermessage = "Product is out of Stock!";
        }
    }
}





?>


<?php


include './connection.php';


$customerid = $_SESSION['cid'];
$Err = "";
// If upload button is clicked ...
if (isset($_POST['submit'])) {
    $name = $category = $feedback = "";

    if (empty($_POST["name"])) {
        $Err = "Name is required";
    } else {
        $name = $_POST["name"];
    }
    if (empty($_POST["email"])) {
        $Err = "Category is required";
    } else {
        $email = $_POST["feedback"];
        echo $category;
    }
    if (empty($_POST["price"])) {
        $Err = "Name is required";
    } else {
        $feedback = $_POST["price"];
    }
    $rating = $_POST["rating"];
    $sql = "INSERT INTO REVIEW (REVIEW_ID,PRODUCT_ID, CUSTOMER_ID, RATING,REVIEWR_NAME,REVIEW,REVIEWER_EMAIL)VALUES (123,' $product_id ', $customerid, ' $rating ','$name','$feedback ','$email ')";
    $nop = oci_parse($conn, $sql);
    $e = oci_execute($nop);
    if (empty($e)) {
        $Err = "data insered sucessful";
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
    <link rel="stylesheet" href="./assets/css/product.css">

    <style>
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
    include("./navbar.php");
    ?>
    <?php
    if (isset($_SESSION['cid'])) {
        $customerid = $_SESSION['cid'];
    ?>

    <?php } ?>
    <div class="container">

        <div class="row">
            <!--col-md-3 end-->
            <div class="col-md-11">
                <div class="row">
                    <div class=" col-md-12 d-flex">
                        <?php
                        $a = "SELECT * FROM PRODUCT WHERE PRODUCT_ID='$pid'";

                        $b = oci_parse($conn, $a);
                        oci_execute($b);
                        while ($c = oci_fetch_assoc($b)) {
                            $product_pic1 =  $c['PRODUCT_PIC1'];
                            $product_pic2 =  $c['PRODUCT_PIC2'];
                            $product_pic3 =  $c['PRODUCT_PIC3'];



                        ?>

                            <div class="col-md-6">

                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner rounded">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="./assets/img/<?php echo $product_pic1 ?>" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="./assets/img/<?php echo $product_pic2 ?>" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="./assets/img/<?php echo $product_pic3 ?>" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                            </div>
                        <?php

                            echo '<div class=" col-md-6 box">';
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
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Give review in star</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter review" min="1" max="5">
                                    <small id="emailHelp" class="form-text text-muted">Enter the ratings between 1-5</small>
                                </div>
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
    <?php include "./script.php" ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".close").click(function() {
                $('#myAlert').alert();

            });

        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" referrerpolicy="no-referrer" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/product.css">
    <title>Document</title>
</head>

<body>
    <!-- //code for cart -->
    <!-- code for the single product  -->
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
        $y = oci_parse($connection, $x);
        oci_execute($y);
        while ($z = oci_fetch_assoc($y)) {
            if ($z['PRODUCTQUANTITY'] > 0) {
                if ($torder < $z['MINORDER'] || $torder > $z['MAXORDER']) {
                    $ermessage = "Place A Valid Order !!!";
                } else {
                    $d = "SELECT CART_ID FROM CART WHERE  PRODUCT_ID='$pid' AND CUSTOMER_ID='$customerid' ";
                    $e = oci_parse($connection, $d);
                    $f = oci_execute($e);
                    oci_fetch_assoc($e);
                    $g = oci_num_rows($e);
                    if ($g > 0) {
                        $ermessage = "You Have Already Make An Order For This Product,Please Check You cart !!!";
                    } else {
                        $a = "INSERT INTO CART (CART_ID,QUANTITY,CUSTOMER_ID,PRODUCT_ID) VALUES (CART_SEQ.nextval,'$torder','$customerid','$pid')";
                        $b = oci_parse($connection, $a);
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
    <?php
    include "./connection.php";
    $sql = 'SELECT * FROM PRODUCT where PRODUCT_ID=	1 ';
    $stid = oci_parse($conn, $sql);


    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {



        $product_id = $row['PRODUCT_ID'];
        $product_pic1 = $row['PRODUCT_PIC1'];
        $product_pic2 = $row['PRODUCT_PIC2'];
        $product_pic3 = $row['PRODUCT_PIC3'];
        $product_name = $row['PRODUCT_NAME'];
        $category = $row['PRODUCT_ID'];
        $product_price = $row['PRODUCTPRICE'];
        $product_quantity = $row['PRODUCTQUANTITY'];
        $product_unit = $row['PRODUCTUNIT'];
        $minorder = $row['MINORDER'];
        $maxorder = $row['MAXORDER'];
        $PRODUCTDES = $row['PRODUCTDES'];
        $disamount = $row['DISAMOUNT'];
        $shop_id = $row['SHOP_ID'];
    }

    ?>

    <!-- Code for the rating system -->
    <?php


    include './connection.php';


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
        $sql = "INSERT INTO REVIEW (REVIEW_ID,PRODUCT_ID, CUSTOMER_ID, RATING,REVIEWR_NAME,REVIEW,REVIEWER_EMAIL)VALUES (125,' $product_id ', 565, ' $rating ','$name','$feedback ','$email ')";
        $nop = oci_parse($conn, $sql);
        $e = oci_execute($nop);
        if (empty($e)) {
            $Err = "data insered sucessful";
        }
    }

    ?>

    <?php

    include "navbar.php";


    ?>

    <section class="product-detail-area section-space">
        <div class="container">
            <div class="row product-details">
                <div class="col-lg-7">

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
                <div class="col-lg-5">
                    <div class="product-details-content">
                        <h3 class="product-details-title"><?php echo $product_name ?></h3>
                        <div class="product-details-review">
                            <div class="product-review-icon">


                            </div>

                        </div>
                        <p class="product-details-desc"><?php echo $PRODUCTDES ?>.</p>
                        <div class="product-details-color-list">
                            <h4>Max-Min product </h4>
                            <div class="color-list-check">

                                <input class="form-check-input bg-red" type="radio" name="flexRadioColorList" id="colorList1">

                                <label class="form-check-label" for="colorList1"><?php echo $maxorder ?></label>
                            </div>
                            <div class="color-list-check">
                                <input class="form-check-input bg-green" type="radio" name="flexRadioColorList" id="colorList2" checked="">

                                <label class="form-check-label" for="colorList2"><?php echo $minorder ?></label>
                            </div>
                            <div class="color-list-check me-0">

                            </div>
                        </div>
                        <div class="product-details-pro-qty">
                            <h4>QTY :</h4>
                            <div class="pro-qty">
                                <input type="text" title="Quantity" value="01">
                                <div class="dec qty-btn">-</div>
                                <div class="inc qty-btn">+</div>
                            </div>
                        </div>
                        <div class="product-details-price"><?php echo $product_price  ?><span class="price-old"> <?php echo $disamount ?></span></div>
                        <div class="product-details-action">
                            <button class="product-action-btn" data-bs-toggle="modal" data-bs-target="#action-CartAddModal" type="submit" name="addtocart">Add to cart</button>
                            <button type="button" class="product-action-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                <i class="fa fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="preview col-md-6">
                    <h2 style="color:#74b72e;">Product Reviews</h2>

                    <?php
                    $x = "SELECT * FROM REVIEW,CUSTOMER WHERE PRODUCT_ID='$pid' AND REVIEW.CUSTOMER_ID=CUSTOMER.CUSTOMER_ID";
                    $y = oci_parse($connection, $x);
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
                        $r = oci_parse($connection, $e);
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
    </section>
    <?php

    include "./footer.php";


    ?>
    <?php include "./script.php" ?>

    <script src="./assets/js/product.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            background: #e2eaef;
            font-family: "Open Sans", sans-serif;
        }

        h2 {
            color: #000;
            font-size: 26px;
            font-weight: 300;
            text-align: center;
            text-transform: uppercase;
            position: relative;
            margin: 30px 0 60px;
        }

        h2::after {
            content: "";
            width: 100px;
            position: absolute;
            margin: 0 auto;
            height: 4px;
            border-radius: 1px;
            left: 0;
            right: 0;
            bottom: -20px;
        }

        .carousel {
            margin: 50px auto;
            padding: 0 70px;
        }

        .carousel .item {
            color: #747d89;
            min-height: 325px;
            text-align: center;
            overflow: hidden;
        }

        .carousel .thumb-wrapper {
            padding: 25px 15px;
            background: #fff;
            border-radius: 6px;
            text-align: center;
            position: relative;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        }

        .carousel .item .img-box {
            height: 120px;
            margin-bottom: 20px;
            width: 100%;
            position: relative;
        }

        .carousel .item img {
            max-width: 100%;
            max-height: 100%;
            display: inline-block;
            position: absolute;
            bottom: 0;
            margin: 0 auto;
            left: 0;
            right: 0;
        }

        .carousel .item h4 {
            font-size: 18px;
        }

        .carousel .item h4,
        .carousel .item p,
        .carousel .item ul {
            margin-bottom: 5px;
        }

        .carousel .thumb-content .btn {
            color: #7ac400;
            font-size: 11px;
            text-transform: uppercase;
            font-weight: bold;
            background: none;
            border: 1px solid #7ac400;
            padding: 6px 14px;
            margin-top: 5px;
            line-height: 16px;
            border-radius: 20px;
        }

        .carousel .thumb-content .btn:hover,
        .carousel .thumb-content .btn:focus {
            color: #fff;
            background: #7ac400;
            box-shadow: none;
        }

        .carousel .thumb-content .btn i {
            font-size: 14px;
            font-weight: bold;
            margin-left: 5px;
        }

        .carousel .item-price {
            font-size: 13px;
            padding: 2px 0;
        }

        .carousel .item-price strike {
            opacity: 0.7;
            margin-right: 5px;
        }


        .carousel-indicators {
            bottom: -50px;
        }

        .carousel-indicators li,
        .carousel-indicators li.active {
            width: 10px;
            height: 10px;
            margin: 4px;
            border-radius: 50%;
            border: none;
        }

        .carousel-indicators li {
            background: rgba(0, 0, 0, 0.2);
        }

        .carousel-indicators li.active {
            background: rgba(0, 0, 0, 0.6);
        }

        .carousel .wish-icon {
            position: absolute;
            right: 10px;
            top: 10px;
            z-index: 99;
            cursor: pointer;
            font-size: 16px;
            color: #abb0b8;
        }

        .carousel .wish-icon .fa-heart {
            color: #ff6161;
        }

        .star-rating li {
            padding: 0;
        }

        .star-rating i {
            font-size: 14px;
            color: #ffc000;
        }
    </style>
    <script>
        $(document).ready(function() {
            $(".wish-icon i").click(function() {
                $(this).toggleClass("fa-heart fa-heart-o");
            });
        });
    </script>
</head>

<body>
    <div class="container-xl ">
        <div class="row box">
            <div class="col-md-12">
                <h2>Featured <b>Products</b></h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="item carousel-item active">
                            <div class="row">

                                <?php
                                include 'connection.php';
                                $x = 1;

                                $s = "SELECT * FROM PRODUCT ORDER BY RAND() ";
                                // $s = "SELECT * FROM PRODUCT";
                                $n = oci_parse($conn, $s);
                                $o = oci_execute($n);
                                $x = oci_num_rows($n);
                                echo $o = oci_execute($n);;
                                while ($ro = oci_fetch_assoc($n)) {

                                    echo '<div class="col-sm-3">';
                                    echo '<div class="thumb-wrapper">';
                                    echo '<span class="wish-icon"><i class="fa fa-heart-o"></i></span>';
                                    echo '<div class="img-box">';
                                    echo '<img src="./assets/img/' . $ro['PRODUCT_PIC1'] . '" alt="product image" class="img-fluid" >';
                                    echo '</div>';
                                    echo '<div class="thumb-content">';
                                    echo '<h4>Tuna</h4>';
                                    echo '<div class="star-rating">';
                                    echo '<ul class="list-inline">';
                                    echo '<li class="list-inline-item"><i class="fa fa-star"></i></li>';
                                    echo '<li class="list-inline-item"><i class="fa fa-star"></i></li>';
                                    echo '<li class="list-inline-item"><i class="fa fa-star"></i></li>';
                                    echo '<li class="list-inline-item"><i class="fa fa-star"></i></li>';
                                    echo '<li class="list-inline-item"><i class="fa fa-star-o"></i></li>';
                                    echo '</ul>';
                                    echo '</div>';
                                    echo '<p class="item-price"><strike>$' . $ro['PRODUCTPRICE'] . '/' . $ro['PRODUCTUNIT'] . '</strike> <b></b></p>';
                                    echo '<a  class="btn btn-primary" href="details.php?pid=' . $ro['PRODUCT_ID'] . '">Add to Cart</a>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }

                                ?>



                            </div>
                        </div>

                        <div class="item carousel-item">
                            <div class="row">
                                <?php
                                include 'connection.php';
                                $x = 1;

                                $s = "SELECT * FROM PRODUCT ";
                                // $s = "SELECT * FROM PRODUCT";
                                $n = oci_parse($conn, $s);
                                $o = oci_execute($n);
                                $x = oci_num_rows($n);
                                echo $o = oci_execute($n);;
                                while ($ro = oci_fetch_assoc($n)) {

                                    echo '<div class="col-sm-3">';
                                    echo '<div class="thumb-wrapper">';
                                    echo '<span class="wish-icon"><i class="fa fa-heart-o"></i></span>';
                                    echo '<div class="img-box">';
                                    echo '<img src="./assets/img/' . $ro['PRODUCT_PIC1'] . '" alt="product image" class="img-fluid" >';
                                    echo '</div>';
                                    echo '<div class="thumb-content">';
                                    echo '<h4>Tuna</h4>';
                                    echo '<div class="star-rating">';
                                    echo '<ul class="list-inline">';
                                    echo '<li class="list-inline-item"><i class="fa fa-star"></i></li>';
                                    echo '<li class="list-inline-item"><i class="fa fa-star"></i></li>';
                                    echo '<li class="list-inline-item"><i class="fa fa-star"></i></li>';
                                    echo '<li class="list-inline-item"><i class="fa fa-star"></i></li>';
                                    echo '<li class="list-inline-item"><i class="fa fa-star-o"></i></li>';
                                    echo '</ul>';
                                    echo '</div>';
                                    echo '<p class="item-price"><strike>$' . $ro['PRODUCTPRICE'] . '/' . $ro['PRODUCTUNIT'] . '</strike> <b></b></p>';
                                    echo '<a  class="btn btn-primary" href="details.php?pid=' . $ro['PRODUCT_ID'] . '">Add to Cart</a>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }

                                ?>

                            </div>
                        </div </div>
                    </div>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="carousel-control-prev-icon" style=" background-color: black;"></i>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="carousel-control-next-icon" style=" background-color: black;"></i>
                </a>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
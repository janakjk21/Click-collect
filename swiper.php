<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!-- <link rel="stylesheet" href="./Topcatogerios.css" /> -->
    <!-- Link Swiper's CSS -->
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" referrerpolicy="no-referrer" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <!-- Demo styles -->
    <style>
        .carousel {
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
</head>

<body>
    <div style="background-color: #f9f9f9">
        <hr>
        <div style="margin-top :70px; "></div>
        <div style="text-align: center; ">
            <h1 style="font-size:50px ; "> Deal of The day</h1>
        </div>

        <div class=" carousel swiper mySwiper " style="background-color: #f9f9f9">

            <div class="swiper-wrapper">
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
                    $x = "SELECT * FROM REVIEW,CUSTOMER WHERE PRODUCT_ID='$ro[PRODUCT_ID]' AND REVIEW.CUSTOMER_ID=CUSTOMER.CUSTOMER_ID";
                    $y = oci_parse($conn, $x);
                    $z = oci_execute($y);

                    echo '<div class="swiper-slide">';
                    echo '<div class="col-sm-12" style="padding:5%">';
                    echo '<div class="thumb-wrapper" >';
                    echo '<span class="wish-icon"><i class="fa fa-heart-o"></i></span>';
                    echo '<div class="img-box">';
                    echo '<img src="./assets/img/product/' . $ro['PRODUCT_PIC1'] . '" alt="product image" class="img-fluid">';
                    echo '</div>';
                    echo '<div class="thumb-content">';
                    echo '<h4>Tuna</h4>';
                    echo '<div class="star-rating">';
                    echo '<ul class="list-inline">';
                    while ($v = oci_fetch_assoc($y)) {

                        for ($x = 0; $x < $v['RATING']; $x++) {
                            echo '<span class="fa fa-star"></span>';
                        }
                    }
                    echo '</ul>';
                    echo '</div>';
                    echo '<p class="item-price"><strike>$' . $ro['PRODUCTPRICE'] . '/' . $ro['PRODUCTUNIT'] . '</strike> <b></b></p>';
                    echo '<a class="btn btn-primary" href="details.php?pid=' . $ro['PRODUCT_ID'] . '">Add to Cart</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }

                ?>



            </div>
            <div class="swiper-pagination"></div>
            <div style="margin-top :70px;"></div>
        </div>
    </div>


    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });
    </script>
</body>

</html>
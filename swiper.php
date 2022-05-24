<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!-- <link rel="stylesheet" href="./Topcatogerios.css" /> -->
    <!-- Link Swiper's CSS -->

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <!-- Demo styles -->
    <style>
        html,
        body {
            position: relative;
            height: 20%;
        }

        body {
            background: #f9f9f9;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;

        }

        .swiper {
            width: 100%;


        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;

            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            border-radius: 3%;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            /* height: 70%; */
            object-fit: cover;
            border-radius: 5%;
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

        <div class="swiper mySwiper" style="border-radius:5%;background-color: #f9f9f9">

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
                    echo '<div class="swiper-slide">';
                    echo '<div class="col-sm-3">';
                    echo '<div class="thumb-wrapper">';
                    echo '<span class="wish-icon"><i class="fa fa-heart-o"></i></span>';
                    echo '<div class="img-box">';
                    echo '<img src="./assets/img/' . $ro['PRODUCT_PIC1'] . '" alt="product image" class="img-fluid">';
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
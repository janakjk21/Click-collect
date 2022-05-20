<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" referrerpolicy="no-referrer" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">

    <title>Home - Click & Collect Groceries</title>
</head>

<body>

    <div id="navbar">
        <?php
        include "./connection.php";
        include "navbar.php";
        echo $_SESSION['tid'];
        ?>
    </div>

<<<<<<< HEAD
    <div class="container" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
        <?php 
        include "category.php"; 
        ?>
    </div>

    <div class="container mt-3">
        <div class="row" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
=======

    ?></div>
    <div class="container" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; ">
        <?php include "category.php"; ?>
    </div>
    <div class="container mt-3" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; ">
        <div class="row">
>>>>>>> 07bffcfa0cf119e1246845f40bbdb74721150809
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="./assets/img/Banner Swiper/home4-category2-banner1.webp" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./assets/img/Banner swiper/home4-category2-banner2.webp" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./assets/img/Banner swiper/home4-category3-banner1.webp" alt="Third slide">
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
        </div>
        <div class="row">
            <?php
            include "./product_card_image_tiles.php"
            ?>
        </div>
    </div>

    <?php
    include "./Swiper.php"
    ?>


    <?php
    include "./footer.php"
    ?>


    <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            function loadTable(page) {
                $.ajax({
                    url: "pagination.php",
                    type: "POST",
                    data: {
                        page_no: page
                    },
                    success: function(data) {
                        $("#add-pages").html(data);
                    }
                });
            }
            loadTable();

            //Pagination Code
            $(document).on("click", "#pagination a", function(e) {
                e.preventDefault();
                var page_id = $(this).attr("id");
                loadTable(page_id);
            })
        });

        $(document).ready(function() {

            $('.add-to-cart').click(function(e) {
                e.preventDefault();
                var p_id = $(this).attr('data-id');
                $.ajax({
                    url: 'actions.php',
                    method: 'POST',
                    data: {
                        addCart: p_id
                    },
                    success: function(data) {
                        $('#navbar').load('index.php #navbar', function() {
                            setTimeout(10);
                        });
                        setTimeout(8000);
                    }
                });
            });
        });
    </script>
</body>

</html>
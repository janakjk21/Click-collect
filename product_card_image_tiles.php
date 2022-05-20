<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>product card image tiles - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div style="margin-left:auto; margin-right:auto; ">
        <h1 style="font-size:50px;"> Deal of The day</h1>
    </div>

    <div class="container">
        <!-- Categories grid-->
        <div class="row">
            <!-- Category-->
            <div class="col-md-4 col-sm-6">
                <div class=" card border-0 " style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:3%">
                    <a class="card-img-tiles" href="shop-style1-ls.html">
                        <div class="main-img"><img src="./assets/img/deal of the day/butchers/butcher1.png" alt="Clothing" style="border-radius: 3%;"></div>
                        <div class="thumblist"><img src="./assets/img/deal of the day/butchers/butcher2.png" alt="Clothing" style="border-radius: 3%;"><img src="./assets/img/deal of the day/butchers/butcher3.png" alt="Clothing" style="border-radius: 3%;"></div>
                    </a>
                    <div class="card-body border mt-n1 py-4 text-center">
                        <h2 class="h5 mb-1">Butchers</h2><span class="d-block mb-3 font-size-xs text-muted">Starting from <span class="font-weight-semibold">$39.99</span></span><a class="btn btn-pill btn-outline-primary btn-sm" href="shop-style1-ls.html">Shop Meat</a>
                    </div>
                </div>
            </div>
            <!-- Category-->
            <div class="col-md-4 col-sm-6" ">
                <div class=" card border-0 mb-grid-gutter" style="	box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:3%">
                <a class="card-img-tiles" href="shop-style1-ls.html">
                    <div class="main-img"><img src="./assets/img/deal of the day/bakery/bakery1.png" alt="Clothing" style="border-radius: 3%;"></div>
                    <div class="thumblist"><img src="./assets/img/deal of the day/bakery/bakery2.png" alt="Clothing" style="border-radius: 3%;"><img src="./assets/img/deal of the day/bakery/bakery3.png" alt="Clothing" style="border-radius: 3%;"></div>
                </a>
                <div class="card-body border mt-n1 py-4 text-center">
                    <h2 class="h5 mb-1">Bakery</h2><span class="d-block mb-3 font-size-xs text-muted">Starting from <span class="font-weight-semibold">$49.99</span></span><a class="btn btn-pill btn-outline-primary btn-sm" href="shop-style1-ls.html">Shop Bakery</a>
                </div>
            </div>
        </div>
        <!-- Category-->
        <div class="col-md-4 col-sm-6" ">
                <div class=" card border-0 mb-grid-gutter" style="	box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:3%">
            <a class="card-img-tiles" href="shop-style1-ls.html">
                <div class="main-img"><img src="./assets/img/deal of the day/vegetable/vegetable1.png" alt="Clothing" style="border-radius: 3%;"></div>
                <div class="thumblist"><img src="./assets/img/deal of the day/vegetable/vegetable2.png" alt="Clothing" style="border-radius: 3%;"><img src="./assets/img/deal of the day/vegetable/vegetable3.png" alt="Clothing" style="border-radius: 3%;"></div>
            </a>
            <div class="card-body border mt-n1 py-4 text-center">
                <h2 class="h5 mb-1">Vegetables</h2><span class="d-block mb-3 font-size-xs text-muted">Starting from <span class="font-weight-semibold">$29.99</span></span><a class="btn btn-pill btn-outline-primary btn-sm" href="shop-style1-ls.html">Shop Vegetables</a>
            </div>
        </div>
        <!-- Category-->

        <!-- Category-->

        <!-- Category-->

    </div>
    </div>

    <style type="text/css">
        body {
            background: #f5f5f5;
            margin-top: 20px;
        }

        .card-img-tiles {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            background-color: #fff;
            z-index: 5
        }

        .card-img-tiles .main-img>img,
        .card-img-tiles .thumblist>img {
            display: block;
            width: 100%
        }

        .card-img-tiles .main-img {
            width: 67%;
            padding-right: .375rem
        }

        .card-img-tiles .thumblist {
            width: 33%;
            padding-left: .375rem
        }

        .card-img-tiles .thumblist>img {
            margin-bottom: .75rem
        }

        .card-img-tiles .thumblist>img:last-child {
            margin-bottom: 0
        }

        .mb-grid-gutter {
            margin-bottom: 30px !important;
        }
    </style>

    <script type="text/javascript">

    </script>
</body>

</html>
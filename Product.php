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


    <?php
    include "./connection.php";
    $sql = 'SELECT * FROM PRODUCT ';
    $stid = oci_parse($conn, $sql);


    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {

        $productprice = $row['PRODUCTPRICE'];
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
                                <img class="d-block w-100" src="./assets/img/home4-category2-banner1.webp" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/img/home4-category2-banner2.webp" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/img/home4-category3-banner1.webp" alt="Third slide">
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
                        <h3 class="product-details-title">Casual Women pants</h3>
                        <div class="product-details-review">
                            <div class="product-review-icon">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <button type="button" class="product-review-show">156 reviews</button>
                        </div>
                        <p class="product-details-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus, repellendus. Nam voluptate illo ut quia non sapiente provident alias quos laborum incidunt, earum accusamus, natus. Vero pariatur ut veniam sequi amet consectetur.</p>
                        <div class="product-details-color-list">
                            <h4>Color:</h4>
                            <div class="color-list-check">
                                <input class="form-check-input bg-red" type="radio" name="flexRadioColorList" id="colorList1">
                                <label class="form-check-label" for="colorList1">Red</label>
                            </div>
                            <div class="color-list-check">
                                <input class="form-check-input bg-green" type="radio" name="flexRadioColorList" id="colorList2" checked="">
                                <label class="form-check-label" for="colorList2">Green</label>
                            </div>
                            <div class="color-list-check me-0">
                                <input class="form-check-input bg-blue" type="radio" name="flexRadioColorList" id="colorList3">
                                <label class="form-check-label" for="colorList3">Blue</label>
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
                        <div class="product-details-price"><?php echo $productprice ?><span class="price-old">$650.00</span></div>
                        <div class="product-details-action">
                            <button type="button" class="product-action-btn" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">Add to cart</button>
                            <button type="button" class="product-action-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                <i class="fa fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="nav product-details-nav me-lg-6" id="product-details-nav-tab" role="tablist">
                        <button class="nav-link" id="specification-tab" data-bs-toggle="tab" data-bs-target="#specification" type="button" role="tab" aria-controls="specification" aria-selected="false">Specification</button>
                        <button class="nav-link active" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="true">Review</button>
                    </div>
                    <div class="tab-content me-lg-6" id="product-details-nav-tabContent">
                        <div class="tab-pane" id="specification" role="tabpanel" aria-labelledby="specification-tab">
                            <ul class="product-details-info-wrap">
                                <li><span>Weight :</span> 250 g</li>
                                <li><span>Dimensions :</span>10 x 10 x 15 cm</li>
                                <li><span>Materials :</span> 60% cotton, 40% polyester</li>
                                <li><span>Other Info :</span> American heirloom jean shorts pug seitan letterpress</li>
                            </ul>

                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius velit corporis quo voluptate culpa soluta, esse accusamus, sunt quia omnis amet temporibus sapiente harum quam itaque libero tempore. Ipsum, ducimus. lorem</p>
                        </div>

                        <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <!--== Start Reviews Content Item ==-->
                            <div class="product-review-item">
                                <div class="product-review-top">
                                    <div class="product-review-thumb">
                                        <img src="assets/images/shop/details/c1.png" alt="Images">
                                    </div>
                                    <div class="product-review-content">
                                        <h4 class="product-reviewer-name">Tomas Doe</h4>
                                        <h5 class="product-reviewer-designation">Delveloper</h5>
                                        <div class="product-review-icon">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales egestas augue neque euismod scelerisque viverra.</p>
                                <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                            </div>
                            <!--== End Reviews Content Item ==-->

                            <!--== Start Reviews Content Item ==-->
                            <div class="product-review-item product-review-reply">
                                <div class="product-review-top">
                                    <div class="product-review-thumb">
                                        <img src="assets/images/shop/details/c2.png" alt="Images">
                                    </div>
                                    <div class="product-review-content">
                                        <h4 class="product-reviewer-name">Robat Fiftyk</h4>
                                        <h5 class="product-reviewer-designation">UI/UX Designer</h5>
                                        <div class="product-review-icon">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales egestas augue neque euismod scelerisque viverra.</p>
                                <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                            </div>
                            <!--== End Reviews Content Item ==-->

                            <!--== Start Reviews Content Item ==-->
                            <div class="product-review-item mb-0">
                                <div class="product-review-top">
                                    <div class="product-review-thumb">
                                        <img src="assets/images/shop/details/c3.png" alt="Images">
                                    </div>
                                    <div class="product-review-content">
                                        <h4 class="product-reviewer-name">Arry twentyk</h4>
                                        <h5 class="product-reviewer-designation">UI/UX Designer</h5>
                                        <div class="product-review-icon">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales egestas augue neque euismod scelerisque viverra.</p>
                                <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                            </div>
                            <!--== End Reviews Content Item ==-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product-reviews-form-wrap">
                        <h4 class="product-form-title">Leave a reply</h4>
                        <div class="product-reviews-form">
                            <form action="#">
                                <div class="form-input-item">
                                    <textarea class="form-control" placeholder="Enter you feedback"></textarea>
                                </div>
                                <div class="form-input-item">
                                    <input class="form-control" type="text" placeholder="Full Name">
                                </div>
                                <div class="form-input-item">
                                    <input class="form-control" type="email" placeholder="Email Address">
                                </div>
                                <div class="form-input-item">
                                    <div class="form-ratings-item">
                                        <div class="product-ratingsform-form-icon">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <span class="title">Provide Your Ratings</span>
                                    </div>
                                </div>
                                <div class="form-input-item mb-0">
                                    <button type="submit" class="btn">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
<!DOCTYPE HTML>
<html>

<head></head>

<body>


    <form action="testshop.php" method="post">
        <!-- here start the dropdown list -->
        <select style=" width: 100%; height: 30px;">
            <?php
            $d = "SELECT * FROM SHOP";
            $f = oci_parse($connection, $d);
            $g = oci_execute($f);
            while ($h = oci_fetch_assoc($f)) {
                echo '<option value="' . $h['SHOP_NAME'] . '">  ' . $h['SHOP_NAME'] . '</option>';
            }

            ?>
        </select>
        <input type="submit" name="submit" style=" background-color: #74b72e;border-color:#74b72e; color:white; height: 30px; width: 30%;">
    </form>


    <div class="widget category mb-50">

        <!-- Title -->
        <h6 class="widget-title mb-30">Other Shops</h6>

        <!-- Catagories -->
        <div class="widget-desc col-12">
            <?php
            include("connection.php");
            $sql = "SELECT * FROM shop";
            $query = oci_parse($connection, $sql);
            oci_execute($query);
            while (($row = oci_fetch_array($query, OCI_ASSOC)) != false) :
            ?>
                <li>
                    <a href=""><?php echo $row['SHOP_NAME'] ?></a>
                </li>
            <?php endwhile ?>

        </div>
    </div>

    <?php

    session_start();
    include 'connection.php';
    if (isset($_POST['submit'])) {
        $sql =    "SELECT * FROM SHOP, PRODUCT WHERE SHOP.SHOP_ID = PRODUCT.SHOP_ID";
        $f = oci_parse($connection, $sql);
        $g = oci_execute($f);
        while ($ro = oci_fetch_assoc($f)) {

            echo '<div class="col-md-4 col-sm-6 center-responsive">';
            echo '<div class="product">';

            echo '<img src="products/' . $ro['PRODUCT_PIC1'] . '" alt="product image" class="img-responsive">';
            echo '<div class ="text">';

            echo '<h3>';

            echo '<a href="details.php?
                                pid=' . $ro['PRODUCT_ID'] . '">' . $ro['PRODUCT_NAME'] . '</a>';

            echo '</h3>';
            if ($ro['DISAMOUNT'] > 0) {
                echo '<p class="price"><s><span>$' . $ro['PRODUCTPRICE'] . '/' . $ro['PRODUCTUNIT'] . '</s></p>';
                $d = $ro['DISAMOUNT'];
                $ro['PRODUCTPRICE'] = $ro['PRODUCTPRICE'] - ($ro['PRODUCTPRICE'] * ($d / 100));
                echo '<h4 class="price"><span>$' . ($ro['PRODUCTPRICE'] - ($ro['PRODUCTPRICE'] * ($d / 100))) . '/' . $ro['PRODUCTUNIT'] . '</h4>';
            } else {
                echo '<p class="price"><span>$' . $ro['PRODUCTPRICE'] . '/' . $ro['PRODUCTUNIT'] . '</p>';
            }




            echo '<p class="buttons">';

            echo '<a class="btn btn-default" href="details.php?
                                pid=' . $ro['PRODUCT_ID'] . '">

                                                        View Details

                                                    </a>';
            if (!isset($_SESSION['cid'])) {
                echo '  <a class="btn btn-primary" href="login.php?
                            pid=' . $ro['PRODUCT_ID'] . '">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                            </a>';
                echo '</p>';
            } else {

                echo '  <a class="btn btn-primary" href="details.php?
                            pid=' . $ro['PRODUCT_ID'] . '">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                            </a>';
                echo '</p>';
            }

            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    ?>

    <div class="row ">

        <?php

        include("connection.php");
        $sql = "SELECT * FROM product Left Join shop ON SHOP.SHOP_ID = PRODUCT.SHOP_ID Left Join TRADER on SHOP.TRADER_ID = TRADER.TRADER_ID ";
        $query = oci_parse($connection, $sql);
        oci_execute($query);
        while (($row = oci_fetch_array($query, OCI_ASSOC)) != false) :
        ?>
            <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                <div class="product">
                    <a href="" class="img-prod">
                        <img class="img-fluid" src="products/<?php echo $row['PRODUCT_PIC1']; ?>" alt="product image"></>
                    </a>
                    <div class="text py-3 px-3">
                        <h3>
                            <a href="#"><?php echo $row['PRODUCT_NAME']; ?></a>
                        </h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price">
                                    <span>$<?php echo $row['PRODUCTPRICE']; ?></span>
                                </p>
                            </div>
                        </div>

                        <hr class="product-line">


                    </div>
                </div>
            </div>
        <?php endwhile ?>

    </div>
</body>

</html>
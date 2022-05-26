<?php
session_start();
$active = 'Account';
include('connection.php');
if (!isset($_SESSION['cid'])) {
    header("location: customerview.php");
} else {
    $customerid = $_SESSION['cid'];
    $_SESSION['cid'] = $customerid;
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
        .bloc_left_price {
            color: #c01508;
            text-align: center;
            font-weight: bold;
            font-size: 150%;
        }

        .category_block li:hover {
            background-color: #007bff;
        }

        .category_block li:hover a {
            color: #ffffff;
        }

        .category_block li a {
            color: #343a40;
        }

        .add_to_cart_block .price {
            color: #c01508;
            text-align: center;
            font-weight: bold;
            font-size: 200%;
            margin-bottom: 0;
        }

        .add_to_cart_block .price_discounted {
            color: #343a40;
            text-align: center;
            text-decoration: line-through;
            font-size: 140%;
        }

        .product_rassurance {
            padding: 10px;
            margin-top: 15px;
            background: #ffffff;
            border: 1px solid #6c757d;
            color: #6c757d;
        }

        .product_rassurance .list-inline {
            margin-bottom: 0;
            text-transform: uppercase;
            text-align: center;
        }

        .product_rassurance .list-inline li:hover {
            color: #343a40;
        }

        .pagination {
            margin-top: 20px;
        }

        .td {
            width: 80px;
            height: 60px;

        }




        .btn-primary {
            background-color: #ff5300;
            border: none;
        }
    </style>


</head>

<body>
    <?php
    if (isset($_SESSION['cid'])) {
        $customerid = $_SESSION['cid'];
    }
    ?>
    <?php include './navbar.php'; ?>
    <div style="margin-top:5%;margin-bottom:5%">
        <center>
            <!--  center Begin  -->

            <h1> My Orders </h1>

            <p class="lead"> Your orders on one place</p>

            <p class="text-muted">

                If you have any questions, feel free to <a href="contact1.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>

            </p>

        </center><!--  center Finish  -->


        <hr>


        <div class="table-responsive">
            <!--  table-responsive Begin  -->

            <div class="col-12">
                <?php


                $t = 0;


                $a = "SELECT * FROM CART,PRODUCT WHERE CART.PRODUCT_ID=PRODUCT.PRODUCT_ID AND CUSTOMER_ID=$customerid";
                $b = oci_parse($conn, $a);
                $c = oci_execute($b);
                $f = oci_num_rows($b);
                echo '<div class="table-responsive">';
                echo '<table class="table table-striped text-center">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">Product</th>';
                echo '<th scope="col">Product Name</th>';
                echo '<th scope="col">Price</th>';
                echo '<th scope="col" class="text-center">Quantity</th>';
                echo '<th scope="col" class="text-right">Total Price</th>';
                echo '</tr>';
                echo '</thead>';
                while ($d = oci_fetch_assoc($b)) {
                    echo '<tbody>';
                    $m = $d['PRODUCT_ID'];
                    echo '<tr>';
                    echo '<td><img src="products/' . $d['PRODUCT_PIC1'] . '" /> </td>';
                    echo '<td>' . $d['PRODUCT_NAME'] . '</td>';
                    echo '<td>$' . $d['PRODUCTPRICE'] . '</td>';
                    echo '<td>' . $d['QUANTITY'] . '</td>';
                    $m = $d['QUANTITY'] * $d['PRODUCTPRICE'];
                    $t = $t + $m;

                    $a = $d['CART_ID'];


                    echo '<td class="text-right">$' . $m . '</td>';
                    echo '</tr>';
                }




                ?>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total Price</strong></td>
                    <td class="text-right"><strong> <?php echo '$' . $t;  ?></strong></td>
                </tr>
                </tbody>
                </table>

            </div>

        </div>
        <!--  table-responsive </div>
   



    <!-- footer section -->


        <?php include_once 'footer.php'; ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




</body>

</html>
<?php
include('connection.php');

session_start();
if (!isset($_SESSION['tid'])) {
    header("location:login.php");
    # code...
} else {

    $traderid = $_SESSION['tid'];
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order For Trader</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <style>
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: #ff5300;
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

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

        img {
            width: 80px;
            height: 60px;

        }

        .btn-primary {
            background-color: #ff5300;
            border: none;
        }

        .btn-primary:hover {
            background-color: #ff5300;
            border: none;
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>

<body>

    <?php include './navbar.php'; ?>

    <div class="sidebar">

        <a href="traderprofile.php">My Account</a>
        <a href="traderproduct.php">My Products</a>
        <a class="active" href="orderfortrader.php">Invoices</a>
    </div>
    <div class="content">
        <div class="col-12 text-center">
            <h2 style="color:#ff5300;">Order/Payments For My Products</h2>
            <br>

        </div>
        <br>
        <br>


        <div class="col-12">
            <?php
            $z = null;


            $a = "SELECT * FROM ORDER_DETAIL,CUSTOMER,PRODUCT,TRADER WHERE ORDER_DETAIL.PRODUCT_ID=PRODUCT.PRODUCT_ID  AND CUSTOMER.CUSTOMER_ID = CUSTOMER.CUSTOMER_ID  AND PRODUCT.TRADER_ID=TRADER.TRADER_ID AND TRADER.TRADER_ID='$traderid'";
            $b = oci_parse($conn, $a);
            $c = oci_execute($b);



            echo '<div class="table-responsive">';
            echo '<table class="table table-striped text-center">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">ORDER ID</th>';
            echo '<th scope="col">CUSTOMER NAME</th>';
            echo '<th scope="col">PRODUCT IMAGE</th>';
            echo '<th scope="col">PRODUCT NAME</th>';
            echo '<th scope="col">QUANTITY</th>';
            echo '<th scope="col">TOTAL PRICE</th>';
            echo '<th scope="col">INVOICE</th>';


            echo '</tr>';
            echo '</thead>';
            while ($d = oci_fetch_assoc($b)) {
                echo '<tbody>';
                echo '<tr>';
                $a = $d['PRODUCTQUANTITY'] * $d['PRODUCTPRICE'];
                echo '<td>' . $d['ORDER_ID'] . '</td>';
                echo '<td>' . $d['NAME'] . '</td>';
                echo '<td><img src="./assets/img/product/' . $d['PRODUCT_PIC1'] . '" /> </td>';
                echo '<td>' . $d['PRODUCT_NAME'] . '</td>';
                echo '<td>' . $d['QUANTITY'] . ' ' . $d['PRODUCTUNIT'] . '</td>';


                echo '<td>$' . $a . '</td>';
                echo '<td><a href="./cusinvoice.php"?oid=' . $d['ORDER_ID'] . '" class="btn btn-success">View Invoice</a></td>';


                echo '</tr>';
            }



            ?>



            </tbody>
            </table>
        </div>
    </div>





    </div>

</body>

</html>
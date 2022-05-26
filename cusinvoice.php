<?php
session_start();
if (isset($_GET['oid'])) {
    $orderid = $_GET['oid'];
    $_GET['oid'] = $orderid;
}
include('connection.php');
$active = 'Account';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customer Invoice - Click & Collect Groceries</title>
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
        .btn-primary {
            background: #ed0651;

        }

        #search .navbar-form {
            float: right;
        }

        #search {
            clear: both;
            border-top: solid 1px #74b72e;
            text-align: right;
        }

        #search .navbar-form .input-group {
            display: table;
        }

        #search .navbar-form .input-group .form-control {
            width: 100%;
        }

        #slider {
            margin-bottom: 40px;
        }

        .invoice-title h2,
        .invoice-title h3 {
            display: inline-block;
        }

        .table>tbody>tr>.no-line {
            border-top: none;
        }

        .table>thead>tr>.no-line {
            border-bottom: none;
        }

        .table>tbody>tr>.thick-line {
            border-top: 2px solid;
        }
    </style>


</head>

<body>

    <?php include './navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php
                $link;
                if (!empty($_SESSION['tid'])) {
                    $link = "traderprofile.php";
                } else {
                    $link = "customer-profile.php";
                }
                $z = null;


                $a = "SELECT * FROM ORDER_DETAIL,PRODUCT,CUSTOMER WHERE ORDER_DETAIL.PRODUCT_ID=PRODUCT.PRODUCT_ID AND ORDER_DETAIL.CUSTOMER_ID=CUSTOMER.CUSTOMER_ID";
                $b = oci_parse($conn, $a);
                $c = oci_execute($b);
                $d = oci_fetch_assoc($b);
                echo '<div class="invoice-title">';
                echo '<h2>Invoice</h2><h3 class="pull-right" style="t">Order # ' . $d['ORDER_ID'] . '</h3>';
                echo '</div>';
                echo '<hr>';
                echo '<div class="row">';
                echo '<div class="col-xs-6">';
                $a = $d['QUANTITY'] * $d['PRODUCTPRICE'];
                echo '<address>';
                echo '<strong>Billed To:</strong><br>';
                echo $d['NAME'] . '<br>';
                echo $d['CUSTOMER_ADDRESS'] . '<br>';
                echo '</address>';
                echo '</div>';
                echo '</div>';
                echo '<div class="row">';
                echo '<div class="col-xs-6">';
                echo '<address>';
                echo '<strong>Payment Method:</strong><br>';
                echo 'Paypal<br>';
                echo '</address>';
                echo '</div>';
                echo '</div>';
                echo '<div class="row">';
                echo '<div class="col-xs-6">';
                echo '<address>';
                echo '<strong>Deivery Time:</strong><br>';
                echo $d['ORDAY'] . ', ' . $d['ORDATE'] . '<br>';
                echo $d['ORTIME'] . '<br>';
                echo '</address>';
                echo '</div>';
                echo '</div>';


                echo '<div class="row">';
                echo '<div class="col-md-12">';
                echo '<div class="panel panel-default">';
                echo '<div class="panel-heading">';
                echo '<h3 class="panel-title"><strong>Order summary</strong></h3>';
                echo '</div>';
                echo '<div class="panel-body">';
                echo '<div class="table-responsive">';
                echo '<table class="table table-condensed">';
                echo '<thead>';
                echo '<tr>';
                echo '<td><strong>Product Id</strong></td>';
                echo '<td><strong>Product Name</strong></td>';
                echo '<td class="text-center"><strong>Price</strong></td>';
                echo '<td class="text-center"><strong>Quantity</strong></td>';
                echo '<td class="text-right"><strong>Total</strong></td>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                echo '<tr>';
                echo '<td>' . $d['PRODUCT_ID'] . '</td>';
                echo '<td>' . $d['PRODUCT_NAME'] . '</td>';
                echo '<td class="text-center">$' . $d['PRODUCTPRICE'] . '</td>';
                echo '<td class="text-center">' . $d['QUANTITY'] . '</td>';
                echo '<td class="text-right">$' . $a . '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td class="no-line"></td>';
                echo '<td class="no-line"></td>';
                echo '<td class="no-line"></td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<hr>';
                echo '<hr>';
                echo '<div class="text-right">Grand total:  ';
                echo '<td class="no-line text-right">$' . $a . '</td>';
                echo '<br>';
                echo '<div class="text-right">Discount   $0';
                echo '<div class="text-right">(Tax rate)   0%';
                echo '<div class="text-right">Tax $0';
                echo '<div class="text-center">Thank You for choosing Click&collect Groceries';
                echo '</div>';
                echo '<div class="text-right"><a href="' . $link . '" class="btn btn-success" style="text-decoration:none;">My Profile</a>';
                echo '</div>';
                echo '</div>';


                ?>
            </div>
        </div>
    </div>

    <!-- footer section -->
    <br>
    <br>

    <?php include 'footer.php'; ?>

</body>

</html>
<?php
session_start();
if (!isset($_SESSION['cid'])) {
    header("location:invoice.php");
    # code...
} else {
    $customerid = $_SESSION['cid'];
}
include('connection.php');
$active = 'Account';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice - Click & Collect Groceries</title>
    <link rel="stylesheet" href="Styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="Styles/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="style.css">
    <style>
        .sad {
            background-color: #74b72e;
            border: none;
        }

        li {
            font-family: Arial, Helvetica, sans-serif;
        }

        h4 {
            margin-left: 0px;
            color: #003366;
            font-family: Arial, Helvetica, sans-serif;
            /*outline: 1px solid grey;*/
        }

        li i {
            color: rgb(44, 95, 45);

            font-family: Arial, Helvetica, sans-serif;
        }

        .view {
            float: left;
            background-color: #f1f1f1;
            width: 200px;
            height: 100%;
            /*position: relative;*/
            position: fixed;
        }

        .view a {
            float: left;
            color: black;
            padding: 19px;
            text-decoration: black;
        }

        .view a.active {
            background-color: #003366;
            color: white;
            width: 200px;
        }

        .view a:hover:not(.active) {
            background-color: #74b72e;
            color: white;
            width: 200px;
        }

        .column {
            width: 100%;
            padding: 50px;
            border: 1px solid #74b72e;
            margin: 10px;
            margin-left: 10px;
            text-align: left;
            box-shadow: 0% 2px #74b72e;
        }

        .column2 {
            margin-right: 0px;
            width: 50%;
            border: 0px solid #74b72e;
            /*margin: 10px;*/
            /*padding: 10px;*/
        }

        .column3 {
            justify-content: center;
            margin-left: 0px;
        }

        .column4 {
            margin-top: 5px;
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
    <div class="row" style="margin-top:5%;margin-bottom:5%">
        <div class="col-md-3">
            <div class="panel panel-default sidebar-menu">
                <!--  panel panel-default sidebar-menu Begin  -->

                <div class="panel-heading">
                    <!--  panel-heading  Begin  -->

                    <?php

                    $customer_session = $_SESSION['cid'];

                    $get_customer = "select * from CUSTOMER where CUSTOMER_ID='$customer_session'";

                    $run_customer = oci_parse($conn, $get_customer);
                    $connect = oci_execute($run_customer);
                    $row_customer = oci_fetch_array($run_customer);

                    $customer_image = $row_customer['PROFILEPIC'];

                    $customer_name = $row_customer['NAME'];

                    if (!isset($_SESSION['cid'])) {
                    } else {

                        echo "
            
                <center>
                
                    <img src='images/$customer_image' class='img-responsive' >
                
                </center>
                
                <br/>
                
                <h3 class='panel-title' align='center'>
                
                    Name: $customer_name
                
                </h3>
            
            ";
                    }

                    ?>

                </div><!--  panel-heading Finish  -->

                <div class="panel-body">
                    <!--  panel-body Begin  -->

                    <ul class="nav-pills nav-stacked nav">
                        <!--  nav-pills nav-stacked nav Begin  -->

                        <li class="<?php if (isset($_GET['editprofile'])) {
                                        echo "active";
                                    } ?>">

                            <a class="active" href="customerview.php">Edit Profile</a>

                        </li>

                        <li class="<?php if (isset($_GET['myorder'])) {
                                        echo "active";
                                    } ?>">

                            <a href="cusorder.php">My Orders</a>

                        </li>

                        <li class="<?php if (isset($_GET['delaccount'])) {
                                        echo "active";
                                    } ?>">

                            <a href="deleteaccount.php?cid='.$customerid.'">Delete Account</a>

                        </li>

                        <li class="<?php if (isset($_GET['invoice'])) {
                                        echo "active";
                                    } ?>">

                            <a href="invoice.php">Payments</a>

                        </li>

                        <li>

                            <a href="logout.php">Log Out</a>

                        </li>

                    </ul><!--  nav-pills nav-stacked nav Begin  -->

                </div><!--  panel-body Finish  -->

            </div><!--  panel panel-default sidebar-menu Finish  -->
        </div>
        <div class="col-9">
            <?php
            $z = null;
            $a = "SELECT * FROM ORDER_DETAIL,PRODUCT WHERE CUSTOMER_ID='$customerid' AND ORDER_DETAIL.PRODUCT_ID=PRODUCT.PRODUCT_ID";
            $b = oci_parse($conn, $a);
            $c = oci_execute($b);
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped text-center">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">ORDER ID</th>';
            echo '<th scope="col">PRODUCT NAME</th>';
            echo '<th scope="col">PRODUCT UNIT PRICE</th>';
            echo '<th scope="col">QUANTITY</th>';
            echo '<th scope="col">TOTAL PRICE</th>';
            echo '<th scope="col">Invoice</th>';
            echo '</tr>';
            echo '</thead>';
            while ($d = oci_fetch_assoc($b)) {
                echo '<tbody>';
                echo '<tr>';
                $ab = $d['QUANTITY'] * $d['PRODUCTPRICE'];
                echo '<td>' . $d['ORDER_ID'] . '</td>';
                echo '<td>' . $d['PRODUCT_NAME'] . '</td>';
                echo '<td>$' . $d['PRODUCTPRICE'] . '</td>';
                echo '<td>' . $d['QUANTITY'] . '' . $d['PRODUCTUNIT'] . '</td>';

                echo '<td>$' . $ab . '</td>';

                echo '<td><a href="cusinvoice.php?oid=' . $d['ORDER_ID'] . '" class="btn btn-success">View Invoice</a></td>';
            }
            ?>



            </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- footer section -->


    <?php include_once 'footer.php'; ?>


</body>

</html>
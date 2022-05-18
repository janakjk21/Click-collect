<?php
session_start();
$active = 'Account';
if (!isset($_SESSION['tid'])) {
    header("location:login.php");
    # code...
} else {
    $traderid = $_SESSION['tid'];
    $_SESSION['tid'] = $traderid;
    // $sname=$_GET['sname'];
}

include('./connection.php');

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
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .view a:hover:not(.active) {
            background-color: #74b72e;
            color: white;
            width: 180px;
        }

        .column {
            width: 100%;
            padding: 50px;
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
            background-color: #74b72e;
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

    <?php
    include './navbar.php';
    ?>

    <div class="row" style="margin-top:5%;margin-bottom:5%;">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <?php
            $a = "SELECT * FROM TRADER WHERE TRADER_ID='$traderid'";
            $b = oci_parse($conn, $a);
            $c = oci_execute($b);
            while ($d = oci_fetch_assoc($b)) {
            ?>
                <div class="panel panel-default sidebar-menu">
                    <!--  panel panel-default sidebar-menu Begin  -->

                    <div class="panel-heading">
                        <!--  panel-heading  Begin  -->

                        <?php

                        $trader_session = $_SESSION['tid'];

                        $get_trader = "select * from TRADER where TRADER_ID='$trader_session'";

                        $run_trader = oci_parse($conn, $get_trader);
                        $connect = oci_execute($run_trader);
                        $row_trader = oci_fetch_array($run_trader);

                        $trader_image = $row_trader['TRADER_PROFILE'];

                        $trader_name = $row_trader['NAME'];

                        if (!isset($_SESSION['tid'])) {
                        } else {
                            echo "<center><img src='./assets/img/$trader_image' class='img-responsive' ></center><br/><h3 class='panel-title' align='center'>Name: $trader_name</h3>";
                        }

                        ?>

                    </div><!--  panel-heading Finish  -->

                    <div class="panel-body box">
                        <!--  panel-body Begin  -->

                        <ul class="nav-pills nav-stacked nav" style="display: flex;flex-direction: column; padding-left:30px;">
                            <!--  nav-pills nav-stacked nav Begin  -->

                            <li class="<?php if (isset($_GET['editprofile'])) {
                                            echo "active";
                                        } ?> ">

                                <a class="active btn" href="traderprofile.php">Trader Profile</a>

                            </li>

                            <li class="<?php if (isset($_GET['Products'])) {
                                            echo "active";
                                        } ?>">

                                <a href="traderproduct.php " class="btn ">My Products</a>

                            </li>

                            <li class="<?php if (isset($_GET['tradershop'])) {
                                            echo "active";
                                        } ?>">

                                <a href="tradershop.php" class="btn ">Shop</a>

                            </li>

                            <li>

                                <a href="logout.php" class="btn ">Log Out</a>

                            </li>

                        </ul><!--  nav-pills nav-stacked nav Begin  -->

                    </div><!--  panel-body Finish  -->

                </div><!--  panel panel-default sidebar-menu Finish  -->
        </div>

        <div class=" col-md-8">

            <div class="box">
                <!-- box Begin -->

                <div class="row">
                    <div class=" column col-md-11">

                        <div class="row">
                            <div class="col-12 text-center" style="margin-top: 50px;">
                                <h2>My Shop</h2>
                                <br>
                                <button class="btn btn-primary"><a style="text-decoration:none; color:white;" href="addshop.php">


                                        Add Shop</a></button>
                            </div>
                            <br>
                            <br>


                            <div class="col-12">
                                <?php
                                $z = null;


                                $a = "SELECT * FROM SHOP WHERE TRADER_ID='$traderid' ";
                                $b = oci_parse($conn, $a);
                                $c = oci_execute($b);



                                echo '<div class="table-responsive">';
                                echo '<table class="table table-striped text-center">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th scope="col">Shop Photo</th>';
                                echo '<th scope="col">Shop Name</th>';
                                echo '<th scope="col">Shop Address</th>';
                                echo '<th scope="col">Shop Contact</th>';
                                echo '<th scope="col">Shop Email</th>';
                                echo '<th>Action</th>';
                                echo '</tr>';
                                echo '</thead>';
                                while ($row = oci_fetch_assoc($b)) {
                                    echo '<tbody>';
                                    echo '<tr>';

                                    echo '<td><img src="./assets/img/' . $row['SHOP_PHOTO'] . '" style=" width:50px; height:50px;" /></td>';
                                    echo '<td>' . $row['SHOP_NAME'] . '</td>';
                                    echo '<td>' . $row['SHOP_ADDRESS'] . '</td>';
                                    echo '<td>' . $row['SHOP_PHONE'] . '</td>';
                                    echo '<td>' . $row['SHOP_EMAIL'] . '</td>';
                                    echo '<td class="text-right"><button style="background-color:#74b72e; border:none;" class="btn btn-sm btn-danger"><a href="updateshop.php?sid=' . $row['SHOP_ID'] . '" style="text-decoration:none; color:white;">Update </a></button><br><br>
                            <button class="btn btn-sm btn-danger"><a href="deleteshop.php?sid=' . $row['SHOP_ID'] . '"style="text-decoration:none; color:white;">Delete</a></button> </td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
            }
            include 'footer.php';
?>
</body>

</html>
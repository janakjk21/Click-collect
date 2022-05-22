<?php

$active = 'Account';
if (!isset($_SESSION['tid'])) {
    # code...
    session_start();
    header("login.php");
} else {

    $traderid = $_SESSION['tid'];
}



include('connection.php');

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


        .sad1 {
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
            color: #74b72e;

            font-family: Arial, Helvetica, sans-serif;
        }

        .view {
            float: left;
            width: 180px;
            height: 100%;
            position: relative;
        }

        .view a {
            float: left;
            color: black;
            padding: 25px;
            text-decoration: black;
        }

        .view a.active {
            background-color: #003366;
            ;
            color: white;
            width: 180px;
        }

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
    </style>

</head>

<body>
    <?php
    include './navbar.php';
    ?>

    <div class="row" style="margin-top:5%;margin-bottom:5%;">
        <div class="col-md-1 "></div>
        <div class="col-md-3 box" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
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

                    <div class="panel-body">
                        <!--  panel-body Begin  -->

                        <ul class="nav-pills nav-stacked nav" style="display: flex;flex-direction: column; padding-left:30px;">
                            <!--  nav-pills nav-stacked nav Begin  -->

                            <li class="<?php if (isset($_GET['editprofile'])) {
                                            echo "active";
                                        } ?>">

                                <a class="active" href="traderprofile.php">Trader Profile</a>

                            </li>

                            <li class="<?php if (isset($_GET['Products'])) {
                                            echo "active";
                                        } ?>">

                                <a href="traderproduct.php">My Products</a>

                            </li>

                            <li class="<?php if (isset($_GET['tradershop'])) {
                                            echo "active";
                                        } ?>">

                                <a href="tradershop.php">Shop</a>

                            </li>

                            <li>

                                <a href="logout.php">Log Out</a>

                            </li>

                        </ul><!--  nav-pills nav-stacked nav Begin  -->

                    </div><!--  panel-body Finish  -->

                </div><!--  panel panel-default sidebar-menu Finish  -->
        </div>

        <div class=" col-md-8">

            <div class="box" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                <!-- box Begin -->

                <div class="row">
                    <div class=" column col-md-11">

                        <div class="row">
                            <div class="col-12 text-center" style="margin-top: 50px;">
                                <h2>My Products</h2>
                                <br>
                                <button class="btn btn-primary"><a style="text-decoration:none; color:white;" href="addProduct.php">


                                        Add Product</a></button>
                            </div>
                            <br>
                            <br>

                            <div class="col-12">
                                <?php
                                $z = null;


                                $a = "SELECT * FROM PRODUCT WHERE TRADER_ID='$traderid'";
                                $b = oci_parse($conn, $a);
                                $c = oci_execute($b);



                                echo '<div class="table-responsive">';
                                echo '<table class="table table-striped text-center">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th scope="col">Product Image1</th>';
                                echo '<th scope="col">Product Image2</th>';
                                echo '<th scope="col">Product Image3</th>';
                                echo '<th scope="col">Product Name</th>';
                                echo '<th scope="col">Product Description</th>';
                                echo '<th scope="col">Price</th>';
                                echo '<th scope="col">Available Quantity</th>';
                                echo '<th scope="col" class="text-right">Product Unit</th>';
                                echo '<th scope="col">Maximum Order</th>';
                                echo '<th scope="col">Minimum Order</th>';
                                echo '<th>Action</th>';
                                echo '</tr>';
                                echo '</thead>';
                                while ($d = oci_fetch_assoc($b)) {
                                    echo '<tbody>';
                                    echo '<tr>';
                                    echo '<td><img src="./assets/img/' . $d['PRODUCT_PIC1'] . '" style=" width:50px; height:50px;" /> </td>';
                                    echo '<td><img src="./assets/img/' . $d['PRODUCT_PIC2'] . '" style=" width:50px; height:50px;" /> </td>';
                                    echo '<td><img src="./assets/img/' . $d['PRODUCT_PIC3'] . '" style=" width:50px; height:50px;" /> </td>';
                                    echo '<td>' . $d['PRODUCT_NAME'] . '</td>';
                                    echo '<td>' . $d['PRODUCTDES'] . '</td>';
                                    echo '<td>$' . $d['PRODUCTPRICE'] . '</td>';
                                    echo '<td>' . $d['PRODUCTQUANTITY'] . '</td>';
                                    echo '<td>' . $d['PRODUCTUNIT'] . '</td>';
                                    echo '<td>' . $d['MINORDER'] . '</td>';
                                    echo '<td>' . $d['MAXORDER'] . '</td>';
                                    echo '<td class="text-right"><button style="background-color:#74b72e; border:none;" class="btn btn-sm btn-danger"><a href="updateproduct.php?pid=' . $d['PRODUCT_ID'] . '" style="text-decoration:none; color:white;">Update</a></button><br><br>
                            <button class="btn btn-sm btn-danger"><a href="deleteproduct.php?pid=' . $d['PRODUCT_ID'] . '" style="text-decoration:none; color:white;">Delete</a></button> </td>';
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
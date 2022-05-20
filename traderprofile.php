<?php
session_start();
$active = 'Account';
if (!isset($_SESSION['tid'])) {
    header("login.php");
    # code...
} else {

    $traderid = $_SESSION['tid'];
}



include('./connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="Styles/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Trader Profile - Click & Collect Groceries</title>
    <style>
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


    <div class="row" style="margin-top:5%; margin-buttom:5%;">
        <div class="col-md-1"></div>
        <div class="col-md-3 box">
            <?php

            $traderid = 1;
            $a = "SELECT * FROM TRADER WHERE TRADER_ID='$traderid'";
            $b = oci_parse($conn, $a);
            $c = oci_execute($b);
            while ($d = oci_fetch_assoc($b)) {
            ?>
                <div class="panel panel-default sidebar-menu ">
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

                            echo "<center><img src='./assets/img/trader profile pic/$trader_image' class='img-responsive'  ></center><br/><h3 class='panel-title' align='center'>Name: $trader_name</h3>";
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

                                <a class="active btn " href="#">Trader Profile</a>

                            </li>

                            <li class="<?php if (isset($_GET['Products'])) {
                                            echo "active";
                                        } ?>">

                                <a class="btn " href=" traderproduct.php">My Products</a>

                            </li>

                            <li class="<?php if (isset($_GET['tradershop'])) {
                                            echo "active";
                                        } ?>">

                                <a href="tradershop.php" class="btn ">Shop</a>

                            </li>

                            <li>

                                <a href="./logout.php" class="btn btn-primary">Log Out</a>

                            </li>

                        </ul><!--  nav-pills nav-stacked nav Begin  -->

                    </div><!--  panel-body Finish  -->

                </div><!--  panel panel-default sidebar-menu Finish  -->
        </div>

        <div class=" col-md-7">

            <div class="box">
                <!-- box Begin -->

                <div class="row">
                    <div class=" column col-md-8">

                        <div class="row">
                            <div class=" column3 col-md-8">
                                <img style="width:80%; height:250px;  margin-top: 0px; justify-content: center;" src="./assets/img/trader profile pic/<?php echo $d['TRADER_PROFILE'] ?> ">
                            </div>

                            <div class="column4 col-md-4">
                                <ul class="list-unstyled">


                                    <h4 style="color:#233243;">Name:
                                        <i>
                                            <?php echo $d['NAME'] ?>
                                        </i>
                                    </h4>


                                    <br>
                                    <h4>Address :
                                        <h3>
                                            <?php echo $d['TRADER_ADDRESS'] ?>
                                        </h3>
                                    </h4>

                                    <br>

                                    <h4>Phone:
                                        <i>
                                            <?php echo $d['TRADER_PHONE'] ?>
                                        </i>
                                    </h4>

                                    <br>


                                    <h4>Email:
                                        <i>
                                            <?php echo $d['TRADER_EMAIL'] ?>
                                        </i>
                                    </h4>
                                </ul>

                            </div>
                        </div>
                        <div class="row">
                            <div class=" column2 col-md-5">
                                <a class="btn btn-primary sad" href="updatetraderpassword.php">Update Password
                                </a>
                                <a class="btn btn-primary sad" href="updatetrader.php?tid='.$traderid.'">Update Profile
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
            }
            include './footer.php';
?>
</body>

</html>
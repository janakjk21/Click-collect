<?php

// session_start();
// if (!isset($_SESSION["NAME"])) {
//     header("Location: login.php");
//     exit();
// }



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

    <title>Admin Profile - Click & Collect Groceries</title>
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


    <div class="row" style="margin-top:5%; margin-bottom:5%;">
        <div class="col-md-1"></div>
        <div class="col-md-3 box" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
            <?php

            // $traderid = $_SESSION['tid'];
            $a = "SELECT * FROM ADMIN WHERE ADMIN_ID=1";
            $b = oci_parse($conn, $a);
            $c = oci_execute($b);
            while ($d = oci_fetch_assoc($b)) {
             ?>
                <div class="panel panel-default sidebar-menu ">
                    <!--  panel panel-default sidebar-menu Begin  -->

                    <div class="panel-heading">
                        <!--  panel-heading  Begin  -->

                        <?php

                        // $trader_session = $_SESSION['tid'];

                        $get_trader = "select * from ADMIN where ADMIN_ID=1";

                        $run_trader = oci_parse($conn, $get_trader);
                        $connect = oci_execute($run_trader);
                        $row_trader = oci_fetch_array($run_trader);

                        // $trader_image = $row_trader['TRADER_PROFILE'];

                        $trader_name = $row_trader['ADMIN_NAME'];

                        ?>

                    </div><!--  panel-heading Finish  -->

                    <div class="panel-body">
                        <!--  panel-body Begin  -->

                        <ul class="nav-pills nav-stacked nav" style="display: flex;flex-direction: column; padding-left:30px;">
                            <!--  nav-pills nav-stacked nav Begin  -->

                            <li class="<?php if (isset($_GET['editprofile'])) {
                                            echo "active";
                                        } ?>">

                                <a class="active btn " href="#">Admin Profile</a>

                            </li>

                            <li class="<?php if (isset($_GET['Products'])) {
                                            echo "active";
                                        } ?>">

                                <a class="btn " href=" traderproduct.php">Customers</a>

                            </li>

                            <li class="<?php if (isset($_GET['tradershop'])) {
                                            echo "active";
                                        } ?>">

                                <a href="tradershop.php" class="btn ">Shops</a>

                            </li>

                            <li>

                                <a href="./logout.php" class="btn btn-primary">Log Out</a>

                            </li>

                        </ul><!--  nav-pills nav-stacked nav Begin  -->

                    </div><!--  panel-body Finish  -->

                </div><!--  panel panel-default sidebar-menu Finish  -->
        </div>

        <div class=" col-md-7">

            <div class="box" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                <!-- box Begin -->

                <div class="row">
                    <div class=" column col-md-8">

                        <div class="row">
        

                            <div class="column4 col-md-4">
                                <ul class="list-unstyled">

                                    <h4 style="color:#233243;">Name:
                                        <i>
                                            <?php echo $d['ADMIN_NAME'] ?>
                                        </i>
                                    </h4>

                                    <h4 style="color:#233243;">Password:
                                        <i>
                                            <?php echo $d['ADMIN_PASS'] ?>
                                        </i>
                                    </h4>


                                </ul>

                            </div>
                        </div>
                        <div class="row">
                            <div class=" column2 col-md-5" style="display: flex;">
                                <a class="btn btn-primary sad m-1" href="updatetraderpassword.php">Update Password
                                </a>
                                <a class="btn btn-primary sad m-1" href="updatetrader.php?tid='.$traderid.'">Update Profile
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./script.php" ?>

<?php
             }
            include './footer.php';
?>
</body>

</html>
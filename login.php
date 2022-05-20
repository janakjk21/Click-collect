<?php
if (!isset($_SESSION)) {
    session_start();
}
?>


<?php
$active = 'Account';

include("connection.php");

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $name = $_POST['NAME'];
    $pass = $_POST['PASSWORD'];
    $pass = md5($pass);
    if ($user == "CUSTOMER") {
        $mno = "SELECT * FROM CUSTOMER WHERE NAME='$name' AND PASSWORD='$pass'";
        $nop = oci_parse($conn, $mno);
        oci_execute($nop);
        $row = oci_fetch_assoc($nop);
        $opq = oci_num_rows($nop);
        if ($opq == 1) {
            $_SESSION['cid'] = $row['CUSTOMER_ID'];
            $_SESSION['NAME'] = $name;
            header("location:customer-profile.php");
        } else {
            $errormessage = "Invalid Login Details !!!";
        }
    }
    if ($user == "TRADER") {
        $mno = "SELECT * FROM TRADER WHERE NAME='$name' AND PASSWORD='$pass'";
        $nop = oci_parse($conn, $mno);
        oci_execute($nop);
        $row = oci_fetch_assoc($nop);
        $opq = oci_num_rows($nop);
        echo $opq;
        echo $row['TRADER_ID'];
        if ($opq == 1) {

            $_SESSION['tid'] = $row['TRADER_ID'];
            $_SESSION['NAME'] = $name;
            header('location:./traderprofile.php');
        } else {
            $errormessage = "Invalid Login Details !!!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Click & Collect Groceries</title>
    <link rel="stylesheet" href="Styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="Styles/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        $(document).ready(function() {
            $(".close").click(function() {
                $('#myAlert').alert();
            });
        });
    </script>
    <style>
        .box {
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px;
        }

        .form-container {
            padding: 90px;
            padding-top: 20px;
            margin-bottom: 15px;
            margin-top: 15px;
        }

        .form-container p {
            size: 12px;
            text-align: center;
        }

        .form-container .form-control {
            border: 1px solid #74b72e;
            background: white;
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

    <div id="content">
        <div class="container">
            <div class="col-md-3">

            </div>

            <div class="col-md-8" style="margin:100px auto 40px auto;">
                <div class="box" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                    <div class=" box-body">
                        <form action="" class="form-container" enctype="multipart/form-data" method="POST" ">
                           <h2 class=" loghead text-center"><b>Login Form</b></h2>
                            <br>
                            <center>
                                <!-- center Begin -->
                                <p>Already have an account, Click here to <a href="register.php" style="color:#fa0303;;">Customer Register</a>
                                    <a href="traderreg.php" style="color:#fa0303;;">Trader Register</a>
                                </p>

                            </center><!-- center Finish -->
                            <?php

                            if (isset($errormessage)) {
                                echo "<div class='alert alert-danger' id='myAlert'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>";
                                echo "$errormessage";
                                echo "</div>";
                            }
                            ?>
                            <div class="form-group">
                                <select class="form-control" name="user">

                                    <option value="CUSTOMER"><a href="customerlogin.php"> Customer</a></option>
                                    <option value="TRADER"><a href="traderlogin.php">Trader</option></a>

                                </select>
                            </div>
                            <div class="form-group">
                                <input name="NAME" type="text" class="form-control" required placeholder="   Enter Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="PASSWORD" class="form-control" required placeholder="   Enter password">
                                <br>
                            </div>

                            <button type="submit" name="login" class="btn btn-block log">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <?php include 'footer.php'; ?>
</body>

</html>
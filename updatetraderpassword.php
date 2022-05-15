<?php
session_start();
if (!isset($_SESSION['tid'])) {
    // header("location:login.php");
    # code...
} else {

    $traderid = $_SESSION['tid'];
}



include('./connection.php');

if (isset($_POST['update'])) {
    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $rnpass = $_POST['rnpass'];


    $a = "SELECT * FROM TRADER WHERE TRADER_ID ='$traderid' AND TRADER_REPASSWORD='$opass'";
    $b = oci_parse($connection, $a);
    $c = oci_execute($b);
    $d = oci_fetch_assoc($b);
    $e = oci_num_rows($b);

    if ($e == 1) {
        if ($npass == $rnpass) {
            $hashpass = md5($npass);

            $v = "UPDATE TRADER SET PASSWORD ='$hashpass', TRADER_REPASSWORD='$npass' WHERE TRADER_ID='$traderid'";
            $fd = oci_parse($connection, $v);
            $fg = oci_execute($fd);
            if ($fd) {
                $successmessage = "Your Password Updated Successfully.";
            }
        } else {
            $errormessage = "Two New Password Doesnot Match !!!";
        }
    } else {
        $errormessage = "Your Old Password Doesnot Match !!!";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Trader Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">


    <script type="text/javascript">
        $(document).ready(function() {
            $(".close").click(function() {
                $('#myAlert').alert();

            });

        });
    </script>



    <style>
        /* inline css for login form */

        .form-container {
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px 0px #74b72e;
            margin-bottom: 15px;
            margin-top: 15px;
        }

        .form-container .form-control {
            border: 1px solid #74b72e;
            background: white;
        }

        .loghead {
            color: #74b72e;

        }

        .log {
            background: #74b72e;
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;

        }
    </style>

</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <form action="" class="form-container" enctype="multipart/form-data" method="POST">
                    <h4 class="loghead text-center">Update Password</h4>
                    <br>
                    <?php

                    if (isset($errormessage)) {
                        echo "<div class='alert alert-danger' id='myAlert'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>";
                        echo "$errormessage";
                        echo "</div>";
                    }
                    if (isset($successmessage)) {
                        echo "<div class='alert alert-success' id='myAlert'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>";
                        echo "$successmessage";
                        echo "</div>";
                    }
                    ?>


                    <div class="form-group">
                        <label>Old Password</label>
                        <input name="opass" type="password" class="form-control" required placeholder="   Enter old password">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="npass" class="form-control" required placeholder="   Enter new password">

                    </div>
                    <div class="form-group">
                        <label>Re-type New Password</label>
                        <input type="password" name="rnpass" class="form-control" required placeholder="   Re-type new password">
                        <br>
                    </div>

                    <div class="clearfix">

                        <div class="float-left"><button type="submit" name="update" class="btn btn-success">Update</button></div>
                        <div class="float-right"><button class="btn  log"><a href="traderprofile.php" style="text-decoration:none; color:white;">My Profile</a></button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




</body>

</html>
<?php
session_start();
$active = 'Account';
if (!isset($_SESSION['tid'])) {
    header("login.php");
} else {
    $traderid = $_SESSION['tid'];

    include('connection.php');

    if (isset($_POST["add"])) {
        $sname = $_POST['SHOP_NAME'];
        $saddress = $_POST['SHOP_ADDRESS'];
        $sphone = $_POST['SHOP_PHONE'];
        $semail = $_POST['SHOP_EMAIL'];
        $namevalid = "/^([a-zA-Z' ]+)$/"; //for name validation

        $s = "SELECT * FROM SHOP WHERE SHOP_NAME = '$sname'";
        $p = oci_parse($conn, $s);
        oci_execute($p);
        $c = 0;
        while ($f = oci_fetch_assoc($p)) {
            $c += 1;
        }


        if (isset($_FILES['SHOP_PHOTO'])) { //if customer select a file
            $target_dir1 = "./assets/img/shop/";
            $filename1 = $_FILES['SHOP_PHOTO']['name'];



            $target_file1 = $target_dir1 . basename($_FILES["SHOP_PHOTO"]["name"]);

            $imageFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
            //checking the file type
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $errormessage = "Please Select .jpg,.gif,.png File Type Only !!!";
            }


            if (!empty($sname) && !empty($saddress) && !empty($sphone) && !empty($semail)) {

                if ($c == 0) {

                    if (move_uploaded_file($_FILES["SHOP_PHOTO"]["tmp_name"], $target_file1)) {
                        $a = "INSERT INTO SHOP (SHOP_ID,SHOP_NAME,SHOP_ADDRESS,SHOP_PHONE,SHOP_EMAIL,TRADER_ID,SHOP_PHOTO) VALUES (SHOP_SEQ.nextval,'$sname','$saddress','$sphone','$semail','$traderid','$filename1')";
                        $b = oci_parse($conn, $a);
                        $d = oci_execute($b);

                        if ($d) {
                            header('location:tradershop.php ?>');

                            $success = "Shop Added Successfully !!!";
                        } else {
                        }
                    } else {
                        echo ("Shop Photo is not uploaded");
                    }
                } else {
                    $message = "Shop Name Already Exists !!!";
                }
            } else {
                $message = "Please Fill All Fields !!!";
            }
        } else {

            $message = "Please Select a Valid Image !!";
        }
    } else {
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Shop - Click & Collect Groceries</title>
    <link rel="stylesheet" href="Styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="Styles/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
    <!-- <link rel="stylesheet" href="styles.css"> -->
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
        .btn-primary12 {
            background-color: #ff0303;
            border: none;
        }

        .btn-primary12:hover {
            background-color: #74b72e;
            border: none;
        }
    </style>
</head>

<body>



    <div class="row" style="margin-top:5%;margin-bottom:5%;">



        <div class="col-md-3 ">

        </div>
        <div class="panel-body col-md-7 box">
            <h1> Add shop</h1>

            <br>
            <?php

            if (isset($message)) {
                echo "<div class='alert alert-danger' id='myAlert'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>";
                echo "$message";
                echo "</div>";
            }
            if (isset($success)) {
                echo "<div class='alert alert-success' id='myAlert'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>";
                echo "$success";
                echo "</div>";
            }
            ?>

            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">

                    <label class="control-label"> Shop Name </label>

                    <input type="text" name="SHOP_NAME" class="form-control" required placeholder="Enter shop name ...">


                </div>

                <div class="form-group">
                    <label class=" control-label"> Shop Address </label>


                    <input name="SHOP_ADDRESS" type="text" class="form-control" required placeholder="Enter your address ...">


                </div>

                <div class="form-group">
                    <label class=" control-label"> Shop Contact</label>


                    <input name="SHOP_PHONE" type="text" class="form-control" required placeholder="Enter your phone number...">


                </div>
                <div class="form-group">
                    <label class=" control-label"> Shop Email</label>

                    <input name="SHOP_EMAIL" type="email" class="form-control" required placeholder="Enter your email...">


                </div>
                <div class="form-group">
                    <label class=" control-label"> Shop Image </label>


                    <input name="SHOP_PHOTO" type="file" class="form-control" required>


                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>


                    <input name="add" value="Insert Shop" type="submit" class="btn btn-primary12 form-control">


                </div>

            </form>

        </div>

    </div>


    <?php
    include('footer.php');

    ?>

</body>

</html>
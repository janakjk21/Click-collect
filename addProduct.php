<?php
session_start();

if (!isset($_SESSION['tid'])) {
    header("location:../common/login.php");
    # code...
} else {
    $traderid = $_SESSION['tid'];

    include('./connection.php');




    if (isset($_POST["add"])) {


        $pname = $_POST['PRODUCT_NAME'];
        $pcat = $_POST['CATEGORY'];
        $pprice = $_POST['PRODUCTPRICE'];
        $pquan = $_POST['PRODUCTQUANTITY'];
        $punit = $_POST['PRODUCTUNIT'];
        $minorder = $_POST['MINORDER'];
        $maxorder = $_POST['MAXORDER'];
        $pdes = $_POST['PRODUCTDES'];


        $namevalid = "/^([a-zA-Z' ]+)$/"; //for name validation

        $numbervalid = "/^[0-9]+$/"; //for number validation

        //for product name validation

        $s = "SELECT * FROM PRODUCT WHERE PRODUCT_NAME = '$pname'";
        $p = oci_parse($conn, $s);
        oci_execute($p);
        $c = 0;
        while ($f = oci_fetch_assoc($p)) {
            $c += 1;
        }


        if (isset($_FILES['PRODUCT_PIC1'])) { //if customer select a file
            $target_dir1 = "./assets/img/";
            $filename1 = $_FILES['PRODUCT_PIC1']['name'];
            $target_dir2 = "./assets/img/";
            $filename3 = $_FILES['PRODUCT_PIC2']['name'];
            $target_dir3 = "./assets/img/";
            $filename2 = $_FILES['PRODUCT_PIC3']['name'];



            $target_file1 = $target_dir1 . basename($_FILES["PRODUCT_PIC1"]["name"]);
            $target_file2 = $target_dir2 . basename($_FILES["PRODUCT_PIC2"]["name"]);
            $target_file3 = $target_dir3 . basename($_FILES["PRODUCT_PIC3"]["name"]);

            $imageFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
            $imageFileType = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
            $imageFileType = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));

            //checking the file type
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $errormessage = "Please Select .jpg,.gif,.png File Type Only !!!";
            }




            if (!empty($pname) && !empty($pdes) && !empty($pprice) && !empty($pquan) && !empty($punit) && !empty($minorder) && !empty($maxorder)) {

                if ($c == 0) {
                    if (preg_match($numbervalid, $pquan)) {
                        if (preg_match($numbervalid, $minorder)) {
                            if (preg_match($numbervalid, $maxorder)) {


                                if (move_uploaded_file($_FILES["PRODUCT_PIC1"]["tmp_name"], $target_file1)) {

                                    if (move_uploaded_file($_FILES["PRODUCT_PIC2"]["tmp_name"], $target_file2)) {


                                        if (move_uploaded_file($_FILES["PRODUCT_PIC3"]["tmp_name"], $target_file3)) {




                                            $a = "INSERT INTO PRODUCT (PRODUCT_ID,PRODUCT_PIC1,PRODUCT_PIC2,PRODUCT_PIC3,PRODUCT_NAME,CATEGORY,PRODUCTPRICE,PRODUCTQUANTITY,PRODUCTUNIT,TRADER_ID,MINORDER,MAXORDER,PRODUCTDES) VALUES (PRODUCT_SEQ.nextval,'$filename1','$filename2','$filename3','$pname','$pcat','$pprice','$pquan','$punit','$traderid','$minorder','$maxorder','$pdes')";
                                            $b = oci_parse($conn, $a);
                                            $d = oci_execute($b);

                                            if ($d) {
                                                $success = "Product Added Successfully !!!";
                                                header('location:traderproduct.php');
                                            } else {
                                            }
                                        } else {
                                            echo ("Pic 3 not uploaded");
                                        }
                                    } else {
                                        echo ("Pic 2 not uploaded");
                                    }
                                } else {
                                    echo ("Pic 1 not uploaded");
                                }
                            } else {
                                $message = "Please Enter A Valid Maximum Order !!!";
                            }
                        } else {
                            $message = "Please Enter A Valid Minimum Order !!!";
                        }
                    } else {
                        $message = "Please Enter A Valid Quantity !!!";
                    }
                } else {
                    $message = "Product Name Already Exists !!!";
                }
            } else {
                $message = "Please Fill All Fields !!!";
            }
        } else {

            $message = "Please Select a Valid Image !!";
        }
    } else {
        $message = "Please Select Product Image !!!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".close").click(function() {
                $('#myAlert').alert();

            });

        });
    </script>


    <style>
        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
            margin-bottom: 50px;
        }

        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: #74b72e;
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        .panel-body {
            margin-left: 80px;
            margin-top: 50px;
        }


        .form-control {
            border: 1px solid #74b72e;
            background: white;

        }

        .btn-primary {
            background-color: #74b72e;
            border: none;
        }

        .btn-primary:hover {
            background-color: #74b72e;
            border: none;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <a href="traderaccount.php">My Account</a>
        <a class="active" href="traderproduct.php">Products</a>
        <a href="orderfortrader.php">Reports</a>
        <a href="logout.php">Log Out</a>
    </div>


    <div class="panel-body">

        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-3 control-label"> Product Image 1 </label>

                <div class="col-md-6">
                    <input name="PRODUCT_PIC1" type="file" class="form-control" required>

                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label"> Product Image 2 </label>

                <div class="col-md-6">
                    <input name="PRODUCT_PIC2" type="file" class="form-control">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"> Product Image 3 </label>

                <div class="col-md-6">
                    <input name="PRODUCT_PIC3" type="file" class="form-control form-height-custom">

                </div>
            </div>


            <div class="form-group">

                <label class="col-md-3 control-label"> Product Name </label>

                <div class="col-md-6">
                    <input type="text" name="PRODUCT_NAME" class="form-control" placeholder="Enter product name ...">
                </div>

            </div>

            <div class="form-group">

                <label class="col-md-3 control-label">Product Category </label>


                <div class="col-md-6">


                    <select name="CATEGORY" class="form-control">

                        <option>Bakery</option>
                        <option>Butcher</option>
                        <option>Delicatessen</option>
                        <option>Fishmonger</option>
                        <option>Green Grocery</option>



                    </select>

                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label"> Product Price </label>

                <div class="col-md-6">
                    <input name="PRODUCTPRICE" type="text" class="form-control" required placeholder="Enter price of product ...">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"> Product Quantity</label>

                <div class="col-md-6">
                    <input name="PRODUCTQUANTITY" type="number" class="form-control" required placeholder="Enter product quantity ...">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"> Product Unit </label>

                <div class="col-md-6">
                    <input name="PRODUCTUNIT" type="text" class="form-control" required placeholder="Eg:pound,kilo,etc ...">

                </div>
            </div>




            <div class="form-group">
                <label class="col-md-3 control-label"> Minimum Order </label>

                <div class="col-md-6">
                    <input name="MINORDER" type="number" class="form-control" required placeholder="Enter minimum order of product...">

                </div>
            </div>




            <div class="form-group">
                <label class="col-md-3 control-label">Maximum Order </label>

                <div class="col-md-6">
                    <input name="MAXORDER" type="number" class="form-control" required placeholder="Enter maximum order of product...">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"> Product Desc </label>

                <div class="col-md-6">
                    <textarea name="PRODUCTDES" cols="19" rows="6" class="form-control"></textarea>

                </div>
            </div>



            <div class="form-group">
                <label class="col-md-3 control-label"></label>

                <div class="col-md-6">
                    <input name="add" value="Insert Product" type="submit" class="btn btn-primary form-control">

                </div>
            </div>

        </form>

    </div>

    </div>

    </div>
    </div>

</body>

</html>
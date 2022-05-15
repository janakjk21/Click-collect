<?php
include './connection.php';



if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    $we = "SELECT * FROM PRODUCT WHERE PRODUCTID=$pid";
    $em = oci_parse($conn, $we);
    oci_execute($em);
    $c = 0;
    while ($f = oci_fetch_assoc($em)) {
        $c += 1;
    }


    if (isset($_POST["update"])) {



        $pname = $_POST['PRODUCT_NAME'];
        $pcat = $_POST['CATEGORY'];
        $pprice = $_POST['PRODUCTPRICE'];
        $pquan = $_POST['PRODUCTQUANTITY'];
        $punit = $_POST['PRODUCTUNIT'];
        $minorder = $_POST['MINORDER'];
        $maxorder = $_POST['MAXORDER'];
        $pdes = $_POST['PRODUCTDES'];

        if (isset($_FILES['PRODUCT_PIC1'])) { //if customer select a file
            $target_dir1 = "products/";
            $filename1 = $_FILES['PRODUCT_PIC1']['name'];
            $target_dir2 = "products/";
            $filename3 = $_FILES['PRODUCT_PIC2']['name'];
            $target_dir3 = "products/";
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
                                                $a = "UPDATE PRODUCT SET  PRODUCTNAME= '$pname', PRODUCTDES='$pdes', PRODUCTPRICE='$pprice', PRODUCTQUANTITY='$pquan',PRODUCTUNIT='$punit',MAXORDER='$maxorder',MINORDER='$minorder' WHERE PRODUCTID = $pid";

                                                $b = oci_parse($conn, $a);
                                                $d = oci_execute($b);

                                                if ($d) {
                                                    $success = "Product Updated Successfully !!!";
                                                    header('location:traderproduct.php');
                                                }
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
    <title>Update Product</title>
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
        .ui ::-webkit-input-placeholder {
            /* Chrome/Opera/Safari */

            opacity: 0.8;
        }

        .ui {
            background-color: white;
            padding: 30px;
            margin-top: 30px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #ff5300;

        }

        .ui h1 {
            color: #ff5300;
        }

        .ui label {
            color: black;
        }

        .form-control {
            border: 1px solid #ff5300;
            background: white;
        }

        .btn-primary {
            background-color: #ff5300;
            border: none;
        }

        .btn-primary:hover {
            background-color: #ff5300;
            border: none;
        }

        img {
            width: 200px;
            height: 160px;
        }
    </style>
</head>

<body>
    <div class="panel-body">

        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <label>Product Picture</label>
                <br>
                <?php echo "<img src=products/" . $c['PRODUCT_PIC1'] . ">"; ?>
                <br><br>
                <div class="col-md-6">
                    <<input name="PRODUCT_PIC1" type="file" class="form-control" required>

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
<?php
$active = 'Home';
include('connection.php');

if (isset($_POST["register"])) {
    $name = $_POST['NAME'];
    $address = $_POST['CUSTOMER_ADDRESS'];
    $phone = $_POST['CUSTOMER_PHONE'];
    $email = $_POST['CUSTOMER_EMAIL'];
    $pass = $_POST['PASSWORD'];
    $repass = $_POST['CUSTOMER_REPASSWORD'];

    if (isset($_FILES['PROFILEPIC'])) { //if customer select a file
        $target_dir = "./assets/img/customer profile pic/";
        $filename = $_FILES['PROFILEPIC']['name'];
        $target_file = $target_dir . basename($_FILES["PROFILEPIC"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        //checking the file type
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        $namevalid = "/^([a-zA-Z' ]+)$/"; //for name validation
        $numbervalid = "/^[0-9]+$/"; //for number validation
        //to validate username
        $abc = "SELECT * FROM CUSTOMER WHERE NAME = '$name'";
        $bcd = oci_parse($conn, $abc);
        oci_execute($bcd);
        $cde = 0;
        while ($def = oci_fetch_assoc($bcd)) {
            $cde += 1;
        }
        //for email validation
        $query = "SELECT * FROM CUSTOMER WHERE CUSTOMER_EMAIL = '$email'";
        $nop = oci_parse($conn, $query);
        oci_execute($nop);
        $opq = 0;
        while ($pqr = oci_fetch_assoc($nop)) {
            $opq += 1;
        }
        if (!empty($name) && !empty($email) && !empty($phone) && !empty($address) && !empty($pass) && !empty($repass)) {
            if (preg_match($namevalid, $name)) {
                if ($opq == 0) {
                    if (preg_match($numbervalid, $phone)) {
                        if (strlen($phone) == 10) {
                            if (strlen($pass) > 8) {
                                if ($pass == $repass) {
                                    if (isset($_POST['check'])) {
                                        // Check if $uploadOk is set to 0 by an error
                                        if ($uploadOk == 0) {
                                            echo "Sorry, your file was not uploaded.";
                                            // if everything is ok, try to upload file
                                        } else {
                                            if (move_uploaded_file($_FILES["PROFILEPIC"]["tmp_name"], $target_file)) {
                                                echo "<script>alert('Your profile has been updated')</script>";
                                                echo "The file " . basename($_FILES["PROFILEPIC"]["name"]) . " has been uploaded.";
                                            } else {
                                                echo "Sorry, there was an error uploading your file.";
                                            }
                                        }
                                        $pass = md5($pass);
                                        $query_str = "INSERT INTO CUSTOMER (CUSTOMER_ID,NAME,CUSTOMER_ADDRESS ,CUSTOMER_PHONE, CUSTOMER_EMAIL ,PASSWORD, CUSTOMER_REPASSWORD,PROFILEPIC, CUSTOMER_STAT) VALUES (CUSTOMER_SEQ.nextval,'$name','$address','$phone','$email','$pass','$repass','$filename',0)";
                                        $stid = oci_parse($conn, $query_str);

                                        $e = oci_execute($stid);
                                        if ($e) {
                                            $to      = $email; // Send email to our user
                                            $subject = 'Signup | Comfirmation'; // Give the email a subject 
                                            $message = 'Thanks for being member of Click & Collect Groceries. Your account has been activated, you can now login to your  account with the following Detais:
                                                     -----------------------------------------
                                                     User Type: Customer
                                                     Username: ' . $name . '
                                                     Password: ' . $repass . '
                                                     -----------------------------------------
                                                     Click the link below to login to your account 
                                                     http://localhost/Click-collect/login.php  
                                                     '; // Our message above including the link
                                            $headers = 'From:Click & Collect Groceries' . "\r\n"; // Set from headers
                                            $c = mail($to, $subject, $message, $headers); // Send our email
                                            if ($c) {
                                                $success = "A Customer Account Confirmation Message Has Been Sent,Please Check Your Email.";
                                            } else {
                                                $errormessage = "Sorry, We have a problem uploading you details !!!";
                                            }
                                        } else {
                                            echo "string";
                                        }
                                    } else {
                                        $errormessage = "You Must Agree Cleckdiced Terms And Conditions !!!";
                                    }
                                } else {
                                    $errormessage = "Password Does not Match !!!";
                                }
                            } else {
                                $errormessage = "Password Must Be Minimum 8 characters Long !!!";
                            }
                        } else {
                            $errormessage = "Phone Number Shoud Have 10 Digits !!!";
                        }
                    } else {
                        $errormessage = "Invalid Phone Number !!!";
                    }
                } else {
                    $errormessage = "This Email Already Has An Account !!!";
                }
            } else {
                $errormessage = "Username Already Taken. Please Try With Another !!!";
            }
        } else {
            $errormessage = "Please Fill All Fields !!!";
        }
    } else {
        $errormessage = "Please Select Your Profile Picture !!!";
    }
}
// else
// {
//     echo "error";
// }





?>
<?php include 'navbar.php' ?>
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
        box-shadow: 0px 0px 10px 0px #74b72e;

    }

    .ui h1 {
        color: #f30707;
    }

    .ui label {
        color: #3e424b;
    }

    .form-control {
        border: 1px solid #74b72e;
        background: white;
    }

    .btn-primary1 {
        background-color: #ff2e2e;
        border: none;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="ui" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                <h1 class="text-center">Customer Sign-Up Form</h1>
                <br>
                <?php

                if (isset($errormessage)) {
                    echo "<div class='alert alert-danger' id='myAlert'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>";
                    echo "$errormessage";
                    echo "</div>";
                }
                if (isset($success)) {
                    echo "<div class='alert alert-success' id='myAlert'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>";
                    echo "$success";
                    echo "</div>";
                }
                ?>

                <form action="register.php" class="form-group text-center" method="POST" enctype="multipart/form-data">

                    <label>Name</label>
                    <input type="text" name="NAME" class="form-control" placeholder="  Enter your name">
                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Password</label>
                            <input type="password" name="PASSWORD" class="form-control" placeholder="  Enter New Password">

                        </div>
                        <div class="col-md-6">
                            <label>Re-type Password</label>
                            <input type="password" name="CUSTOMER_REPASSWORD" class="form-control" placeholder="  Re-type New Password">
                        </div>

                    </div>
                    <br>

                    <label>E-mail</label>
                    <input type="email" name="CUSTOMER_EMAIL" class="form-control" placeholder="  Enter your E-mail Address">
                    <br>
                    <label>Phone Number</label>
                    <input type="text" name="CUSTOMER_PHONE" class="form-control" placeholder="  Enter your Phone Number">
                    <br>
                    <label>Address</label>
                    <input type="text" name="CUSTOMER_ADDRESS" class="form-control" placeholder="  Enter your Address">
                    <br>
                    <label>Profile Picture</label>
                    <input type="file" name="PROFILEPIC" class="form-control">
                    <br>
                    <label><input type="checkbox" name="check" value=""> I Accept the <a href="termscondition.php" style="color:#ff0404;">Terms And Conditions</a></label>
                    <br>
                    <br>
                    <input type="submit" name="register" value="Sign Up" class="btn btn-primary1 btn-block btn-lg">
                </form>

            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
<?php include 'footer.php'; ?>

</body>

</html>
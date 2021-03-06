<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['NAME'])) {
    header("Location: index.php");
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" referrerpolicy="no-referrer" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Customer Profile - Click & Collect Groceries</title>
</head>

<body>

    <?php
    include "./connection.php";

    $customerid = $_SESSION['cid'];
    $sql = "SELECT * FROM CUSTOMER WHERE CUSTOMER_ID='$customerid' ";
    $query = oci_parse($conn, $sql);
    oci_execute($query);
    $email_pass = oci_fetch_assoc($query);
    $customer_name = $email_pass['NAME'];
    $phone = $email_pass['CUSTOMER_PHONE'];
    $email = $email_pass['CUSTOMER_EMAIL'];
    $address = $email_pass['CUSTOMER_ADDRESS'];
    $image = $email_pass['PROFILEPIC'];

    ?>


    <div id="navbar">
        <?php
        include "navbar.php";
        ?>
    </div>

    <div class="customer-profile" style="margin:5%;">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php" class="change-clr">Click & Collect Groceries</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Customer Account</li>
                        </ol>
                    </nav>

                    <div class="row">
                        <!-- right side user setting -->
                        <div class="col-lg-3 col-md-4  ">
                            <div class="right-side-nav">
                                <div class="row" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                                    <nav class="nav d-block pl-4">
                                        <a data-toggle="tab" class="nav-link active" href="#profile"><i class="fas fa-user"></i><span>Profile</span> </a>
                                        <a data-toggle="tab" class="nav-link" href="#updateProfile"><i class="fas fa-user-edit"></i><span>Update Profile</span> </a>
                                        <a data-toggle="tab" class="nav-link" href="#changePassword"><i class="fas fa-key"></i><span>Change
                                                Password</span> </a>
                                        <a class="nav-link" href="./invoice.php"><i class="fas fa-receipt"></i></i><span>Invoice</span> </a>
                                        <a data-toggle="tab" class="nav-link" href="#deleteAccount"><i class="fas fa-trash-alt"></i><span>Delete Account</span> </a>
                                        <a data-toggle="tab" class="nav-link" href="#logout"><i class="fas fa-sign-out-alt"></i><span>Logout</span> </a>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8">
                            <div class="card-body tab-content border " style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">

                                <!-- Customer profile -->
                                <div class="tab-pane active" id="profile">
                                    <h6>MY PROFILE</h6>
                                    <div class="text-center">
                                        <img class="img-fluid rounded-circle mt-5 mb-2" height="120px" width="120px" src="./assets/img/customer profile pic/<?php echo $image ?>" alt="customer pic">
                                        <p>Name: <?php echo $customer_name ?> </p>
                                        <p>Email: <?php echo $email ?></p>
                                        <p>Phone Number: <?php echo $phone ?> </p>
                                        <p>Address: <?php echo $address ?> </p>
                                    </div>
                                </div>
                                <!-- Customer profile Ends-->


                                <!-- Update profile -->
                                <div class="tab-pane update-profile" id="updateProfile">
                                    <h6>Update Profile</h6>
                                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                                        <input class="form-control form-control-sm mb-2" name="username" value=<?php echo $customer_name ?> type="text" placeholder="Name">
                                        <input class="form-control form-control-sm mb-2" name="email_id" value=<?php echo $email ?> type="text" placeholder="Email">
                                        <input class="form-control form-control-sm mb-2" name="phone_no" value=<?php echo $phone ?> type="text" placeholder="Phone Number">
                                        <input class="form-control form-control-sm mb-2" name="address" value=<?php echo $address ?> type="text" placeholder="Address">
                                        <input type="file" name="image" class="form-control-file mb-2 upload-image" />
                                        <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Update Account">
                                    </form>
                                </div>

                                <?php
                                if (isset($_POST['submit'])) {

                                    $username = $_POST['username'];
                                    $email = $_POST['email_id'];
                                    $mobile = $_POST['phone_no'];
                                    $addr = $_POST['address'];


                                    $customersql = "SELECT CUSTOMER_ID FROM CUSTOMER WHERE NAME = '$customer_name' ";
                                    $customer_query = oci_parse($conn, $customersql);
                                    oci_execute($customer_query);
                                    $customer_id = oci_fetch_assoc($customer_query);
                                    $id = $customer_id['CUSTOMER_ID'];

                                    if ($_FILES['image']['name'] != "") {
                                        $file_name = $_FILES['image']['name'];
                                        $temp_name = $_FILES['image']['tmp_name'];
                                        move_uploaded_file($temp_name, "./assets/images/customer profile pic/" . $file_name);

                                        $emailquery = "UPDATE CUSTOMER SET NAME='$username', CUSTOMER_EMAIL='$email',
                                                    CUSTOMER_ADDRESS='$addr', CUSTOMER_PHONE='$mobile', PROFILEPIC='$file_name' WHERE CUSTOMER_ID = $id ";
                                    } else {
                                        $emailquery = "UPDATE CUSTOMER SET NAME='$username', CUSTOMER_EMAIL='$email',
                                                CUSTOMER_ADDRESS='$addr', CUSTOMER_PHONE='$mobile' WHERE CUSTOMER_ID = $id ";
                                    }

                                    $query = oci_parse($conn, $emailquery) or die("Record not updated");
                                    oci_execute($query);

                                    if ($query) {
                                        echo ("<meta http-equiv='refresh' content='0'>");
                                    }
                                }
                                ?>
                                <!-- Update profile Ends-->


                                <!-- Change Password-->
                                <div class="tab-pane changePasswordForm" id="changePassword">
                                    <h6>Change Password</h6>
                                    <form id="changePassword2" method="POST">
                                        <input class="form-control form-control-sm mb-2 oldpass" name="oldPass" type="password" placeholder="Old Password" reqiured>
                                        <input class="form-control form-control-sm mb-2 newPass1" name="newPass1" type="password" placeholder="New Password" reqiured>
                                        <input class="form-control form-control-sm mb-2 newPass2" name="newPass2" type="password" placeholder="Re-enter New Password" reqiured>
                                        <input type="submit" name="changePassword1" class="btn btn-primary btn-sm" value="Change Password">
                                    </form>
                                </div>

                                <?php
                                if (isset($_POST['changePassword1'])) {

                                    $old_password = $_POST['oldPass'];
                                    $new_password1 = $_POST['newPass1'];
                                    $new_password2 = $_POST['newPass2'];


                                    $passwordsql = "SELECT CUSTOMER_ID FROM CUSTOMER WHERE NAME = '$customer_name' ";
                                    $password_query = oci_parse($conn, $passwordsql);
                                    oci_execute($password_query);
                                    $customer_id = oci_fetch_assoc($password_query);
                                    $id = $customer_id['CUSTOMER_ID'];

                                    $new_password1 = md5($new_password1);
                                    $passwordquery = "UPDATE CUSTOMER SET PASSWORD='$new_password1', CUSTOMER_REPASSWORD='$new_password2' WHERE CUSTOMER_ID = $id ";

                                    $query2 = oci_parse($conn, $passwordquery) or die("Record not updated");
                                    oci_execute($query2);

                                    if ($query2) {
                                        echo ("<meta http-equiv='refresh' content='0'>");
                                    }
                                }

                                ?>


                                <!-- Delete Account -->
                                <div class="tab-pane" id="deleteAccount">
                                    <h6>Delete Account</h6>
                                    <p>Are you sure you want to delete this account</p>
                                    <form action="deleteAccount.php" method="POST">
                                        <input type="submit" name="delete" class="btn btn-danger btn-sm" value="Delete Account" />
                                    </form>
                                </div>
                                <!-- Delete Account Ends-->

                                <!-- Logout -->
                                <div class="tab-pane" id="logout">
                                    <h6>Logout</h6>
                                    <p>Are you sure you want to logout of your account</p>
                                    <a class="btn btn-outline-dark btn-sm" href="logout.php"> Logout</a>
                                </div>
                                <!-- Logout Ends-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <?php include "./script.php" ?>


    <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>


    <script>
        $('a[data-toggle="tab"]').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        });

        $('a[data-toggle="tab"]').on("shown.bs.tab", function(e) {
            var id = $(e.target).attr("href");
            sessionStorage.setItem('selectedTab', id)
        });

        var selectedTab = sessionStorage.getItem('selectedTab');
        if (selectedTab != null) {
            $('a[data-toggle="tab"][href="' + selectedTab + '"]').tab('show');
        };
    </script>

</body>

</html>
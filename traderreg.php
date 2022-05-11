<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_error_handler("var_dump");

    $active='Home';
    session_start();
    include('connection.php');
    if (isset($_POST["register"]))
    {
    $ttype = $_POST['TRADER_TYPE'];
    $tname = $_POST['NAME'];
    $location = $_POST['TRADER_ADDRESS'];
    $tphone = $_POST['TRADER_PHONE'];
    $temail = $_POST['TRADER_EMAIL'];
    $tpassword = $_POST['PASSWORD'];
    $trepassword = $_POST['TRADER_REPASSWORD'];
    $tcat = $_POST['CATEGORY'];

        if(isset($_FILES['TRADER_PROFILE']))
        {//if customer select a file
            $target_dir = "traprofile/";
            $filename = $_FILES['TRADER_PROFILE']['name'];
            $target_file = $target_dir . basename($_FILES["TRADER_PROFILE"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) 
            {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            //checking the file type
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) 
            {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            $namevalid = "/^([a-zA-Z' ]+)$/";//for name validation
            $numbervalid = "/^[0-9]+$/";//for number validation
            //to validate username
            $abc = "SELECT * FROM TRADER WHERE NAME = '$tname'";
            $bcd = oci_parse($connection,$abc);
            oci_execute($bcd);
            $cde = 0;
            while($def = oci_fetch_assoc($bcd))
            {
                $cde+=1;
            }
            //for email validation
            $mno = "SELECT * FROM TRADER WHERE TRADER_EMAIL = '$temail'";
            $nop = oci_parse($connection,$mno);
            oci_execute($nop);
            $opq = 0;
            while($pqr = oci_fetch_assoc($nop))
            {
                $opq+=1;
            }
            if(!empty($tname) && !empty($temail) && !empty($tphone) && !empty($location) && !empty($tpassword) && !empty($trepassword))
            {
                if(preg_match($namevalid,$tname))
                {
                    if($opq==0)
                    {
                        if(preg_match($numbervalid,$tphone))
                        {
                            if(strlen($tphone) == 10)
                            {
                                if(strlen($tpassword)>8)
                                {
                                    if($tpassword == $trepassword)
                                    {
                                        if (isset($_POST['check']))
                                        {
                                            // Check if $uploadOk is set to 0 by an error
                                            if ($uploadOk == 0) 
                                            {
                                              echo "Sorry, your file was not uploaded.";
                                            // if everything is ok, try to upload file
                                            } 
                                            else 
                                            {

                                              if (move_uploaded_file($_FILES["TRADER_PROFILE"]["tmp_name"], $target_dir)) 
                                              {
                                                echo "The file ". basename( $_FILES["TRADER_PROFILE"]["name"]). " has been uploaded.";
                                              }
                                              else 
                                              {
                                                  
                                                echo "Sorry, there was an error uploading your file.";
                                              }
                                            }
                                                $tpassword=md5($tpassword);
                                            $query = "INSERT INTO TRADER (TRADER_ID,TRADER_TYPE,NAME,TRADER_ADDRESS,TRADER_PHONE,TRADER_EMAIL,PASSWORD,TRADER_REPASSWORD,TRADER_STAT,CATEGORY,TRADER_PROFILE) VALUES (TRADER_SEQ.nextval,'$ttype','$tname','$location','$tphone','$temail','$tpassword','$trepassword',1,'$tcat','$filename')";
 
                                            $std = oci_parse($connection,$query);  

                                            $e = oci_execute($std);
                                            if($e){
                                                $to      = $temail; // Send email to our user
                                                $subject = 'Signup | Comfirmation'; // Give the email a subject 
                                                $message = 'Thanks for being member of Cleckdiced. Your account has been activated, you can now login to your  account with the following Detais:
                                                     -----------------------------------------
                                                     User Type: Trader
                                                     Username: '.$tname.'
                                                     Password: '.$trepassword.'
                                                     -----------------------------------------
                                                     Click the link below to login to your account 
                                                     http://localhost/projectmanagement/common/login.php  
                                                     '; // Our message above including the link
                                                $headers = 'From: cleckdiced@gmail.com' . "\r\n"; // Set from headers
                                                $c = mail($to, $subject, $message, $headers); // Send our email
                                                echo $c;
                                                if($c){
                                                    
                                                    $success = "A Trader Account Confirmation Message Has Been Sent,Please Check Your Email.";
                                                }
                                            else
                                            {
                                                var_dump(error_get_last()['meesage']);
                                    
                                               
                                            }
                                              }
                                                else
                                                {
                                                    echo "string";
                                                }
                                        }
                                        else
                                        {
                                            $errormessage="You Must Agree cleckdiced Terms And Conditions !!!";
                                        }
                                    }
                                    else
                                    {
                                        $errormessage="Password Does not Match !!!";
                                    }
                                }
                                else
                                {
                                    $errormessage="Password Must Be Minimum 8 characters Long !!!";
                                }
                            }
                            else
                            {
                                $errormessage="Phone Number Shoud Have 10 Digits !!!";
                            }
                        }
                        else
                        {
                            $errormessage="Invalid Phone Number !!!";
                        }
                    }
                    else
                    {
                        $errormessage="This Email Already Has An Account !!!";
                    }
                }
                else
                {
                    $errormessage="Username Already Taken. Please Try With Another !!!";
                }
            }
            else
            {
            $errormessage="Please Fill All Fields !!!";
            }
        }
        else
        {
            $errormessage="Please Select Your Profile Picture !!!";
        }
    }
    // else
    // {
    //     echo "error";
    // }





?>
<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Trader Registration - Click & Collect Groceries</title>
<link rel="stylesheet" href="Styles/bootstrap-337.min.css">
<link rel="stylesheet" href="Styles/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style1.css">
<!-- <link rel="stylesheet" href="styles.css"> -->
<link rel="stylesheet" href="style.css">

<script type="text/javascript">
$(document).ready(function(){
    $(".close").click(function(){
        $('#myAlert').alert();
        
    });

});
</script>


<style>
    .ui ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  
  opacity: 0.8;
}
    .ui{
        background-color: white;
        padding: 30px;
        margin-top: 30px;
        margin-bottom: 30px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px #74b72e;
        
    }
    .ui h1{
        color:#e30a0a;
    }
    .ui label{
        color: #3e424b;
    }

    .form-control{
    border:1px solid #74b72e;
    background: white;
}

.btn-primary{
    background-color:#e30a0a;
    border:none;
}
.btn-primary:hover{
    background-color:#74b72e;
    border:none;
}
.navbar{
    background-color : #000000;
}
.navbar-collapse .right{
    float: right;
}
.navbar-brand{
    float: left;
    padding: 10px 15px;
    font-size: 18px;
    line-height: 20px;
    height: 70px;
}
.navbar-brand:hover,
.navbar-brand:focus{
    text-decoration: none;
}
.navbar ul.nav > li > a{
    text-transform: uppercase;
    font-weight: bold;
    font-size: 14px;
}
.navbar ul.nav > li > a:hover{
    background: #e7e7e7;
}
.padding-nav{
    padding-top: 10px;
}
.btn-primary{
    background: #e30a0a;
    
}
#search .navbar-form{
    float: right;
}
#search{
    clear: both;
    border-top: solid 1px #74b72e;
    text-align: right;
}
#search .navbar-form .input-group{
    display: table;
}
#search .navbar-form .input-group .form-control{
    width: 100%;
}
#slider{
    margin-bottom: 40px;
}
 
</style>

</head>
<body>
   <?php
  if(isset($_SESSION['cid']))
{ $customerid=$_SESSION['cid'];
?>  
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       <div class="container"><!-- container Begin -->
           <div class="navbar-header"><!-- navbar-header Begin -->
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   <img src="logo.png" alt="" style="width: 110px; height:50px;">
                   <!-- <img src="hungerWW.png" alt="Logo Mobile" class="visible-xs"> -->
               </a><!-- navbar-brand home Finish -->
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   <span class="sr-only">Toggle Navigation</span>
                   <i class="fa fa-align-justify"></i>
               </button>
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   <span class="sr-only">Toggle Search</span>
                   <i class="fa fa-search"></i>
               </button>
           </div><!-- navbar-header Finish -->
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               <div class="padding-nav"><!-- padding-nav Begin -->
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php">Home</a>
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                           <a href="shop.php">Shop</a>
                       </li>
                       <li class="<?php if($active=='Account') echo"active"; ?>">
                           
                           <a href="customerview.php">My Account</a>
                       </li>
                       <li class="<?php if($active=='Cart') echo"active"; ?>">
                           <a href="cart.php">Shopping Cart</a>
                       </li>
                       <li class="<?php if($active=='Contact') echo"active"; ?>">
                           <a href="contact1.php">Contact Us</a>
                       </li>
                   </ul><!-- nav navbar-nav left Finish -->
               </div><!-- padding-nav Finish -->
               
               <a href="customerview.php" class="btn navbar-btn btn-primary right">
                   
                      <?php
                       
                   
                       echo "Welcome: " . $_SESSION['NAME'] . "";
                       
                   
                   
                   ?>
               
               </a>
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   <i class="fa fa-shopping-cart"></i>
                   <span>Cart</span>
               </a><!-- btn navbar-btn btn-primary Finish -->
              
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       <span class="sr-only">Toggle Search</span>
                       <i class="fa fa-search"></i>
                   </button><!-- btn btn-primary navbar-btn Finish -->
               </div><!-- navbar-collapse collapse right Finish -->
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       <div class="input-group"><!-- input-group Begin -->
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               <i class="fa fa-search"></i>
                           </button><!-- btn btn-primary Finish -->
                           </span><!-- input-group-btn Finish -->
                       </div><!-- input-group Finish -->
                   </form><!-- navbar-form Finish -->
               </div><!-- collapse clearfix Finish -->
           </div><!-- navbar-collapse collapse Finish -->
       </div><!-- container Finish -->
   </div><!-- navbar navbar-default Finish -->
   <?php 
 }
 elseif(isset($_SESSION['tid']))
{ $traderid=$_SESSION['tid'];
?> 
 <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       <div class="container"><!-- container Begin -->
           <div class="navbar-header"><!-- navbar-header Begin -->
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   <img src="logo.png" alt="" style="width: 110px; height:50px;">
                   <!-- <img src="hungerWW.png" alt="Logo Mobile" class="visible-xs"> -->
               </a><!-- navbar-brand home Finish -->
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   <span class="sr-only">Toggle Navigation</span>
                   <i class="fa fa-align-justify"></i>
               </button>
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   <span class="sr-only">Toggle Search</span>
                   <i class="fa fa-search"></i>
               </button>
           </div><!-- navbar-header Finish -->
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               <div class="padding-nav"><!-- padding-nav Begin -->
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php">Home</a>
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                           <a href="shop.php">Shop</a>
                       </li>
                       <li class="<?php if($active=='Account') echo"active"; ?>">
                           
                           <a href="traderprofile.php">My Account</a>
                       </li>
                       <li class="<?php if($active=='Cart') echo"active"; ?>">
                           <a href="login.php">Shopping Cart</a>
                       </li>
                       <li class="<?php if($active=='Contact') echo"active"; ?>">
                           <a href="contact1.php">Contact Us</a>
                       </li>
                   </ul><!-- nav navbar-nav left Finish -->
               </div><!-- padding-nav Finish -->
               
               <a href="traderprofile.php" class="btn navbar-btn btn-primary right">
                   
                      <?php
                       
                   
                       echo "Welcome: " . $_SESSION['NAME'] . "";
                       
                   
                   
                   ?>
               
               </a>
               <a href="login.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   <i class="fa fa-shopping-cart"></i>
                   <span>Cart</span>
               </a><!-- btn navbar-btn btn-primary Finish -->
              
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       <span class="sr-only">Toggle Search</span>
                       <i class="fa fa-search"></i>
                   </button><!-- btn btn-primary navbar-btn Finish -->
               </div><!-- navbar-collapse collapse right Finish -->
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       <div class="input-group"><!-- input-group Begin -->
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               <i class="fa fa-search"></i>
                           </button><!-- btn btn-primary Finish -->
                           </span><!-- input-group-btn Finish -->
                       </div><!-- input-group Finish -->
                   </form><!-- navbar-form Finish -->
               </div><!-- collapse clearfix Finish -->
           </div><!-- navbar-collapse collapse Finish -->
       </div><!-- container Finish -->
   </div><!-- navbar navbar-default Finish -->
   <?php
 }
 else{
  ?>
  <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       <div class="container"><!-- container Begin -->
           <div class="navbar-header"><!-- navbar-header Begin -->
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   <img src="logo.png" alt="" style="width: 110px; height:50px;">
                   <!-- <img src="hungerWW.png" alt="Logo Mobile" class="visible-xs"> -->
               </a><!-- navbar-brand home Finish -->
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   <span class="sr-only">Toggle Navigation</span>
                   <i class="fa fa-align-justify"></i>
               </button>
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   <span class="sr-only">Toggle Search</span>
                   <i class="fa fa-search"></i>
               </button>
           </div><!-- navbar-header Finish -->
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               <div class="padding-nav"><!-- padding-nav Begin -->
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php">Home</a>
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                           <a href="shop.php">Shop</a>
                       </li>
                       <li class="<?php if($active=='Account') echo"active"; ?>">
                           
                           <a href="login.php">My Account</a>
                       </li>
                       <li class="<?php if($active=='Cart') echo"active"; ?>">
                           <a href="cart.php">Shopping Cart</a>
                       </li>
                       <li class="<?php if($active=='Contact') echo"active"; ?>">
                           <a href="contact1.php">Contact Us</a>
                       </li>
                   </ul><!-- nav navbar-nav left Finish -->
               </div><!-- padding-nav Finish -->
               
               <a href="customerview.php" class="btn navbar-btn btn-primary right">
                   
                   <?php 
                       echo "Welcome: Guest";
                   
                   ?>
               
               </a>
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   <i class="fa fa-shopping-cart"></i>
                   <span>Cart</span>
               </a><!-- btn navbar-btn btn-primary Finish -->
              
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       <span class="sr-only">Toggle Search</span>
                       <i class="fa fa-search"></i>
                   </button><!-- btn btn-primary navbar-btn Finish -->
               </div><!-- navbar-collapse collapse right Finish -->
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       <div class="input-group"><!-- input-group Begin -->
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               <i class="fa fa-search"></i>
                           </button><!-- btn btn-primary Finish -->
                           </span><!-- input-group-btn Finish -->
                       </div><!-- input-group Finish -->
                   </form><!-- navbar-form Finish -->
               </div><!-- collapse clearfix Finish -->
           </div><!-- navbar-collapse collapse Finish -->
       </div><!-- container Finish -->
   </div><!-- navbar navbar-default Finish -->
   <?php } ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="ui">
                    <h1 class="text-center">Trader Sign-Up Form</h1>
                    <br>
                        <?php

                        if(isset($errormessage)){
                            echo"<div class='alert alert-danger' id='myAlert'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>";
                            echo "$errormessage";
                            echo "</div>";
                        }
                        if(isset($success)){
                            echo"<div class='alert alert-success' id='myAlert'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>";
                            echo "$success";
                            echo "</div>";
                        }
                        ?>
                    
                    <form action="traderreg.php" class="form-group" enctype="multipart/form-data" method="POST">

                        <label>Account Type</label>
                        <br>
                        
                        <label class="radio-inline"><input type="radio" name="TRADER_TYPE" value="Individual" checked>Individual</label>
                        <label class="radio-inline"><input type="radio" name="TRADER_TYPE" value="Co-operate">Co-operate</label>
                        <br>
                        <br>
                        
                        <label>Trader Name</label>
                        <input type="text" name="NAME" class="form-control" placeholder="  Enter your name"> 
                        <br>
                        <label>Address Line</label>
                        <input type="text" name="TRADER_ADDRESS" class="form-control" placeholder="  Enter your Location">
                        <br>
                         <label>Phone Number</label>
                        <input type="" name="TRADER_PHONE" class="form-control" placeholder="  Enter your Phone Number">
                        <br>
                        <label>Trader Email</label>
                        <input type="email" name="TRADER_EMAIL" class="form-control" placeholder="  Enter your Email">
                        <br>
                       
                        <label>Shop Category</label>
                        <input type="" name="CATEGORY" class="form-control" placeholder="  Enter your Shop Category">
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Password</label>
                                <input type="password" name="PASSWORD" class="form-control" placeholder="  Enter New Password ">
    
                            </div>
                            <div class="col-md-6">
                                <label>Re-type Password</label>
                                <input type="password" name="TRADER_REPASSWORD" class="form-control" placeholder="  Re-type again">
                            </div>
                            
                        </div>
                        <br>
                        <label>Profile Picture</label>
                        <input type="file" name="TRADER_PROFILE" class="form-control" >
                        <br>
                        <label><input type="checkbox" name="check" value=""> I Accept All <a href="termscondition.php" style="color:#e30a0a;">Terms And Conditions</a></label>
                        <br>
                        <br>
                        <input type="submit" name="register" value="Sign Up" class="btn btn-primary btn-block btn-lg">
                    </form>

                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>


    <?php include 'footer.php'; ?>



    
</body>
</html>
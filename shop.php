<?php
session_start();
$active='Shop';
include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>CLeckDiced</title>
<link rel="stylesheet" href="Styles/bootstrap-337.min.css">
<link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>   
  .columnbox
{       
      padding: 50px;
      border: 2px solid #74b72e;
      border-radius: 2px;
      margin-top:10px;
      text-align: left;
      box-shadow: 0% 2px #74b72e;

}

.box1 {
  background-color: lightgrey ;
  width: 350px;
  border: 3px solid #74b72e;
  padding: 7px;
  margin: 9px;
}

.box-offer {
  background-color: gray;
  width: 350px;
  border: 3px solid #74b72e;
  padding: 7px;
  margin: 9px;
}
.box1-offer {
  background-color: lightgrey ;
  width: 350px;
  border: 3px solid #74b72e;
  padding: 7px;
  margin: 9px;
}

.shopbuttons .btn{
  width: 100%;
  border: 3px solid #74b72e;
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
    background: #ed0651;
    
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
#content .productshop{
    background: #ffffff;
    border: 3px solid #74b72e;
    margin-bottom: 30px;
    box-sizing: border-box;
  
}
#content .productshop .text{
    padding: 10px 10px 0px;
}
#content .productshop .text p.price{
    font-size: 18px;
    text-align: center;
    font-weight: 400;
}
#content .productshop .text .button{
    text-align: center;
    clear: both;
}
#content .productshop .text .button .btn{
    margin-bottom: 10px;
}
#content .productshop .text h3{
    text-align: center;
    font-size: 20px;
}
#content .productshop .text h3 a{
    color: rgb(85, 85, 85);
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
     <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
       <div class="col-md-3"><!--col-md-3 begin-->
          <div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title" style="padding-left: 70px; font-size: 25px; font-family: 'Comic Sans MS', cursive, sans-serif">OFFER</h3>
    </div><!-- panel-heading Finish -->
    
    <div class="panel-body"><!-- panel-body Begin -->
      <img src="banner_meat.jpg" style=" height: 100%; width: 100%;" >
    </div><!-- panel-body Finish -->
    
</div><!-- panel panel-default sidebar-menu Finish -->
<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title" style="padding-left: 70px; font-size: 25px; font-family: 'Comic Sans MS', cursive, sans-serif">OFFER</h3>
    </div><!-- panel-heading Finish -->
    
    <div class="panel-body"><!-- panel-body Begin -->
      <img src="meat.jpg" style=" height: 100%; width: 100%;" >
    </div><!-- panel-body Finish -->
    
</div><!-- panel panel-default sidebar-menu Finish -->
       </div> <!--col-md-3 end-->
         <div class="col-md-9"><!-- col-md-9 Begin -->
               <div class="box"><!-- box Begin -->
                   <h1>Shop</h1>
                   <p>
                       Food shopping is one of the most essential purchases that people will make. From picking up a single pint of milk, to filling an over-flowing trolley, food retailers are swamped with customers, especially around seasonal occasions.

                   </p>
               </div><!-- box Finish -->
               <?php 
          
  $i=0;

  $get_p = "SELECT * FROM ( select * from SHOP ) WHERE ROWNUM <= 8 ";
  
  $run_p = oci_parse($connection,$get_p);
  oci_execute($run_p);
  while($row_p=oci_fetch_array($run_p)){
    $sid=$row_p['SHOP_ID'];
    // echo"$sid";
      $p_des = $row_p['SHOP_PHOTO'];
      $s_name = $row_p['SHOP_NAME'];
      
                  echo'<div class="col-md-4 col-sm-6 center-responsive">';
                    echo'<div class="productshop">';
                        
                        echo'<img src="tradershop/'.$row_p['SHOP_PHOTO'].'" alt="product image" class="img-responsive">';
                        echo '<div class ="text">';
                
                       echo'<h3>';
                                                
                     echo'<a href="test.php?
                                sid='.$row_p['SHOP_ID'].'">'.$row_p['SHOP_NAME'].'</a>';
                                                
                                               echo'</h3>';
                      echo'<p class="shopbuttons">';

                            echo'<a class="btn btn-default" href="test.php?
                                sid='.$row_p['SHOP_ID'].'">

                                                        View Shop

                                                    </a>';
                          echo'</p>';
                    
                       echo'</div>'; 
                    echo'</div>';
               echo'</div>';

      $i++;
 } ?>
             </div><!--col-md-9-->

       </div>
     </div>

     <?php include 'footer.php' ?>
 </body>
 </html>
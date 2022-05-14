<?php 
$active='Shop';
include 'connection.php';
include 'header.php';
?>


 <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin --> 
       	<div class="col-md-3"><!--col-md-3 Begin-->
       	<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">Categories</h3>
    </div><!-- panel-heading Finish -->
    
    <div class="panel-body"><!-- panel-body Begin -->
      <img src="category.png" alt="Example" width="200" height="100">
        <ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Begin -->
            <form method="POST" enctype="multipart/form-data" action="test.php">
                    <div class="input-group mx-0 my-4">
                    </br>
                        <select class="cat" name="cat" style=" width: 100%; height: 30px;">
                        <?php
                            $d="SELECT * FROM TRADER";
                            $f = oci_parse($connection,$d);
                            $g= oci_execute($f);
                            while($h= oci_fetch_assoc($f)){

        //echo'<li>';
          //echo'<a href = "shop.php?pid='.$h['CATEGORY'].'">'.$h['CATEGORY'].'</a>';
        //echo'</li>';
         echo'<option value="'.$h['CATEGORY'].'">  '.$h['CATEGORY'].'</option>';

                            }

                        ?>
                         </select>
                         <br>
                       </br>
                         <div class="search-btn">
                        <input type="text" class="form-control" name="search" placeholder="  Search Here" style="width: 70%;">
                          <input type="submit" name="sub" value="Search" style=" background-color: #74b72e;border-color:#74b72e; color:white; height: 30px; width: 30%;">
                        </div>
                    
                    </div>
                    </form>

            
        </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
    </div><!-- panel-body Finish -->
    
</div><!-- panel panel-default sidebar-menu Finish -->
</div><!--col-md-3-->
         <div class="col-md-9"><!-- col-md-9 Begin -->
               <div class="box"><!-- box Begin -->
                   <h1>Products</h1>
                   <p>
                       We provide various category of meat(Chicken,Beef,Pork etc.), bakery item, fishes, vegetables, fruints, desserts, etc. Every item from our shop is 100% fresh and clean with very reasonable price.

                   </p>
               </div><!-- box Finish -->
<?php
 if(isset($_POST['sub'])){
                
                $search = $_POST['search'];
                $s=null;
                $cat = $_POST['cat'];
    if(!empty($cat)){
        $s = "SELECT * FROM PRODUCT ,TRADER WHERE PRODUCT.PRODUCT_NAME LIKE '%$search%' AND TRADER.CATEGORY = '$cat' AND TRADER.TRADER_ID = PRODUCT.TRADER_ID";
    }
    else{    
        $s = "SELECT * FROM PRODUCT WHERE PRODUCT_NAME LIKE '%$search%'";

    }
    
        $n = oci_parse($connection,$s);
           $o = oci_execute($n);
            $x = oci_num_rows($n);
           while($ro = oci_fetch_assoc($n)){
                echo'<div class="col-md-4 center-responsive">';
                    echo'<div class="product">';
                        
                        echo'<img src="products/'.$ro['PRODUCT_PIC1'].'" alt="product image" class="img-responsive">';
                        echo '<div class ="text">';
                
                       echo'<h3>';
                                                
                     echo'<a href="details.php?
                                pid='.$ro['PRODUCT_ID'].'">'.$ro['PRODUCT_NAME'].'</a>';
                                                
                                               echo'</h3>';
                             if ($ro['DISAMOUNT']>0) {
                           echo'<p class="price"><s><span>$'.$ro['PRODUCTPRICE'].'/'.$ro['PRODUCTUNIT'].'</s></p>';
                         $d= $ro['DISAMOUNT'];
                        $ro['PRODUCTPRICE'] = $ro['PRODUCTPRICE'] - ($ro['PRODUCTPRICE'] * ($d/100));
                        echo'<h4 class="price" style="text-align: center;"><span>$'.($ro['PRODUCTPRICE'] - ($ro['PRODUCTPRICE'] * ($d/100))).'/'.$ro['PRODUCTUNIT'].'</h4>';
                        }else
                        {
                           echo'<p class="price"><span>$'.$ro['PRODUCTPRICE'].'/'.$ro['PRODUCTUNIT'].'</p>';
                        }



                      echo'<p class="buttons">';

                            echo'<a class="btn btn-default" href="details.php?
                                pid='.$ro['PRODUCT_ID'].'">

                                                        View Details

                                                    </a>';

                               echo'  <a class="btn btn-primary" href="details.php?
                            pid='.$ro['PRODUCT_ID'].'">

                                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                                        </a>';
                                                        echo'</p>';
                    
                       echo'</div>'; 
                    echo'</div>';
               echo'</div>';

            }
          
        }
            else{
// $sid=$_GET(['sid']);
$sid=$_GET['sid'];
// echo '$sname';
// if(isset($_POST['submit'])){ 
$sql =	"SELECT * FROM PRODUCT WHERE SHOP_ID= '$sid'";
 $run_p = oci_parse($connection,$sql);
  oci_execute($run_p);
  while($ro=oci_fetch_array($run_p)){
                            	 echo'<div class="col-md-4 col-sm-6 center-responsive">';
                    echo'<div class="product">';
                        
                        echo'<img src="products/'.$ro['PRODUCT_PIC1'].'" alt="product image" class="img-responsive">';
                        echo '<div class ="text">';
                
                       echo'<h3>';
                                                
                     echo'<a href="details.php?
                                pid='.$ro['PRODUCT_ID'].'">'.$ro['PRODUCT_NAME'].'</a>';
                                                
                                               echo'</h3>';
                            if ($ro['DISAMOUNT']>0) {
                           echo'<p class="price"><s><span>$'.$ro['PRODUCTPRICE'].'/'.$ro['PRODUCTUNIT'].'</span></s></p>';
                         $d= $ro['DISAMOUNT'];
                        $ro['PRODUCTPRICE'] = $ro['PRODUCTPRICE'] - ($ro['PRODUCTPRICE'] * ($d/100));
                        echo'<h4 class="price" style="text-align: center;"><span>$'.($ro['PRODUCTPRICE'] - ($ro['PRODUCTPRICE'] * ($d/100))).'/'.$ro['PRODUCTUNIT'].'</span></h4>';
                        }else{
                        
                           echo'<p class="price"><span>$'.$ro['PRODUCTPRICE'].'/'.$ro['PRODUCTUNIT'].'</span></p>';
                        }




                      echo'<p class="buttons">';

                            echo'<a class="btn btn-default" href="details.php?
                                pid='.$ro['PRODUCT_ID'].'">

                                                        View Details

                                                    </a>';
                    if(!isset($_SESSION['cid']))
                      {
                            echo'  <a class="btn btn-primary" href="login.php?
                            pid='.$ro['PRODUCT_ID'].'">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                            </a>';
                            echo'</p>';
                      }
                      else
                      {

                               echo'  <a class="btn btn-primary" href="details.php?
                            pid='.$ro['PRODUCT_ID'].'">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                            </a>';
                            echo'</p>';
                      }
                    
                       echo'</div>'; 
                    echo'</div>';
               echo'</div>';
               
               
                            }
                        }
                        

?>

</div>
</div>
</div>
<?php include'footer.php' ?>
</body>
</html>
<?php 
if(!file_exists('inc/config/db.inc.config.php')){
  header('location:install/start.php');
  die();
}
?>

<?php include('inc/header.php'); ?>
<body>
  <?php include('inc/navbar.php'); ?>

	 
<?php 
   
   if(isset($_GET['er'])) 
   {
     if($_GET['er'] == 'false') 
     {
      
?>
          <div class="jumbotron text-center">

            <div class="row">
              <div  class="col-md-12" style="padding: 20px;">
               <a href="index.php" class="btn btn-info"><i class="fas fa-arrow-circle-left" ></i> Back</a> 
              </div>
            </div>
			 
                          
                          <img src="img/foodhand.png" class="img-responsive" style="margin-left: auto;margin-right: auto;width: auto;max-height: 300px; " />
                            <h1>Thank you for your order! <br/> <small>Your dish is being prepared.</small></h1>
                           
                            <small style="padding:10px;background:#ddd;color:#7f7f7f;border-radius:5px;">Temporary#<?php echo $_SESSION['CODE']; ?></small>
                            <a href="index.php" class="btn btn-success"><i class="fas fa-arrow-circle-left" ></i> Back to my orders</a> 
            </div>



                    <div class="container-fluid">
                      <div class="row ">
                        <div class="col-md-4"></div>
                        <div class="col-md-12">
                         
                         
                          


 <?php                 $stmt = $conn->prepare("SELECT productid,quantity FROM purchase WHERE guest_code = ?");
                       
                        $stmt->bind_param('s',$_SESSION['CODE']);
                        $stmt->execute();
                        $stmt->store_result();    
                        $stmt->bind_result($productid, $quantity);  // <- Add; #args = #cols in SELECT
                        $json = array();
                      if($stmt->num_rows > 0)
                       {


?>
                    <div class="table-responsive" id="order_table">
                                <table class="table table-bordered table-striped">
                                  <tbody>
                                    <tr >  
                                          <th width="40%">Item</th>  
                                          <th width="10%">Quantity</th>  
                                          <th width="20%">Price</th>  
                                          <th width="15%">Sub total</th>  
                                         
                                      </tr>




<?php

                                   $total_price =0;
                                    while ($stmt->fetch()) 
                                    {

                                      $json = array('prod_id' =>$productid, 'q'=>$quantity);

                                            $stmt2 = $conn->prepare("SELECT productname,price FROM product WHERE productid = ?");
                                            $stmt2->bind_param('i', $json['prod_id']);
                                            $stmt2->execute();
                                            $stmt2->store_result();    
                                            $stmt2->bind_result($productname, $price);
                                            $stmt2->fetch();
                                            $json2 = array('p_name' =>$productname, 'price'=>$price);

                                              $price = $json2['price'];
                                              $quantity = floatval($json['q']);
                                              $total = $price * $quantity;
                                              $total_price += $price * $quantity;

                                            
                             ?>

                                                
                                                <tr>
                                                  <td><?php echo $json2['p_name']; ?></td>
                                                  <td><?php echo $quantity; ?></td>
                                                  <td align="right" class="text-success"><?php echo $currency.' '.$price; ?></td>
                                                  <td align="right" class="text-success"><?php echo $currency.' '.$total; ?></td>
                                                 
                                                </tr>
                                                
                                                
                                              


                                  <?php  
                                       
                                    }

                                      echo ' <tr>  
                                                <td colspan="3" align="right"><strong>Total</strong></td>  
                                                    <td align="right" class="text-success">'.$currency.' '.$total_price.'</td>  
                                                    
                                                </tr>';











                        }else{
                       
                          echo '<tr>  
                                    <td colspan="4" class="text-danger" >Error: while fetching Data.</td>  

                                </tr>';

                        }
                        ?>
                                          


                            </tbody>
                          </table>
                        </div>
                              

                                 
                   
                </div>
                
              </div>
            </div>

<?php
  } 
   else
   {
?>

         
 <div class="jumbotron text-center">
                <i class="fas fa-times-circle text-danger" style="font-size: 78px;"></i>
                  <h1>Transaction fail!</h1> 
                   <a href="index.php" class="btn btn-success"><i class="fas fa-arrow-circle-left" ></i>Terug</a> 
  </div>

  <?php
  }}?>

  
  
<?php include "inc/jquery.php";?>
<script type="text/javascript"> localStorage.removeItem('time');</script>
</body>
</html>

<?php
include('config/config.php');

$output = '';
//var_dump($_POST);

?>
<div class="col-md-12">
         <h4 class="page-header"><i class="fas fa-utensils" ></i>&nbsp; Your Orders</h4><br/>

 <?php
                            $stmt = $conn->prepare("SELECT productid,quantity,date_purchase,time_purchase FROM purchase WHERE guest_code = ?");
                            $stmt->bind_param('s', $_SESSION['CODE']);
                                $stmt->execute();
                                $stmt->store_result();    
                                $stmt->bind_result($productid,$quantity,$date_purchase,$time_purchase);  // <- Add; #args = #cols in SELECT
                                $json = array();
                                if($stmt->num_rows > 0)
                                 {
?>
                   <!--<h5><a href="#" data-toggle="modal" data-target="#modal_cancel"><i class="fas fa-trash-alt text-danger"></i>Request for order cancellation?</a></h5>-->
                    <div class="table-responsive" id="order_table">
                                <table class="table table-bordered table-striped">
                                  <tbody>
                                    <tr >  
                                          <th>Order Prefrence</th>
                                          <th width="40%">Item</th>  
                                          <th width="10%">Quantity</th>  
                                          <th width="20%">Price</th>  
                                          <th width="20%">Date</th>  
                                          <th width="15%">Sub total</th>  
                                         
                                      </tr>
<?php
                                   $total_price =0;
                                   $order_prefer = 1;
                                    while ($stmt->fetch()) 
                                    {

                                      $json = array('prod_id' =>$productid, 'q'=>$quantity,'date'=>$date_purchase,'time'=>$time_purchase);

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
                                                 <td><center><span class="badge badge-secondary text-center" style="background: #65cc0b;"><?php echo $order_prefer; ?></span></center></td>
                                                  <td><?php echo $json2['p_name']; ?></td>
                                                  <td><?php echo $quantity; ?></td>
                                                  <td align="right" class="text-success"><?php echo $currency.' '.number_format($price,2); ?></td>
                                                  <td align="right" class="text-success">


                                                     <?php
                                   
                                                    
                                                          $date = ucwords(strftime("%a %d %B %Y", strtotime($json['date'])));
                                                          $time = ucwords(strftime("%X", strtotime($json['time'])));
                                                             echo $date.' '.$time;
                                                        
                  
                          ?>  
                                                    </td>
                                                  <td align="right" class="text-success"><?php echo $currency.' '.number_format($total,2); ?></td>
                                                 
                                                </tr> 
                                  <?php  
                                     $order_prefer++;  
                                    }
                                      echo ' <tr>  
                                                <td colspan="5" align="right"><strong>Total</strong></td>  
                                                    <td align="right" class="text-success"><strong>'.$currency.' '.number_format($total_price,2).'</strong></td>  
                                                    
                                                </tr>';
                                }else{
                               
                                  echo '<div class="alert alert-info" role="alert">
                       <i class="fas fa-info-circle" ></i>&nbsp;You have not placed any orders yet.</div>';

                                }
                                ?> 
                            </tbody>
                          </table>
                        </div>
      </div>
     


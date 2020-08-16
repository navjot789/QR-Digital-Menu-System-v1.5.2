
<!-- Sales Details -->
<div class="modal fade" id="details<?php echo $row['purchaseid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Order History</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <b>CustomerID:</b> #<?php echo $row['guest_code']; ?>                          
						</div> 
                
                        <div class="col-md-6">
                         <span class="pull-right">
                            <?php
                                                   
                                                     //$date = date('M d, Y', strtotime($d_row['date_purchase']));
                                                     //$time = date('h:i A', strtotime($d_row['time_purchase']));
                                                     //echo $date.' '.$time;
                                    
                                                 $date = ucwords(strftime("%a %d %B %Y", strtotime($d_row['date_purchase'])));
                                                 $time = ucwords(strftime("%X", strtotime($d_row['time_purchase'])));
                                                 echo $date.' '.$time;
                                    
                                            ?>
                        </span>
                        </div>

                    </div>

                       <div class="row">
                        <div class="col-md-6">
                        
                           <b>Table No :</b> #<?php echo $row['table_no']; ?>
                        </div> 
                
                    </div>
                    <span><b>Number of Orders:</b> <?php echo ($total >= 40 ? $total.' '."<i class='fas fa-exclamation-triangle text-danger'></i> 
                    <span class='text-danger'>More than 40 orders needs to confirm manually/verbally.</span> ":  $total);?></span>

                    <div class="table-responsive" style="margin-top:10px;">
                    <table class="table table-bordered table-striped" >
                        <thead>
                        	<th>Order Prefrence</th>
                            <th>Product ID</th>
                            <th>Item</th>
                            <th>Pice</th>
                            <th>Qty</th>
                            <th>Date & Time</th>
                            <th>Sub</th>
                        </thead>
                        <tbody>
                             <?php
                                $total_price=0;
                                $order_prefer = 1;



                        $sql="SELECT purchase.productid,
									 purchase.quantity,
									 purchase.date_purchase, 
									 purchase.time_purchase,
									 product.productname,
									 product.price
											 FROM purchase
											 INNER JOIN product ON 
											 purchase.productid=product.productid 
											 AND purchase.guest_code='".$row['guest_code']."'";
							
                             $dquery=$conn->query($sql);
                                while($drow=$dquery->fetch_array()){
                                    ?>
                                    <tr>
                                    	<td><center><span class="badge badge-secondary text-center" style="background: #65cc0b;"><?php echo $order_prefer; ?></span></center></td>
                                        <td>#<?php echo $drow['productid']; ?></td>
                                        <td><?php echo $drow['productname']; ?></td>
                                        <td class="text-right">&euro; <?php echo $drow['price']; ?></td>
                                        <td><?php echo $drow['quantity']; ?></td>
                                        <td> <?php
                                                   
                                                     //$date = date('M d, Y', strtotime($d_row['date_purchase']));
                                                     //$time = date('h:i A', strtotime($d_row['time_purchase']));
                                                     //echo $date.' '.$time;
                                    
                                                 $date = ucwords(strftime("%a %d %B %Y", strtotime($d_row['date_purchase'])));
                                                 $time = ucwords(strftime("%X", strtotime($d_row['time_purchase'])));
                                                 echo $date.' '.$time;
                                    
                                            ?></td>
                                        <td class="text-right text-success">&euro;
                                            <?php
                                                $subt = $drow['price'] * floatval($drow['quantity']);
                                                echo number_format($subt, 2);

                                                 $total_price += $subt;
                                            ?>
                                        </td>
                                    </tr>
                                    <?php

                                    $order_prefer++;
                                    
                                }
                            ?>
                            <tr>
                                <td colspan="6" class="text-right"><b>Total</b></td>
                                <td class="text-right  text-success">&euro; <?php echo number_format($total_price, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

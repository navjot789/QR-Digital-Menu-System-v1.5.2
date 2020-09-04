<style>
	/* Order read and unread */	
		.order_read
		{
		  background-color: #f9f9f9 !important;
		  color: black !important;
		}
		.order_unread
		{
		  background-color: #e1e1e180 !important;
		  color: black !important;
		}
		
</style>
<?php 	
						$stmt = $conn->prepare("SELECT gid FROM guest");
                        $stmt->execute();
                        $stmt->store_result();  

	                     if($stmt->num_rows > 0)
	                     {
                            //No reset apply
	                     } else {
							//reset apply

							$stmt = $conn->prepare("SELECT purchaseid FROM purchase");
	                        $stmt->execute();
	                        $stmt->store_result();

	                       if($stmt->num_rows > 0)
	                       {



	?>	                     <div class="alert alert-warning" role="alert">
							  <i class="fas fa-exclamation-triangle" ></i> Warning! Reset has been applied. Please delete the old data.
							</div>

							<div class="row">
								<div class="col-md-12">
									<form action="inc/curd/delete_sales.php" method="post">
										<input name="truncate_sales" type="hidden" value="1">
										<button  class="btn btn-danger btn-sm" onclick="return confirm('Are u sure you want to empty the whole table?')">
											<i class="fas fa-trash-alt" ></i> Truncate
										</button>
									</form>
								
								</div>
							</div>
<?php
	                     }   }                   	
						$stmt->close();
  ?>
</br>
 <div class="alert alert-info" role="alert">
  <i class="fas fa-info-circle" ></i> info: Sales tab allow us to see each single ordered, by your customers. here you can manage each individual order by clicking detail button. 
</div>

<div class="table-responsive" style="margin-top:10px;border: none;">
	<table id="sales" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
			    <th>Seen</th>
			    <th>Tbl</th>
				<th>Item</th>
				<th>Price</th>
				<th>Qty</th>
				<th>Order on</th>
				<th>Subtotal</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
			
		 <?php
                 
                        $sql="SELECT purchase.purchaseid,
						             purchase.productid,
									 purchase.guest_code,
									 purchase.quantity,
									 purchase.seen,
									 purchase.date_purchase,
									 purchase.time_purchase,
									 product.productname,
									 product.categoryid,
									 product.price
									  FROM purchase
									  INNER JOIN product ON purchase.productid=product.productid";

                             	$dquery=$conn->query($sql);

                             	$i=1;
                                while($drow=$dquery->fetch_array())
                                {
                                          
 										$sql_lite = "SELECT table_no FROM guest WHERE guest_code='".$drow['guest_code']."'";
                         			    $lite_q = $conn->query($sql_lite); 
                                        $field=$lite_q->fetch_array();
                                    ?>
                          <tr  id="<?php echo $drow['purchaseid']; ?>" class="<?php echo ($drow['seen']==1)? "order_read": "order_unread"; ?>">

                                        <td class="">
                                        	
                                        	<img id="img_unread<?php echo $drow['purchaseid']; ?>" <?php echo ($drow['seen']==1)? "src='../img/read.png'": "src='../img/bell.png'"; ?>  style="height: 35px;width: 35px;" />
                                        	
                                        </td>

                                        <td>#<?php echo $field['table_no']; ?></td>

                                        <td><?php echo $drow['productname']; ?></td>
                                        <td class="text-right">&euro; <?php echo $drow['price']; ?></td>
                                        <td><?php echo $drow['quantity']; ?></td>
                                        <td><?php
								                   
													 //$date = date('M d, Y', strtotime($drow['date_purchase']));
									                 //$time = date('h:i A', strtotime($drow['time_purchase']));
									                 //echo $date.' '.$time;
									
									 			 $date = ucwords(strftime("%a %d %B %Y", strtotime($drow['date_purchase'])));
												 $time = ucwords(strftime("%X", strtotime($drow['time_purchase'])));
											     echo $date.' '.$time;
									
											?></td>
							  
                                        <td class="text-right text-success">&euro;
                                            <?php
                                                $subt = $drow['price'] * floatval($drow['quantity']);
                                                echo number_format($subt, 2);
                                             ?>
                                        </td>
										<td >
											
											<div class="row" style="max-width: 170px;">
												<div class="col-md-6">
													<a id="<?php echo $drow['purchaseid']; ?>" href="#details<?php echo $drow['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm">
														<span class="fas fa-eye"></span> details
													</a>
												</div>
												<div class="col-md-2">
														<form action="inc/curd/delete_sales.php" method="post">
														    <input name="del_sale" type="hidden" value="<?php echo $drow['purchaseid']; ?>">
															<button  class="btn btn-danger btn-sm" onclick="return confirm('Are u sure?')">
															<i class="fas fa-trash-alt" ></i>
															</button>
														</form>
												</div>
												
											</div>
											
											
										<?php include('inc/sales_modal.php'); ?>
									</td>
                        </tr>
                                    <?php

                                   
                                    
                                }
                            ?>
		 </tbody>
        <tfoot>
            <tr>
          		<th>Seen</th>
          		<th>Tbl</th>
				<th>Item</th>
				<th>Price</th>
				<th>Qty</th>
				<th>Order on</th>
				<th>Subtotal</th>
				<th>Action</th>
            </tr>
        </tfoot>
	</table>
</div>



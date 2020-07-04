<style>
	/* Order read and unread */	
		.order_read
		{
		  background-color: #f9f9f9 !important;
		  color: black !important;
		}
		.order_unread
		{
		  background-color: #c4c4c4  !important;
		  color: black !important;
		}
		
</style>
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

<div class="table-responsive" style="margin-top:10px;">
	<table id="sales" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
				 
				<th>Item</th>
				<th>Price</th>
				<th>Quantity</th>
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
                                while($drow=$dquery->fetch_array()){
                                    ?>
                          <tr  id="<?php echo $drow['purchaseid']; ?>" class="<?php echo ($drow['seen']==1)? "order_read": "order_unread"; ?>">
                                       
                                        <td><?php echo $drow['productname']; ?></td>
                                        <td class="text-right">&euro; <?php echo $drow['price']; ?></td>
                                        <td><?php echo $drow['quantity']; ?></td>
                                        <td><?php
								                   
													 $date = date('M d, Y', strtotime($drow['date_purchase']));
									                 $time = date('h:i A', strtotime($drow['time_purchase']));
									                 echo $date.' '.$time;
											
											?></td>
							  
                                        <td class="text-right text-success">&euro;
                                            <?php
                                                $subt = $drow['price'] * floatval($drow['quantity']);
                                                echo number_format($subt, 2);
                                             ?>
                                        </td>
										<td >
											
											<div class="row">
												<div class="col-md-5">
													<a id="<?php echo $drow['purchaseid']; ?>" href="#details<?php echo $drow['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm">
														<span class="fas fa-eye"></span> details
													</a>
												</div>
												<div class="col-md-5">
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
          
				<th>Item</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Order on</th>
				<th>Subtotal</th>
				<th>Action</th>
            </tr>
        </tfoot>
	</table>
</div>



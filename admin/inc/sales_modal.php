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
<!-- Sales Details -->
<div class="modal fade" id="details<?php echo $drow['purchaseid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                	<h1 class="text-gray-900 text-3xl title-font font-medium mb-4">Order origin</h1>
            </div>
            <div class="modal-body">
                <div class="container">
                   <?php
					
					//getting the category name 
					$qm ="SELECT catname FROM category WHERE categoryid='".$drow['categoryid']."'";
						$query_sql=$conn->query($qm);
						$cat = $query_sql->fetch_array();
					
					
					$sql="SELECT guest_code,reserve_for,table_no FROM guest WHERE guest_code='".$drow['guest_code']."'";
						$query=$conn->query($sql);
						$row=$query->fetch_array();
					
					
					?>
                  
					<section class="text-gray-700 body-font overflow-hidden">
					  <div class="container px-5 mx-auto">
						<div class="lg:w-4/5 mx-auto flex flex-wrap">
						  <div class="lg:w-full w-full lg:py-6 mb-6 lg:mb-0">
							<h2 class="text-sm title-font text-gray-500 tracking-widest"><?php echo $cat['catname']; ?></h2>
							<h1 class="text-gray-900 text-3xl title-font font-medium mb-4"><?php echo $drow['productname']; ?></h1>
							<div class="flex mb-4">
							  <a class="flex-grow text-indigo-500 border-b-2 border-indigo-500 py-2 text-lg px-1">
								Customer details can be find under below who had ordered this item.
								</a>
							  <a class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1"></a>
							  <a class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1"></a>
							</div>
							<p class="leading-relaxed mb-4">
							  Note: To view the total amount and total bill of this customer, Copy the customerID and paste it into the search bar of bill history tab.</p>
							<div class="flex border-t border-gray-300 py-2">
							  <span class="text-gray-500">CustomerID</span>
							  <span class="ml-auto text-gray-900">#<?php echo $row['guest_code']; ?></span>
							</div>
							<div class="flex border-t border-gray-300 py-2">
							  <span class="text-gray-500">Table number</span>
							  <span class="ml-auto text-gray-900"><?php echo $row['table_no']; ?></span>
							</div>
							<div class="flex border-t border-b border-gray-300 py-2">
							  <span class="text-gray-500">No. of people's</span>
							  <span class="ml-auto text-gray-900"><?php echo $row['reserve_for']; ?></span>
							</div>
							  
							<div class="flex border-t border-b mb-6 border-gray-300 py-2">
							  <span class="text-gray-500">Order Quantity</span>
							  <span class="ml-auto text-gray-900"><?php echo $drow['quantity']; ?></span>
							</div>
							
						  </div>
						 
							
						</div>
					  </div>
					</section>
					
					

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

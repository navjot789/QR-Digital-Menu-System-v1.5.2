
	<!-- Modal -->
<div class="modal fade" id="modal_cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
      	<div class="row">
      		<div class="col-md-6">
      		  <h4 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt text-danger"></i>Cancel uw bestelling</h4>
      		</div>
      		<div class="col-md-6">
      			 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
      		</div>
      	</div>
     
       
      </div>

      <div class="modal-body">
 

      	 <div class="row">
      		<div class="col-md-12">
      		 <p ><i class="fas fa-info-circle" ></i>Selecteer de bestellingen die u wilt cancelen</p>
      		</div>
      	</div>
      
       
		<form method="POST" id="order_remove">
			<table class="table table-striped table-bordered">
				<thead>
					<th class="text-center"> <input type="checkbox" id="checkAll">Allemaal</th>
					<th>Item</th>
					<th>Prijs</th>
					<th>Aantal</th>
				</thead>
				<tbody>
					<?php 
						   $stmt = $conn->prepare("SELECT purchaseid,productid,quantity,date_purchase FROM purchase WHERE guest_code = ?");
                            $stmt->bind_param('s', $_SESSION['CODE']);
                                $stmt->execute();
                                $stmt->store_result();    
                                $stmt->bind_result($purchaseid,$productid,$quantity,$date_purchase);  // <- Add; #args = #cols in SELECT
                                $json = array();
                                if($stmt->num_rows > 0)
                                 {


                                 	   $total_price =0;
                                    while ($stmt->fetch()) 
                                    {

                                      $json = array('purchaseid'=>$purchaseid,'prod_id' =>$productid, 'q'=>$quantity,'date'=>$date_purchase);

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
								<td class="text-center"><input type="checkbox" value="<?php echo $json['purchaseid']; ?>" name="purchaseid[]" style=""></td>
								
								<td><?php echo $json2['p_name']; ?></td>
								 <td align="right" class="text-success"><?php echo $currency.' '.$price; ?></td>
								 <td><?php echo $quantity; ?></td>
							</tr>
							<?php
							}
						}
					?>
				</tbody>
			</table>
			
		
		</form>

      </div>
      <div class="modal-footer">
      	 <p id="response_remove" class= "pull-left" style="margin-top:3px;margin-left:5px;margin-bottom: 10px;"></p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
        <button type="button" class="btn btn-primary" id="cancel_ord">Cancel bestellingen</button>
      </div>
    </div>
  </div>
</div>
<?php include('inc/header.php'); ?>
<body>
<?php include('inc/navbar.php'); ?>
<?php include('inc/session_restart.php'); ?>
<div class="container-fluid">

	<!---cart item here------->	
	<?php include('inc/cart_display.php'); ?>
	<!---cart item here------->		

	<div class="row">
			<div class="col-md-12">
				 <h4 class="page-header"><i class="fas fa-utensils" ></i>&nbsp; Your Orders</h4><br/>

 <?php
                            $stmt = $conn->prepare("SELECT productid,quantity,date_purchase FROM purchase WHERE guest_code = ?");
                            $stmt->bind_param('s', $_SESSION['CODE']);
                                $stmt->execute();
                                $stmt->store_result();    
                                $stmt->bind_result($productid,$quantity,$date_purchase);  // <- Add; #args = #cols in SELECT
                                $json = array();
                                if($stmt->num_rows > 0)
                                 {
?>
                   <!--<h5><a href="#" data-toggle="modal" data-target="#modal_cancel"><i class="fas fa-trash-alt text-danger"></i>Request for order cancellation?</a></h5>-->
                    <div class="table-responsive" id="order_table">
                                <table class="table table-bordered table-striped">
                                  <tbody>
                                    <tr >  
                                          <th width="40%">Item</th>  
                                          <th width="10%">Quantity</th>  
                                          <th width="20%">Price</th>  
                                          <th width="20%">Date</th>  
                                          <th width="15%">Sub total</th>  
                                         
                                      </tr>
<?php
                                   $total_price =0;
                                    while ($stmt->fetch()) 
                                    {

                                      $json = array('prod_id' =>$productid, 'q'=>$quantity,'date'=>$date_purchase);

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
                                                  <td align="right" class="text-success"><?php echo $currency.' '.number_format($price,2); ?></td>
                                                  <td align="right" class="text-success"><?php echo date("F jS, Y", strtotime($json['date']));?></td>
                                                  <td align="right" class="text-success"><?php echo $currency.' '.number_format($total,2); ?></td>
                                                 
                                                </tr> 
                                  <?php  
                                       
                                    }
                                      echo ' <tr>  
                                                <td colspan="4" align="right"><strong>Total</strong></td>  
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
<!---initialized order cancellation Modal------->
<?php include "inc/modal_remove_order.php";	?>
<!---initialized order cancellation Modal------->

	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<?php
				$sql="select * from category order by categoryid asc limit 1";
				$fquery=$conn->query($sql);
				$frow=$fquery->fetch_array();
				?>
				
						<li class="active">
								<a data-toggle="tab" href="#<?php echo $frow['categoryid'] ?>">
									<?php echo $frow['catname'] ?>
								</a>
			       		</li>
					
				<?php

				$sql="select * from category order by categoryid asc";
				$nquery=$conn->query($sql);
				$num=$nquery->num_rows-1;

				$sql="select * from category order by categoryid asc limit 1, $num";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<li><a data-toggle="tab" href="#<?php echo $row['categoryid'] ?>"><?php echo $row['catname'] ?></a></li>
					<?php
				}
			?>
		</ul>
<!---content render here------->
	<div class="tab-content" id="display_item"></div>
<!---content render here------->


<?php 
if(!isset($_COOKIE['REP_NAME']) && !isset($_COOKIE['CODE']))
{
	
?>
		<!---initialized Modal------->
		<div class="modal fade" id="session_init" data-backdrop="static" data-keyboard="false" style="margin-top: 80px;">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">

				<div class="row">
		         	<div class="col-md-12">
		         			 <h5 class="modal-title" >Welcome, fill in the information below and start your order</h5>
		         	</div>
		         
		         	
		         </div>

		       
		        
		      </div>


		      <div class="modal-body">
		      	 <h5 class="text-danger">We do not store any personal data about you. Your anonymous account will be automatically deleted after 1 day.</h5>
		        <form method="post" id="session_modal">        
		          <div class="row">

		       
		          	   	<div class="col-md-12">
		          		  <div class="form-group">
				            <label for="recipient-name" class="col-form-label">Number of persons</label>
				            <select  class="form-control" name="mates" id="mates">
				            	<option  disabled selected>Select</option>
								<?php 
										$total=30;
										 for($i=1;$i<=$total;$i++)
										 {
								?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php
										 }
								?>
				            
				            </select>
				          </div>

		          		</div>
		          </div>

		          <div class="row">
		           	<div class="col-md-12">
		          		<div class="form-group">
				          <label for="recipient-name" class="col-form-label">Table number</label>
				          <input type="text" class="form-control" name="tbl_no" id="tbl_no">
				        </div>
		          	</div>
		          </div>
		       
		        
		        </form>
		      </div>
		      <div class="modal-footer">
		        <p id="response" class="pull-left" style="margin-top: 5px;"></p>	
		        <button type="button" class="btn btn-primary" id="session_start">Start session</button>
		      </div>
		    </div>
		  </div>
		</div>
<!---initialized Modal------->
<?php	
}
?>
		

<?php include "inc/footer.php";?>
</div>


<script type="text/javascript">
	   $(window).on('load',function(){
        $('#session_init').modal('show');
    });

</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>
<?php include "inc/jquery.php";?>
</body>

</html>

<?php include('header.php'); ?>
<?php include('mailing_parameters.php'); ?>
<body>

<div class="container-fluid">

	<div class="row">
			<div class="col-md-12">
				<h3 class="page-header"><i class="fas fa-times-circle text-danger" ></i> Error</h3>

						<a href="../index.php" class="btn"><i class="fas fa-arrow-circle-left" ></i> Back to home</a>
				

<?php

$reset = $conn->prepare("SELECT guest_code FROM guest WHERE guest_code= ?");
$reset->bind_param("s",$_COOKIE['CODE']); 
$reset->bind_result($g_code);
$reset->store_result();
$reset->execute() or die("Cannot add the date to the database, please try again.");
if($reset->fetch())
 {
	 
	 $res=array('g_code'=>$g_code);
	 $reset->close();// closing statement for not to interfair with other statements

	 if($_SESSION['CODE'] == $res['g_code'])
	 {


						if(!empty($_SESSION["shopping_cart"]) && $_SESSION["shopping_cart"]!=='')
						{
						 $shown = 0; $order_prefer = 1;	
							
										//include email template parts
										include "src/order_send/part_1.php";
							            include "src/order_send/part_2.php";
							
							 
								foreach($_SESSION["shopping_cart"] as $number => $val)
								    {
									        // prepare and bind
									$stmt = $conn->prepare("INSERT INTO purchase(guest_code,productid,quantity,date_purchase,time_purchase) VALUES (?, ?, ?, ?, ?)");
											$stmt->bind_param("siiss",$_COOKIE['CODE'],$val['product_id'],$val['product_quantity'],$current_date,$current_time); 
												$stmt->store_result();	
											    if($stmt->execute())
											    {
													
													$st = $conn->prepare("SELECT productid, productname FROM product WHERE productid= ?");
													$st->bind_param("i",$val['product_id']); 
													$st->bind_result($productid,$productname);
													$st->store_result();
													$st->execute();
														while ($st->fetch()) {
															
														   $json=array('pid'=>$productid,'pname'=>$productname);
															
														

																	$body .='<tr>

																			<td><center><span class="badge  text-center" style="background: #65cc0b;">'.$order_prefer.'</span></center></td>
																			<td>'.$json['pid'].'</td>
																			<td>'.$json['pname'].'</td>
																			<td>'.$val['product_quantity'].'</td>
																		
																	</tr>';

															$order_prefer++;		
														}
													
													
													
													if($shown==0) //show msg only once
											    	{
												    	unset($_SESSION['shopping_cart']);	
												    	header('location:../checkout.php?er=false');
												        $shown = 1;
													}

												$st->close();
												$stmt->close();	

											    }else
											    {
											    
											    	if($shown==0) //show msg only once
											    	{
												    	echo 'ERROR: while placing your order. Please contact restaurant owner';
												    	header('location:../checkout.php?er=true');
												        $shown = 1;
											    	}

											    	$st->close();
													$stmt->close();	
											    }

									      
								    }
							
						          //include email template parts
							      include "src/order_send/part_3.php";
							     
							      $mails->msgHTML($body);
								  $mails->Subject = 'New order arrived';
								  $mails->send(); //echo 'error: ' . $mail->ErrorInfo;
								
						      
						}
						else
						{
							echo '<div class="alert alert-danger" role="alert">
								  No orders have been placed - We can only process your order with at least 1 order.
								 </div>';
						}


	 }else
	 {
	 	echo '<div class="alert alert-danger" role="alert">
			  Reset has been applied by owner...please book a new table by <a href="distroy_session.php">Clicking here</a>.
			 </div>';
	 }


}
else
{
	$reset->close();	

		echo '<div class="alert alert-danger" role="alert">
			  CID not found! Reset has been applied by owner...please book a new table by <a href="distroy_session.php">Clicking here</a>.
			 </div>';

		 
}


?>

		</div>
	</div>
</div>

  
<?php include "jquery.php";?>
<script type="text/javascript"> localStorage.removeItem('time');</script>


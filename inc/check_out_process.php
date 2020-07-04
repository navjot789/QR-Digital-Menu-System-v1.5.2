<?php include('header.php'); ?>
<?php include('mailing_parameters.php'); ?>
<body>

<div class="container-fluid">

	<div class="row">
			<div class="col-md-12">
				<h3 class="page-header"><i class="fas fa-times-circle text-danger" ></i> Error</h3>

						<a href="../index.php"><i class="fas fa-arrow-circle-left" ></i> Back to home</a>
				

<?php

if(!empty($_SESSION["shopping_cart"]) && $_SESSION["shopping_cart"]!=='')
{
 $shown = 0;	
	$sql=mysqli_query($conn,"select * from guest where guest_code='".$_COOKIE['CODE']."'");
	$row=mysqli_fetch_array($sql);
	
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
											
												<td>'.$json['pid'].'</td>
												<td>'.$json['pname'].'</td>
												<td>'.$val['product_quantity'].'</td>
												
											</tr>';
											
								}
							
							
							
							if($shown==0) //show msg only once
					    	{
						    	unset($_SESSION['shopping_cart']);	
						    	header('location:../checkout.php?er=false');
						        $shown = 1;
					    	}

					    }else
					    {
					    
					    	if($shown==0) //show msg only once
					    	{
						    	echo 'ERROR: while placing your order. Please contact restaurant owner';
						    	header('location:../checkout.php?er=true');
						        $shown = 1;
					    	}
					    }

			      
		    }
	
          //include email template parts
	      include "src/order_send/part_3.php";
	     
	      $mails->msgHTML($body);
		  $mails->Subject = 'Nieuw bestelling!';
		  $mails->send(); //echo 'error: ' . $mail->ErrorInfo;
		
      
}
else
{
	echo '<div class="alert alert-danger" role="alert">
		  No orders have been placed - We can only process your order with at least 1 order.
		 </div>';
}
?>
		</div>
	</div>
</div>
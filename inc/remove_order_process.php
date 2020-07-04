<?php include('config/config.php'); ?>
<?php include('mailing_parameters.php'); ?>
<?php
	
	if(isset($_POST['purchaseid']))
	{
	//var_dump($_POST['purchaseid']);
		$shown = 0;
		$body = '';
		$checked_values = $_POST['purchaseid'];
		
			$sql=mysqli_query($conn,"select * from guest where guest_code='".$_SESSION['CODE']."'");
			$row=mysqli_fetch_array($sql);
		
		     include('src/order_cancel/part_1.php');
		     include('src/order_cancel/part_2.php');

        foreach($checked_values as $val) 
		{
			
          	$st = $conn->prepare("SELECT productid FROM purchase,quantity WHERE purchaseid= ? AND guest_code=?");
			$st->bind_param("is",$val,$_SESSION['CODE']); 
			$st->bind_result($productid,$quantity);
			$st->store_result();	
			
			  if($st->execute())
			  {
			           // $q = $conn->prepare("DELETE FROM purchase WHERE purchaseid=? AND guest_code=?");
						//$q->bind_param("is",$val,$_SESSION['CODE']);
						//$q->store_result();
						
					   
						  while($st->fetch()) 
						  {
							  $json=array('pid'=>$productid,'pq'=>$quantity);
							  // $q = $conn->prepare("SELECT productid,productname FROM purchase WHERE purchaseid= ? AND guest_code=?");
							  //$q->bind_param("is",$val,$_SESSION['CODE']);
							  //$q->store_result();

							  $body .='<tr>
																	  <td>'.$json['pid'].'</td>
																	  <td>'.$json['pq'].'</td>
																	</tr>';  

							  echo $json['pid'];
						  }


						  if($shown==0) //show msg or dedirect only once
						  {

							  //echo "success";
							  $shown = 1;

						  }
						 

			  }else
			  {

				  if($shown==0) //show msg or dedirect only once
				  {

					  echo "ERROR: While exec.";
					  $shown = 1;

				  }
			  }
		

        }
		
															
		include('src/order_cancel/part_3.php');
		
		  $mail->msgHTML($body);
		  $mail->Subject = 'Order Cancelled!';
		  $mail->send();
		

	}
	else{
		 echo 'No order selected for order cancellation!';
	}
?>
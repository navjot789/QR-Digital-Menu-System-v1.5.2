  <div class="notice notice-sm">
        <strong>Date:</strong>
        <?php
       
			echo date("d-M-Y h:i:sa");
			
        ?>
    </div>
 <div class="row" >

 	<div class="col-md-3">
 		 <div class="notice notice-success">
	        <strong><i class="fas fa-cart-plus"></i>
	        	<?php 	$stmt = $conn->prepare("SELECT productid FROM product");
                        $stmt->execute();
                        $stmt->store_result();    
                     	 echo  $stmt->num_rows;
                       	$stmt->close();

       				?>

	        </strong>Total Products</div>
 	</div>

 	<div class="col-md-3">
 		 <div class="notice notice-danger">
	        <strong><i class="fas fa-align-justify"></i>
			<?php 	$stmt = $conn->prepare("SELECT categoryid FROM category");

                        $stmt->execute();
                        $stmt->store_result();    
                     	echo  $stmt->num_rows;
                       	$stmt->close();

       				?>
	        </strong>Total Categories</div>
 	</div>
 	<div class="col-md-3">
 		 <div class="notice notice-info">
	        <strong><i class="fas fa-chart-line"></i>
	        	<?php 	$stmt = $conn->prepare("SELECT purchaseid FROM purchase");

                        $stmt->execute();
                        $stmt->store_result();    
                     	echo  $stmt->num_rows;
                       	$stmt->close();

       				?>

	        </strong>Total Sales</div>
 	</div>
 	<div class="col-md-3">
 		 <div class="notice notice-warning">
	        <strong><i class="fas fa-users" ></i>
	<?php 	$stmt = $conn->prepare("SELECT gid FROM guest");

                        $stmt->execute();
                        $stmt->store_result();    
                     	echo  $stmt->num_rows;
                       	$stmt->close();

       				?>
	        </strong>Total Guests</div>
 	</div>
	 
	 <div class="col-md-6">
 		 <div class="notice notice-success">
	        <strong><i class="fas fa-euro-sign"></i>
	<?php 	
				$stmt = $conn->prepare("SELECT SUM(purchase.quantity * product.price) AS Amount
									        FROM product 
									INNER JOIN purchase ON purchase.productid = product.productid");

                       $stmt->execute();
                       $result = $stmt->get_result();
					   $data = $result->fetch_assoc();
					   echo $data['Amount'];
					   $stmt->close();

       				?>
	        </strong>Total Sales Revenue</div>
 	</div>
	 <hr/>
	  <div class="col-md-6">
 		 <div class="notice notice-success">
	        <strong><i class="fas fa-euro-sign"></i>
	<?php 	
				$stmt = $conn->prepare("SELECT SUM(purchase.quantity * product.price) AS Amount
										FROM product 
										INNER JOIN purchase ON 
										purchase.productid = product.productid 
										AND purchase.date_purchase BETWEEN '".$current_date."' AND '".$current_date."'");

                       $stmt->execute();
                       $result = $stmt->get_result();
					   $data = $result->fetch_assoc();
					   echo $data['Amount'];
					   $stmt->close();

       				?>
	        </strong>Today Sales Revenue</div>
 	</div>
 </div>

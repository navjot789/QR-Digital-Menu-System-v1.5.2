
<div class="table-responsive" style="margin-top:10px;">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
				<th>CustomerID</th>
				<th>Table No.</th>
				<th>Total Guests</th>
				<th>Total Orders</th>
				<th>Date(first ordered)</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
			<p id="rep"></p>
			<?php 
				$sql="SELECT p.purchaseid, p.guest_code, g.reserve_for, g.table_no, g.gid   
					 FROM (SELECT MIN(p.purchaseid) as purchaseid, p.guest_code
						   FROM purchase p
						   GROUP BY p.guest_code
						  ) p JOIN
						  guest g
						  ON p.guest_code = g.guest_code";
			
				$query=$conn->query($sql);
				while($row=$query->fetch_array())
						{

										//getting total sales on a perticular guest
										$total_query="select purchaseid,productid,date_purchase,time_purchase from purchase where guest_code='".$row['guest_code']."'"; 
										$total_res=$conn->query($total_query);
										$total=mysqli_num_rows($total_res);
										$d_row=$total_res->fetch_array(); //geting order date only
					
									
					?>
					<tr >
						<td >#<?php echo $row['guest_code']; ?></td>
						<td ><?php echo $row['table_no']; ?></td>
						<td>#<?php echo $row['reserve_for']; ?></td>
						<td><?php echo $total; ?></td>
						<td> <?php
				
							$date = date('M d, Y', strtotime($d_row['date_purchase']));
							$time = date('h:i A', strtotime($d_row['time_purchase']));
							echo $date.' '.$time;
							?></td>
						<td><a  href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> view Bill</a>
							<?php include('inc/bill_modal.php'); ?>
						</td>
						</tr>
					<?php
				}
			?>
		 </tbody>
        <tfoot>
            <tr>
			<th>CustomerID</th>
				<th>Table No.</th>
				<th>Total Guests</th>
				<th>Total Orders</th>
				<th>Date(first ordered)</th>
				<th>Action</th>
            </tr>
        </tfoot>
	</table>
</div>

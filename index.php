<?php 

if(!file_exists('inc/config/db.inc.config.php')){
	header('location:install/start.php');
	die();
}
include('inc/header.php'); 

?>
<body>
<?php include('inc/navbar.php'); ?>
<?php include('inc/session_restart.php'); ?>
<div class="container-fluid">



<div class="container">
	<div class="row">
		<div class="col-md-8">

			

			<!---searched item here------->	
			<div id="result"></div>
			<!---searched item here------->	


			<!---searched item here------->	
			<div id="my_orders_result"></div>
			<!---searched item here------->	


				<div id="main_section">

					<div class="row">

					<!---initialized order cancellation Modal------->
					<?php include "inc/modal_remove_order.php";	?>
					<!---initialized order cancellation Modal------->

						<div class="col-md-12">
							 <h4 class="page-header"><i class="fas fa-menorah" ></i>&nbsp; Menu</h4><br>
							
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
						<!---content before ajax loader------->
							<div class="col-md-12 col-md-offset-5 col-xs-12  col-xs-offset-4" >
								<img id="fetching_items"  src="img/loader.gif" style="height:100px;width:100px;display:none;"/>
							</div>
						<!---content before ajax loader------->
						    <div class="tab-content" id="display_item"></div>
					<!---content render here------->

					</div>

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
							         			 <h5 class="modal-title" ><i class="fas fa-smile-beam text-warning" ></i> Welcome, fill in the information below and start your order</h5>
							         	</div>
							         
							         	
							         </div>

							       
							        
							      </div>


							      <div class="modal-body">
							      	 <h5 class="text-danger"><i class="fas fa-info-circle text-primary" ></i> We do not store any personal data about you. Your anonymous account and will be automatically deleted after 1 day.</h5>
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
							        <button type="button" class="btn btn-primary" id="session_start">Start session <i class="fas fa-chevron-right" ></i></button>
							      </div>
							    </div>
							  </div>
							</div>
					<!---initialized Modal------->

					<?php	
					}
					?>
						  
						</div>

					</div>


		</div>

		<div class="col-md-4">
			<!---cart item here------->	
			<?php include('inc/cart_display.php'); ?>
			<!---cart item here------->	
		</div>
	</div>
</div>





<?php include "inc/footer.php";?>


<!--
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>-->

<?php include "inc/jquery.php";?>
<?php include "inc/checkout_timer.php";?>


<script type="text/javascript">

$(window).on('load',function(){
$('#session_init').modal('show');
});

</script>


</body>

</html>
<?php include "inc/header.php";?>
<?php
// Check if the user is already logged in, if yes then redirect him to MYPROFILE page
if(!isset($_SESSION["admin"])){
   header("location: index.php");
   exit();
}
else
{
?>
<body >
<?php include "inc/navbar.php";?>
	<div class="container-fluid" style="max-width: 1140px;margin: 0 auto;">
	  		

  	<!-- Navbar -->
 <?php
  include "inc/sidebar.php";
  ?>
  <!-- End Navbar -->

		  		<div class="col-md-10 content">
		  			  <div class="panel panel-default">
						<div class="panel-heading">
							<?php echo  $icon.' '.$title;?>
						</div>
						
						<div class="panel-body">
							
							<?php
								
									include $content;
								

							?>

					</div>
			</div>
		</div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" onclick="javascript:window.location='dashboard.php?page=5'">&times;</button>
        <h4 class="modal-title"><i class="fas fa-bell" ></i> Incomming Order!</h4>
      </div>
      <div class="modal-body">
        <p>Find out the new order by: <a href="dashboard.php?page=5" class="text-info" >Click Here!</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location='dashboard.php?page=5'">Take me there!</button>
      </div>
    </div>

  </div>
</div>



		
<audio id="playMusic" playcount="2">
<source src="beep.mp3" type="audio/mpeg">
</audio>




<?php include('inc/modal.php'); ?>
<?php include "inc/footer.php";?>

  	</div>

<?php include "inc/jquery.php";?>
<script type="text/javascript"> 
$(function () {
  	$('.navbar-toggle-sidebar').click(function () {
  		$('.navbar-nav').toggleClass('slide-in');
  		$('.side-body').toggleClass('body-slide-in');
  		$('#search').removeClass('in').addClass('collapse').slideUp(200);
  	});

  	$('#search-trigger').click(function () {
  		$('.navbar-nav').removeClass('slide-in');
  		$('.side-body').removeClass('body-slide-in');
  		$('.search-input').focus();
  	});
  });
	
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'dashboard.php?page=2';
			}
			else
			{
				window.location = 'dashboard.php?page=2&category='+$(this).val();
			}
		});
	});

</script>
		<?php 
          //adding script only when sales(5) tab load.
 if(isset($_GET['page']))
 {
		 
		?>
<script type="text/javascript">
			var old_count = 0;   
			var i = 0;
			setInterval(function(){    
			$.ajax({
				type : "POST",
				url : "inc/notifi.php",
				success : function(data)
				{
					if (data > old_count)
					 {

							if (i == 0)
							{old_count = data;} 
							else
							{
									$(document).ready(function() {
										$("#playMusic").get(0).play();
									});

									$("#myModal").modal("show").on("shown", function () {
									    window.setTimeout(function () {
									        $("#myModal").modal("hide");									        
									    }, 1000);
									});
							
								

							old_count = data;

							}

					} i=1;
				}
			});
			},500);

				//disable the outer click for all modals
	 		 $('[data-toggle="modal"]').each(function () {
		       jQuery(this).attr('data-backdrop','static');
		       jQuery(this).attr('data-keyboard','false');
		    });

		 //script for read unread the messages;
		$(document).ready(function(){
		  $("#sales a").click(function(){

			  var purchase_id = this.id;

			  $.ajax({  
						   url:"inc/curd/order_read_process.php",  
						   method:"POST",  
						   data: {purchase_id},    
						   success:function(data){  

								 //$('#rep').html(data);
								 $("#sales tbody #"+purchase_id).addClass("order_read").removeClass("order_unread");
								//add or remove the read_unread class

						   }  
					  });

		  });
		});
	</script>

	
	<?php
		  
 }
 ?>

	
 </body>
     <?php
}?>
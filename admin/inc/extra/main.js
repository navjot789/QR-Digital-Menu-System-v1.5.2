
//<!---Password--->

	$(document).on('click','#update',function(e){
		e.preventDefault();
		var username = $("#username").val();
	    var password = $("#newpass").val();
	
		$.ajax({
			url:"inc/curd/update_admin.php",
			method:"POST",
			data:{"username":username, "password":password},
			success:function(data){
				
				if(data != null && data.toLowerCase().includes("success"))
				{
					$('#msg-display').fadeIn().html('<span class="alert alert-success"  style="display:block;"><i class="fas fa-check-circle"></i> Operation Successful</span>');
					$('#newpass').val(''); //clear password field
					setTimeout(function(){  
						$('#msg-display').fadeOut("slow");  
					}, 3000);
				}
				else
				{
					$('#msg-display').fadeIn().html('<span class="alert alert-danger"  style="display:block;"><i class="fas fa-times-circle"></i> '+ data +'</span>');

					setTimeout(function(){  
						$('#msg-display').fadeOut("slow");  
					}, 3000);
				}
				
				
			}
		});


	});
	

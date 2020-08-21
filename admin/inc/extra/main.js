
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

					$([document.documentElement, document.body]).animate({
				        scrollTop: $("#msg-display").offset().top
				    }, 500);


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


	$(document).on('click','#update_timer',function(event){
	event.preventDefault();
		var minutes = $("#minutes").val();
	    var seconds = $("#seconds").val();
	
		$.ajax({
			url:"inc/curd/timer_update.php",
			method:"POST",
			data:{"minutes":minutes, "seconds":seconds},
			success:function(data){
				
				if(data != null && data.toLowerCase().includes("ok"))
				{
					$('#timer-msg-display').fadeIn().html('<span class="alert alert-success"  style="display:block;"><i class="fas fa-check-circle"></i> Changes made Successfully.</span>');
					
					$([document.documentElement, document.body]).animate({
				        scrollTop: $("#timer-msg-display").offset().top
				    }, 500);

					setTimeout(function(){  
						$('#timer-msg-display').fadeOut("slow");  
					}, 3000);
				}
				else
				{
					$('#timer-msg-display').fadeIn().html('<span class="alert alert-danger" style="display:block;"><i class="fas fa-times-circle"></i> '+ data +'</span>');

					setTimeout(function(){  
						$('#timer-msg-display').fadeOut("slow");  
					}, 3000);
				}
				
				
			}
		});

	

	});



	$(document).on('click','#update_smtp',function(main){

			main.preventDefault();

	    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;  //validating email
		var pattern = /^[a-z0-9-\.]+\.[a-z]{2,4}/; //validating domain


		var host       = $("#host").val();
	    var h_username = $("#h_username").val();
	    var h_pass     = $("#h_pass").val();
	    var s_mail     = $("#s_mail").val();
	    var r_mail     = $("#r_mail").val();

		if(host=='' || h_username =='' || h_pass=='' || s_mail=='' || r_mail=='')
		{
          $('#smtp-msg-display').fadeIn().html('<span class="alert alert-danger"  style="display:block;"><i class="fas fa-exclamation-triangle"></i> All fields is required.</span>');
		}
		else if (!pattern.test(host)) 
		{

			$('#smtp-msg-display').fadeIn().html('<span class="alert alert-danger"  style="display:block;"><i class="fas fa-exclamation-triangle"></i> Invalid Host.</span>');
		}

		else if (!testEmail.test(s_mail)) 
		{

			$('#smtp-msg-display').fadeIn().html('<span class="alert alert-danger"  style="display:block;"><i class="fas fa-exclamation-triangle"></i> Invalid mail sending from.</span>');
		}
		else if (!testEmail.test(r_mail)) 
		{

			$('#smtp-msg-display').fadeIn().html('<span class="alert alert-danger"  style="display:block;"><i class="fas fa-exclamation-triangle"></i> Invalid mail receving from.</span>');
		}
		else
		{
			$.ajax({
			url:"inc/curd/smtp.php",
			method:"POST",
			data:{"host":host, "h_username":h_username, "h_pass":h_pass, "s_mail":s_mail, "r_mail":r_mail},
			success:function(data){
				
				if(data != null && data.toLowerCase().includes("recevied"))
				{
					$('#smtp-msg-display').fadeIn().html('<span class="alert alert-success"  style="display:block;"><i class="fas fa-check-circle"></i> SMTP details update Successfully.</span>');
					
					 $([document.documentElement, document.body]).animate({
				        scrollTop: $("#smtp-msg-display").offset().top
				    }, 500);

					setTimeout(function(){  
						$('#smtp-msg-display').fadeOut("slow");  
					}, 3000);
				}
				else
				{
					$('#smtp-msg-display').fadeIn().html('<span class="alert alert-danger" style="display:block;"><i class="fas fa-times-circle"></i> '+ data +'</span>');

					setTimeout(function(){  
						$('#smtp-msg-display').fadeOut("slow");  
					}, 3000);
				}
				
				
			}
		});

		}

			$([document.documentElement, document.body]).animate({
				        scrollTop: $("#smtp-msg-display").offset().top
				    }, 500);

			setTimeout(function(){  
				$('#smtp-msg-display').fadeOut("slow");  
			}, 3000);
		
	});
	



$('#h_activate').on('change', function(event, state) {
var checkStatus = this.checked ? 'ON' : 'OFF';

$.ajax({
			url:"inc/curd/toogle.php",
			method:"POST",
			data:{"toogle": checkStatus},
			success:function(data){
				
				$('#just').html(data);
				
			}
		});

});



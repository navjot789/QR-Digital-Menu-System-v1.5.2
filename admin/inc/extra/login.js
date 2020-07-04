$(document).ready(function(){  
        $('#login_btn').click(function(e){
             e.preventDefault();  
          
                  $.ajax({  
                       url:"inc/login_process.php",  
                       method:"POST",  
                       data:$('#login_submit').serialize(),  
                       beforeSend:function(){  
						    $('#login_response').html('<i class="fas fa-circle-notch fa-spin" ></i> Loading response...');
                       },  
                       success:function(data){  
                            
                        if (data != null && data.toLowerCase().includes("success"))
                                { 
                                    
                                     $('#login_response').fadeIn().html('<span class="alert alert-success"><i class="fas fa-check-circle"></i> login Successful</span>'); 

                                      window.location.replace("dashboard.php");
                                }
                                else
                                {

                              $('#login_response').fadeIn().html('<span class="alert alert-danger" style="display:block;"><i class="fas fa-exclamation-triangle"></i> '+data+'</span>');  
                                     
                                    setTimeout(function(){  
                                         $('#login_response').fadeOut("slow");  
                                    }, 7000);
                                }
                       }  
                  });  
             
        });  
   });  
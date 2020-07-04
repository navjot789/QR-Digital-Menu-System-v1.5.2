$(document).ready(function(){  
        $('#cancel_ord').click(function(e){
             e.preventDefault();  
        
         
                  $.ajax({  
                       url:"inc/remove_order_process.php",  
                       method:"POST",  
                       data:$('#order_remove').serialize(),  
                       beforeSend:function(){  
                            $('#response_remove').html('<span class="text-info"><i class="fas fa-spinner"></i> Removing orders...</span>');  
                       },  
                       success:function(data){

								          if (data != null && data.toLowerCase().includes("success"))
                                { 
                                    
                                     $('#response_remove').fadeIn().html('<span class="alert alert-success"><i class="fas fa-check-circle"></i> Cancel Successful</span>'); 

                                      window.location.replace("index.php");
                                }
                                else
                                {

								              $('#response_remove').fadeIn().html('<span class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> '+data+'</span>');  
                                     // $('<span class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i>'+data+'</span>').fadeIn().appendTo('#response');
                                    setTimeout(function(){  
                                         $('#response_remove').fadeOut("slow");  
                                    }, 7000);
                                }
                          



                       }  
                  });  
              
        });  
   });  
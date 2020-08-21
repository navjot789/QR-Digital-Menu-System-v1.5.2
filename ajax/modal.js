$(document).ready(function(){  
        $('#session_start').click(function(e){
             e.preventDefault();  
        
         
                  $.ajax({  
                       url:"inc/modal_process.php",  
                       method:"POST",  
                       data:$('#session_modal').serialize(),  
                       beforeSend:function(){  
                            $('#response').html('<span class="text-info"><i class="fas fa-circle-notch fa-spin" ></i> Loading...</span>');  
                       },  
                       success:function(data){

								          if (data != null && data.toLowerCase().includes("success"))
                                { 
                                    
                                     $('#response').fadeIn().html('<span class="alert alert-success"><i class="fas fa-check-circle"></i> Session loading..</span>'); 

                                      window.location.replace("index.php");
                                }
                                else
                                {

								              $('#response').fadeIn().html('<span class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> '+data+'</span>');  
                                     // $('<span class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i>'+data+'</span>').fadeIn().appendTo('#response');
                                    setTimeout(function(){  
                                         $('#response').fadeOut("slow");  
                                    }, 7000);
                                }
                          



                       }  
                  });  
              
        });  
   });  
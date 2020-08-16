
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="ajax/cart.js"></script>
<script type="text/javascript" src="ajax/modal.js"></script>
<!--<script type="text/javascript" src="ajax/cancel_orders.js"></script>-->

<!--google tanslater-->
<script type="text/javascript">

function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'nl'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
$(document).ready(function(){

		$('#search_product').on('click',function (e){ 

		  var query = $("#search_text").val();      
		   //alert(query);
		   $.ajax({
		   url:"inc/search_process.php",
		   method:"POST",
		   data:{query:query},
		   success:function(data)
				   {
				 
				    $('#result').html(data);
				    $('#main_section').fadeOut();
				    

				   }
		  });

		 e.preventDefault();
		});


		$('#my_prod').on('click',function (e){ 
 
		   //alert(query);
		   $.ajax({
		   url:"inc/my_orders.php",
		   method:"POST",
		   success:function(data)
				   {
				 
				    $('#my_orders_result').html(data);
				    $('#main_section').fadeOut();
				    

				   }
		  });

		 e.preventDefault();
		});

});



</script>
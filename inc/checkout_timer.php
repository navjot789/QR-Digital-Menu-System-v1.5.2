<?php 

  $sql="select mins,secs from admin_login";
  $query=$conn->query($sql);
  $row=$query->fetch_array();

  ?>

<script type="text/javascript">
	//imort from checkout_disabled.js
	
		//Click event for disabled first time
	$("#check_out_cart").click(function() {
	  //Set local storage
	  var checkFirst = localStorage.hasOwnProperty('firstTime'); 
	  if (!checkFirst) {
	    localStorage.setItem('firstTime', true); //Set first time entry
	  }
	  //Disable for 10 seconds if its not a first time.
	  disableFor(<?php echo $row['mins'];?>, <?php echo $row['secs']; ?>)

	});
</script>
<script type="text/javascript">
	
//Disable checkout function
function disableFor(mins = null, secs = null) {

  var checkRevist = localStorage.getItem('firstTime'); 
  if (checkRevist == 'true') {
    window.location.href = 'inc/check_out_process.php'; //Redirect to thank you page.
    //Set it to false
    localStorage.setItem('firstTime', false); //Set first time entry
  } else {
    var i = [],
      play = [];
    var selector = $("#check_out_cart"),
      inDex = $(selector).index(),
      prevText = $("#timer").text();
    i[inDex] = 0;

  //Store seconds
  var inSeconds = mins * 60 + secs;

  //Get the previous stored seconds - check local storage
  var retrievedObject = localStorage.getItem('time');
  if (retrievedObject) {
    inSeconds = retrievedObject;
  }

  //Disable button
  $(selector).prop('disabled', true);

  play[inDex] = setInterval(function() {
    if (inSeconds > 60) {
      localStorage.setItem('time', inSeconds); //Set time again
      inSeconds = inSeconds - 1;
      var minutes = Math.floor(inSeconds / 60);
      var seconds = inSeconds % 60;
      if (minutes >= 1) {
        if (seconds.toString().length > 1) {
          $('#timer').html("<i class='fas fa-clock' ></i> " + minutes + ":" + seconds + " minutes left");
        } else {
          $('#timer').html("<i class='fas fa-clock' ></i> " + minutes + ":" + "0" + seconds + " minutes left");
        }
      } else {
        $('#timer').html("<i class='fas fa-clock' ></i> " + seconds + " seconds left");
      }
    } else {
      localStorage.setItem('time', inSeconds); //Set time again
      if (inSeconds > 1) {
        inSeconds = inSeconds - 1;
        if (inSeconds.toString().length > 1) {
          $('#timer').html("<i class='fas fa-clock' ></i> " + inSeconds + " seconds left");
        } else {
          $('#timer').html("<i class='fas fa-clock' ></i> " + "0" + inSeconds + " seconds left");
        }
      } else {
        window.location.href = 'inc/check_out_process.php'; //Redirect to thank you page.
        $(selector).prop("disabled", false);
        clearInterval(play[inDex]);
        $('#timer').html(prevText);
      }
    }
  }, 1000);
  }
}

//Checking on page reload if there is a time left - time > 0
$(function() {
  //Get the previous stored seconds - check local storage
  var retrievedObject = localStorage.getItem('time');
  if (retrievedObject) {
    //Check previous timer - if page reloaded.
    disableFor()
  }
});

//NOTE: WE REMOVE THE localStorage.removeItem('time') ON CHECKOUT.PHP page once order has been placed. this way page stop reloading  
	
</script>

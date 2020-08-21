<?php
//var_dump($_POST);
include('../../../inc/config/config.php');

	//var_dump($_POST);
	 $minutes = mysqli_real_escape_string($conn,$_POST['minutes']);
	 $seconds = mysqli_real_escape_string($conn,$_POST['seconds']);

//timer

	if(isset($minutes) && $minutes!=='')
	{
		$sql="update admin_login set mins='$minutes'";
		if($conn->query($sql))
		{
		 echo 'ok';
		}
	}else{
	 header('location:../../dashboard.php');
		exit();
	}

	if(isset($seconds) && $seconds!=='')
	{
		$sql="update admin_login set secs='$seconds'";
		if($conn->query($sql))
		{
		 echo 'ok';
		}
	}else{
	 header('location:../../dashboard.php');
		exit();
	}
	
	

	
?>
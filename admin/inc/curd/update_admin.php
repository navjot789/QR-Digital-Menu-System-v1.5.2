<?php
//var_dump($_POST);
include('../../../inc/config/config.php');

	 $uname = mysqli_real_escape_string($conn,$_POST['username']);
	 $pwd = mysqli_real_escape_string($conn,$_POST['password']);

	 $minutes = mysqli_real_escape_string($conn,$_POST['minutes']);
	 $seconds = mysqli_real_escape_string($conn,$_POST['seconds']);

	if(isset($uname) && $uname!=='')
	{
		$sql="update admin_login set username='$uname'";
		if($conn->query($sql))
		{
		 echo 'success';
		}
	}else{
	 header('location:../../dashboard.php');
		exit();
	}

	if(isset($pwd) && $pwd!=='')
	{
		$sql="update admin_login set password='$pwd', encrypt_type='TXT'";
		if($conn->query($sql))
		{
		 echo 'success';
			
		}
	}else
	{
	 header('location:../../dashboard.php');
		exit();
	}

//timer

	if(isset($minutes) && $minutes!=='')
	{
		$sql="update admin_login set mins='$uname'";
		if($conn->query($sql))
		{
		 echo 'ok';
		}
	}else{
	// header('location:../../dashboard.php');
		exit();
	}

	if(isset($seconds) && $seconds!=='')
	{
		$sql="update admin_login set secs='$uname'";
		if($conn->query($sql))
		{
		 echo 'ok';
		}
	}else{
	// header('location:../../dashboard.php');
		exit();
	}
	
	

	
?>
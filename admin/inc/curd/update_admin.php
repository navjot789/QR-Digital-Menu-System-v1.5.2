<?php
//var_dump($_POST);
include('../../../inc/config/config.php');

	 $uname = mysqli_real_escape_string($conn,$_POST['username']);
	 $pwd = mysqli_real_escape_string($conn,$_POST['password']);

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
		$sql="update admin_login set password='$pwd'";
		if($conn->query($sql))
		{
		 echo 'success';
			
		}
	}else
	{
	 header('location:../../dashboard.php');
		exit();
	}
	
	

	
?>
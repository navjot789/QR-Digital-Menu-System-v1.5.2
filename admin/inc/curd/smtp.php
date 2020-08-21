<?php
//var_dump($_POST);
include('../../../inc/config/config.php');

	 //var_dump($_POST);
	
	 $host = mysqli_real_escape_string($conn,$_POST['host']);
	 $h_username = mysqli_real_escape_string($conn,$_POST['h_username']);
	 $h_pass = mysqli_real_escape_string($conn,$_POST['h_pass']);
	 $s_mail = mysqli_real_escape_string($conn,$_POST['s_mail']);
	 $r_mail = mysqli_real_escape_string($conn,$_POST['r_mail']);

//smtp



	if(isset($host) && $host!=='')
	{
		$sql="update mailing set host='$host'";
		if($conn->query($sql))
		{
		 echo 'recevied';
		}

	}else{
	 header('location:../../dashboard.php');
		exit();
	}

	if(isset($h_username) && $h_username!=='')
	{
		$sql="update mailing set user_name='$h_username'";
		if($conn->query($sql))
		{
		 echo 'recevied';
		}

	}else{
	 header('location:../../dashboard.php');
		exit();
	}

	if(isset($h_pass) && $h_pass!=='')
	{
		$sql="update mailing set pass_word='$h_pass'";
		if($conn->query($sql))
		{
		 echo 'recevied';
		}

	}else{
	 header('location:../../dashboard.php');
		exit();
	}


	if(isset($s_mail) && $s_mail!=='')
	{
		$sql="update mailing set setFrom='$s_mail'";
		if($conn->query($sql))
		{
		 echo 'recevied';
		}

	}else{
	 header('location:../../dashboard.php');
		exit();
	}


	if(isset($r_mail) && $r_mail!=='')
	{
		$sql="update mailing set addAddress='$r_mail'";
		if($conn->query($sql))
		{
		 echo 'recevied';
		}

	}else{
	 header('location:../../dashboard.php');
		exit();
	}

	
	
	

	
?>
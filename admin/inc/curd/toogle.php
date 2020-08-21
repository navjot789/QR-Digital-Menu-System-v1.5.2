<?php
//var_dump($_POST);
include('../../../inc/config/config.php');

	// var_dump($_POST);
$toogle = mysqli_real_escape_string($conn,$_POST['toogle']);

	if(isset($toogle) && $toogle!=='')
		{
			$sql="update mailing set status='$toogle'";
			if($conn->query($sql))
			{
			 echo '<span style="color:green;">Email notifications are now '.$toogle.'</span>';
			}

		}else{
		 header('location:../../dashboard.php');
			exit();
		}
	
	

	
?>
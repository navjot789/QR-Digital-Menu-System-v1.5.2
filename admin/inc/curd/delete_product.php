<?php
	include('../../../inc/config/config.php');

	$id = $_GET['product'];
	$pic = $_GET['pic'];
//var_dump($_GET);

	$sql="delete from product where productid='$id'";
	
	$res = $conn->query($sql);

	  if($res)
	 {
	 	
		  if (file_exists('../../../upload/'.$pic)) {
			$deleted = unlink('../../../upload/'.$pic);
			header('location:../../dashboard.php?page=2'); 
		    exit();
		  }
		 else
		 {
			 header('location:../../dashboard.php?page=2'); 
			 exit();
		 }
		 
	 }


	?>
	
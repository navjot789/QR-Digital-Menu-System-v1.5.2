<?php
	include('../../../inc/config/config.php');

	$id = $_GET['product'];
	$pic = $_GET['pic'];
//var_dump($_GET);

	$sql="delete from product where productid='$id'";
	
	$res = $conn->query($sql);

	 if($res)
	 {
	 	$deleted = unlink('../../../upload/'.$pic);
	 	if($deleted)
	 	{
	 		header('location:../../dashboard.php?page=2');
	 	}
	 	

	 }


	?>
	
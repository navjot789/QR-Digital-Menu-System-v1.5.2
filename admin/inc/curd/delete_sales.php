<?php
	include('../../../inc/config/config.php');

	$id = $_POST['del_sale'];
	$truncate = $_POST['truncate_sales'];

	if(isset($id))
	{
		$sql="delete from purchase where purchaseid='$id'";
		$conn->query($sql);
		header('location:../../dashboard.php?page=5');
		exit();
	}

	if(isset($truncate) && $truncate == '1')
	{
		$sql="delete from purchase";
		$conn->query($sql);
		header('location:../../dashboard.php?page=5');
		exit();
	}

	

	?>
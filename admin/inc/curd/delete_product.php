<?php
	include('../../../inc/config/config.php');

	$id = $_GET['product'];

	$sql="delete from product where productid='$id'";
	$conn->query($sql);

	header('location:../../dashboard.php?page=2');

	?>
<?php
	include('../../../inc/config/config.php');

	$id = $_GET['category'];

	$sql="delete from category where categoryid='$id'";
	$conn->query($sql);

header('location:../../dashboard.php?page=3');
?>
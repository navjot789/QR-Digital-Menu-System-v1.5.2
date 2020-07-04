<?php
	include('../../../inc/config/config.php');

	$cname=$_POST['cname'];

	$sql="insert into category (catname) values ('$cname')";
	$conn->query($sql);

	header('location:../../dashboard.php?page=3');

?>
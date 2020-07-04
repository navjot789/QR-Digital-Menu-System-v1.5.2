<?php
include('../../../inc/config/config.php');

	echo $pu_id= $_POST['purchase_id'];

	$sql="UPDATE purchase SET seen = 1 WHERE purchaseid= '$pu_id'";
	$conn->query($sql);

	//header('location:../../dashboard.php?page=3');

?>
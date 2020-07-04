<?php
	include('../../../inc/config/config.php');

	$id=$_GET['product'];

	$pname=$_POST['pname'];
	$category=$_POST['category'];
	$price=$_POST['price'];
	$old_price=$_POST['old_price'];
	$desc= mysqli_real_escape_string($conn,$_POST['desc']);

	$sql="select * from product where productid='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['photo'];
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"../../../upload/" . $newFilename);
		$location=$newFilename;
	}

	$sql="update product set productname='$pname',description='$desc', categoryid='$category',old_price='$old_price', price='$price', photo='$location' where productid='$id'";
	$conn->query($sql);

	header('location:../../dashboard.php?page=2');
?>
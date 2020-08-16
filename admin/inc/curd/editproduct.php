<?php
	include('../../../inc/config/config.php');

	$id=mysqli_real_escape_string($conn,$_GET['product']);

	$pname=mysqli_real_escape_string($conn,$_POST['pname']);
	$category=mysqli_real_escape_string($conn,$_POST['category']);
	$price=mysqli_real_escape_string($conn,$_POST['price']);
	//$old_price=$_POST['old_price'];
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

	$sql="update product set productname='$pname',description='$desc', categoryid='$category', price='$price', photo='$location' where productid='$id'";
	$conn->query($sql);
 	$res = $conn->query($sql);

	 if($res)
	 {
	 	
	 	header('location:../../dashboard.php?page=2');

	 }
	
?>
<?php
	include('../../../inc/config/config.php');

	$pname=$_POST['pname'];
	$price=$_POST['price'];
	$category=$_POST['category'];
	$old_price=$_POST['old_price'];
	$desc= mysqli_real_escape_string($conn,$_POST['desc']);

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"../../../upload/" . $newFilename);
	$location= $newFilename;
	}
	
	$sql="insert into product (productname,description, categoryid, old_price, price, photo) values ('$pname','$desc', '$category','$old_price', '$price', '$location')";
	$conn->query($sql);

	header('location:../../dashboard.php?page=2');

?>
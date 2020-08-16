<?php
	include('../../../inc/config/config.php');


	$pname=mysqli_real_escape_string($conn,$_POST['pname']);
	$category=mysqli_real_escape_string($conn,$_POST['category']);
	$price=mysqli_real_escape_string($conn,$_POST['price']);
	//$old_price=$_POST['old_price'];
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
	
	$sql="insert into product(productname,description, categoryid, price, photo) values ('$pname','$desc', '$category', '$price', '$location')";
	 $res = $conn->query($sql);

	 if($res)
	 {
	 	header('location:../../dashboard.php?page=2');

	 }

	

?>
<?php
	include('../../../inc/config/config.php');

	$id = $_POST['del_bill'];
	

	if(isset($id))
	{
		$fetch="select guest_code from guest where gid='$id'";
		$res = $conn->query($fetch);
		$data =mysqli_fetch_array($res);
		if($data)
		{
			$custID = $data['guest_code'];

			$query="delete from guest where gid='".$custID."'";
		    $main = $conn->query($query);

		   if($main)
		   {
		   	 $sql="delete from purchase where guest_code='".$custID."'";
		     $result = $conn->query($sql);
		   }

		   
		}


		header('location:../../dashboard.php?page=4');
		exit();
	}

	

	

	?>
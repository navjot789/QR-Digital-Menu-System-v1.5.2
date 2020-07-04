<?php
ob_start();
session_start();

if(isset($_SESSION['admin']))
{
	   	   unset($_SESSION['admin']);
		   session_destroy();

  	   header('location:index.php');

}
else
{
	
	
	session_destroy();
	header("refresh:3;url=index.php" );
	echo "Redirect in 3 seconds";
}

?>
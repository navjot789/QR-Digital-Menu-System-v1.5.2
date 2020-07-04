<?php
session_start();

if(isset($_SESSION['CODE'],$_SESSION['MATES'],$_SESSION['TABLE_NO']))
{
	if (isset($_COOKIE['CODE'])) 
	{
	  
	    unset($_COOKIE['CODE']); 
	    unset($_COOKIE['TABLE_NO']); 
	   
	    setcookie('CODE', FALSE, -1, '/');
	    setcookie('TABLE_NO', FALSE, -1, '/');

	   	  
		   unset($_SESSION['CODE']); 
		   unset($_SESSION['MATES']);
		   unset($_SESSION['TABLE_NO']); 
		   session_destroy();

  	   header('location:../index.php');
	 
	} 

	   


}
else
{
	//emergency or direct access
	
	setcookie('CODE', FALSE, -1, '/');
	setcookie('TABLE_NO', FALSE, -1, '/');
	session_destroy();
	header("refresh:3;url=../index.php" );
	echo "Redirect in 3 seconds";
}

?>
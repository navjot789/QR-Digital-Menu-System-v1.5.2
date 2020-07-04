<?php
//sesstion restart
if(!isset($_SESSION['CODE'],$_SESSION['MATES'],$_SESSION['TABLE_NO']))
{

	 $_SESSION['MATES'] = 1;
	
	if(isset($_COOKIE['CODE'],$_COOKIE['TABLE_NO']))
	{
		$_SESSION['CODE'] = $_COOKIE['CODE'];
		$_SESSION['TABLE_NO'] = $_COOKIE['TABLE_NO'];
	}

}
?>
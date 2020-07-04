<?php
include('config/config.php');

extract($_POST);
//var_dump($_POST);

if(empty($mates) || empty($tbl_no))
{
	echo "Vul beide velden in aub";
}
else if(!intval($tbl_no))
{
  echo "Sorry, tafel number moet een getal zijn";
}else
{
	
	$session_code =  "CUST" . rand(10000,99999999);
	$_SESSION['CODE'] = $session_code;

	$_SESSION['MATES'] = $mates;
	$_SESSION['TABLE_NO'] = $tbl_no;
	

      $expiry = time() + 86400 ; //one day = 86400 sec
      //setcookie('REP_NAME', $_SESSION['REP_NAME'], $expiry, "/");
      setcookie('CODE', $_SESSION['CODE'], $expiry, "/");
      setcookie('TABLE_NO', $_SESSION['TABLE_NO'], $expiry, "/");

      // 'Force' the cookie to exists
		//$_COOKIE['REP_NAME'] = $_SESSION['REP_NAME'];
		$_COOKIE['CODE'] = $_SESSION['CODE'];
		$_COOKIE['TABLE_NO'] = $_SESSION['TABLE_NO'];
    
    if(isset($_SESSION['CODE'],$_SESSION['MATES'],$_SESSION['TABLE_NO']))
    {
		    if(isset($_COOKIE['CODE'],$_COOKIE['TABLE_NO']))
		    {
		    	

  					// prepare and bind
						$stmt = $conn->prepare("INSERT INTO guest(guest_code,reserve_for,table_no,cdate) VALUES (?, ?, ?, ?)");
						$stmt->bind_param("siis", $_SESSION['CODE'],$_SESSION['MATES'],$_SESSION['TABLE_NO'],$current_date_time);
					 
					if($_SESSION['MATES'] <= 0 || $_SESSION['MATES'] =='')
					{
						$_SESSION['MATES']= 1;
					}
					else
					{
						if($stmt->execute())
					    {
					    	 echo "success";
					    
					    }else
					    {
					    
						    	echo 'Sorry, foutje bij uw bestelling. Vraag hulp aan uw kelner';
						      
					    }
					}

						
					    

		    }
		    else
		    {
		    	echo 'ERROR: CANNOT SET $_COOKIES';
		    }

    }else
    {
    	echo 'ERROR: CANNOT SET $_SESSION';
    }
}

?>
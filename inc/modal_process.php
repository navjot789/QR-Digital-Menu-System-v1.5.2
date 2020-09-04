<?php
include('config/config.php');

extract($_POST);
//var_dump($_POST);

$stmt2 = $conn->prepare("SELECT status, ctime FROM reset_counter");  //Getting time from resetcount for prevent login when admin reset the tables..
$stmt2->execute();
$stmt2->store_result();  
$stmt2->bind_result($status,$ctime);
$stmt2->fetch();
$db_time = array('stats' => $status,'reset_db_time' => $ctime);



$created = $db_time['reset_db_time']; // time that you want the link to expire 
$expire_date = date('d-m-Y H:i',strtotime('+5 minutes',strtotime($created))); //added +5 minute into the db time
//+1 day = adds 1 day
//+1 hour = adds 1 hour
//+10 minutes = adds 10 minutes
//+10 seconds = adds 10 seconds
//To sub-tract time its the same except a - is used instead of a +

$now = date("d-m-Y H:i:s");

if(isset($db_time['reset_db_time'],$db_time['stats']) && $db_time['stats'] == 1 && $db_time['reset_db_time'] == 0 )
{ //if admin install script first time

					if(empty($mates) || empty($tbl_no))
					{
						echo "Please fill in both fields.";
					}
					else if(!intval($tbl_no))
					{
					  echo "Sorry, table number must be a number.";
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
													$stmt = $conn->prepare("INSERT INTO guest(guest_code,reserve_for,table_no,cdate,ctime) VALUES (?, ?, ?, ?, ?)");
													$stmt->bind_param("siiss", $_SESSION['CODE'],$_SESSION['MATES'],$_SESSION['TABLE_NO'],$current_date,$current_time);
												 
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
												    
													    	echo 'Sorry, mistake with your order. Ask your waiter for help.';

													      
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
	
}
else //on the second load of entire scipt
{
	if( $now > $expire_date) //reset critical time expired now guest can create new temp accounts
		{

					if(empty($mates) || empty($tbl_no))
					{
						echo "Please fill in both fields.";
					}
					else if(!intval($tbl_no))
					{
					  echo "Sorry, table number must be a number.";
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
													$stmt = $conn->prepare("INSERT INTO guest(guest_code,reserve_for,table_no,cdate,ctime) VALUES (?, ?, ?, ?, ?)");
													$stmt->bind_param("siiss", $_SESSION['CODE'],$_SESSION['MATES'],$_SESSION['TABLE_NO'],$current_date,$current_time);
												 
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
												    
													    	echo 'Sorry, mistake with your order. Ask your waiter for help.';

													      
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



		}
		else
		{
		   echo 'ERROR: Reset applied, please wait for 5 mins.';
		}
}





?>
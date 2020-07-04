<?php
include('../../inc/config/config.php');

// Code for User login

if(isset($_POST['username'],$_POST['password']))
{
   $username= mysqli_real_escape_string($conn,$_POST['username']);
   $password= mysqli_real_escape_string($conn,$_POST['password']);
   //$remember= mysqli_real_escape_string($conn,$_POST['remember']);

    
	if($username =='' || $password=='')
		{
  			echo "Both fields required.";
		}

	 else{


					$stmt = $conn->prepare("SELECT aid,username,password FROM admin_login WHERE username= ? AND password = ?");
                       
                        $stmt->bind_param('ss',$username, $password);
                        $stmt->execute();
                        $stmt->store_result();    
                        $stmt->bind_result($aid, $username, $password);
                      if($stmt->num_rows > 0)
                       {
		  					$stmt->fetch();
		  					$value  = array('aid' =>$aid,'user' =>$username,'pass'=> $password );
							  //if record found
								$_SESSION["admin"] = $value['aid'];
								

      							//if($remember == 1 && !empty($remember))
      							//{
      							//	$expiry =  time() + 3600 * 24 * 30; //one day 
      							//	setcookie('username', $value['user'], $expiry, "/");
      							//	$_COOKIE[ 'username' ] = $value['user'];
      							//	setcookie('password', $value['pass'], $expiry, "/");
      							//	$_COOKIE[ 'password' ] = $value['pass'];
      							//}

								echo "success";
								//header("location:myprofile.php");
								//exit();
						}
						else
						{
							
				         echo "Invalid username or password.";
						}

		   }
		    
	 }else
	 {
	 	header("location:../index.php");
		exit();
	 } 


?>
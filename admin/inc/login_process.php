<?php
include('../../inc/config/config.php');

// Code for User login

if(isset($_POST['username'],$_POST['password'],$_POST['password_encryption']))
{
   $username= mysqli_real_escape_string($conn,$_POST['username']);
   $password= mysqli_real_escape_string($conn,$_POST['password']);
   $password_encryption= mysqli_real_escape_string($conn,$_POST['password_encryption']);
   //$remember= mysqli_real_escape_string($conn,$_POST['remember']);

    
	if($username =='' || $password=='')
		{
  			echo "Both fields required.";
		}

	 else{

              if($password_encryption == 'MD5')
              {

					$stmt = $conn->prepare("SELECT aid,username,password FROM admin_login WHERE username= ? AND password = ?");
                    $password = md5($password);
                    $stmt->bind_param('ss',$username, $password);
					//OR password = AES_DECRYPT(?,'".PASSWORDS_ENCRYPT_KEY."')

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
					else if($password_encryption == 'AES')
					{
						$stmt = $conn->prepare("SELECT aid,username, AES_DECRYPT(password,'".PASSWORDS_ENCRYPT_KEY."') FROM admin_login WHERE username= ? AND password= AES_ENCRYPT(?,'".PASSWORDS_ENCRYPT_KEY."')");

	                    $stmt->bind_param('ss',$username,$password);
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
					else if($password_encryption == 'TXT')
					{
						
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

		   }
		    
	 }else
	 {
	 	header("location:../index.php");
		exit();
	 } 


?>
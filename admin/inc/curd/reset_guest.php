<?php
	include('../../../inc/config/config.php');

	$cmd = $_GET['cmd'];

if(isset($cmd))
{
	$stmt2 = $conn->prepare("SELECT gid FROM guest");
	$stmt2->execute();
	$stmt2->store_result();    

	if($stmt2->num_rows > 0)
	{	

		$stmt2->close();

			
				if($cmd = TRUE)
				{
					$sql="delete from guest";
					$res = $conn->query($sql);
		           
		           if($res)
		           {
		           			$status =1;
							$timestamp =$current_date.' '.$current_time; 
								$stmt = $conn->prepare("UPDATE reset_counter SET status= ?, ctime= ? WHERE 1=1");
								$stmt->bind_param("is", $status,$timestamp);
							 	if($stmt->execute())
	         					{
	         						$stmt->close();
								 	header('location:../../dashboard.php?page=1');
								 	exit();
	         					}
	         					else
								{
									echo 'Error: Status update.';
								}
						           	

		           }
								


					
				}
				else
				{
					echo 'Error: Resetting the Total Guests.';
				}
		

		}
		else
		{
			echo 'Error: Reset already applied or zero guest login.';
		}
		

	}

	?>
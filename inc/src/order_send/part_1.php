
<?php
$order = $conn->prepare("SELECT guest_code,reserve_for,table_no FROM guest WHERE guest_code= ?");
$order->bind_param("s",$_COOKIE['CODE']); 
$order->bind_result($guest_code,$reserve_for,$tb);
$order->store_result();
	$order->execute();
	$order->fetch();
	$row =array('guest_code'=>$guest_code,'reserve_for'=>$reserve_for,'tb'=>$tb);
	$order->close();

$body ='';
$name_of_restaurant = "@company name";
$date = ucwords(strftime("%a %d %B %Y", strtotime($current_date)));
$time = ucwords(strftime("%X", strtotime($current_time)));

$body .='<!DOCTYPE html>
								<html>

								<head>
									<title></title>
									<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
									<meta name="viewport" content="width=device-width, initial-scale=1">
									<meta http-equiv="X-UA-Compatible" content="IE=edge" />

									<link rel="stylesheet" type="text/css" href="check_out_process.css">
									<style>
									#customers {
									  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
									  border-collapse: collapse;
									  width: 100%;
									}

									#customers td, #customers th {
									  border: 1px solid #ddd;
									  padding: 8px;
									}

									#customers tr:nth-child(even){background-color: #f2f2f2;}

									#customers tr:hover {background-color: #ddd;}

									#customers th {
									  padding-top: 12px;
									  padding-bottom: 12px;
									  text-align: left;
									  background-color: #4CAF50;
									  color: white;
									}

									.badge
									{
										display: inline-block;
									    min-width: 10px;
									    padding: 3px 7px;
									    font-size: 12px;
									    font-weight: 700;
									    line-height: 1;
									    color: #fff;
									    text-align: center;
									    white-space: nowrap;
									    vertical-align: middle;
									    background-color: #777;
									    border-radius: 10px;
									}
									</style>

								</head>

								<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">


									<table border="0" cellpadding="0" cellspacing="0" width="100%">
									
										<tr>
											<td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;margin-top:30px;">
																<tr>
																	<td bgcolor="#4CAF50" align="center" style="padding: 0px 10px 0px 10px;">
																		'.$name_of_restaurant.'
																	</td>
																</tr>

													<tr>
														<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family:  Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">

															<p style="font-size:18px;"><strong>Customer details</strong> <span style="float:right;"><strong>Date:</strong> 
															'.$date.' '.$time.'</span>
															</p>

															<p style="margin: 0;"><strong>CID:</strong> '.$row['guest_code'].'</p>
															<p style="margin: 0;"><strong>People:</strong>'.$row['reserve_for'].'</p>
															<p style="margin: 0;"><strong>Table Number:</strong> '.$row['tb'].'</p>
														</td>
													</tr>';
?>
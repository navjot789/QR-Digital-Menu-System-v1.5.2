<?php
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
									</style>

								</head>

								<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">


									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td bgcolor="#4CAF50" align="center" style="padding: 0px 10px 0px 10px;">
												Nieuwe bestelling voor De Smaak van Afrika
											</td>
										</tr>
										<tr>
											<td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
													<tr>
														<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family:  Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">

															<p style="font-size: 23px;"><strong>Customer details</strong> <span style="float:right;"><strong>Date:</strong> '.date("F jS, Y", strtotime($current_date)).' </span></p>
															<p style="margin: 0;"><strong>CID:</strong> '.$row['guest_code'].'</p>
															<p style="margin: 0;"><strong>People:</strong>'.$row['reserve_for'].'</p>
															<p style="margin: 0;"><strong>Table Number:</strong> '.$row['table_no'].'</p>
														</td>
													</tr>';
?>
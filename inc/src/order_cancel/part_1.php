<?php
$body .='<!DOCTYPE html>
					<html>

					<head>
						<title></title>
						<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<meta http-equiv="X-UA-Compatible" content="IE=edge" />

						<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
							<!-- LOGO -->
							<tr>
								<td bgcolor="#f70606" align="center">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
										<tr>
											<td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#f70606" align="center" style="padding: 0px 10px 0px 10px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
										<tr>
											<td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family:  Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
												<h1 style="font-size: 48px; font-weight: 400; margin: 2;">Order cancelled!</h1> <img src="https://imagehost.com.au//d7amw0Kd9r/X-delete-round-flat-icon-free-download_1x_5ecf84bebb93e.png" width="125" height="120" style="display: block; border: 0px;" />
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">';

										$body .='<tr>
											<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family:  Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">

												<p style="font-size: 23px;"><strong>Customer details</strong> <span style="float:right;"><strong>Date:</strong> '.date("F jS, Y", strtotime($current_date_time)).' </span></p>
															<p style="margin: 0;"><strong>Client ID:</strong> '.$row['guest_code'].'</p>
															<p style="margin: 0;"><strong>Number of Peoples:</strong>'.$row['reserve_for'].'</p>
															<p style="margin: 0;"><strong>Table Number:</strong> '.$row['table_no'].'</p>
														</td>
											
										</tr>';
?>
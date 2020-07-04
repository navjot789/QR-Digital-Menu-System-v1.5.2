<?php include('config/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>QRcode voor restaurants</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="-1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
	<style type="text/css">
		.popover
		{
		    width: 100%;
		    max-width: 800px;
		}
		.product{
			border: 1px solid #dddddd;
			height: 321px;
		}

		.product>img{
			max-width: 230px;
		}

		.product-rating{
			font-size: 20px;
			margin-bottom: 25px;
		}

		.product-title{
			font-size: 20px;
		}

		.product-desc{
			font-size: 14px;
		}

		.product-price{
			font-size: 22px;
		}

		.product-stock{
			color: #74DF00;
			font-size: 20px;
			margin-top: 10px;
		}

		.product-info{
				margin-top: 50px;
		}

		/*********************************************
							VIEW
		*********************************************/

		.content-wrapper {
			max-width: 1140px;
			background: #fff;
			margin: 0 auto;
			margin-top: 25px;
			margin-bottom: 10px;
			border: 0px;
			border-radius: 0px;
		}

		.container-fluid{
			max-width: 1140px;
			margin: 0 auto;
		}

		.view-wrapper {
			float: right;
			max-width: 70%;
			margin-top: 25px;
		}

		.container {
			padding-left: 0px;
			padding-right: 0px;
			max-width: 100%;
		}

		/*********************************************
						ITEM 
		*********************************************/

		.service1-items {
			padding: 0px 0 0px 0;
			float: left;
			position: relative;
			overflow: hidden;
			max-width: 100%;
			height: 321px;
			width: 130px;
		}

		.service1-item {
			height: 107px;
			width: 120px;
			display: block;
			float: left;
			position: relative;
			padding-right: 20px;
			border-right: 1px solid #DDD;
			border-top: 1px solid #DDD;
			border-bottom: 1px solid #DDD;
		}

		.service1-item > img {
			max-height: 110px;
			max-width: 110px;
			opacity: 0.6;
			transition: all .2s ease-in;
			-o-transition: all .2s ease-in;
			-moz-transition: all .2s ease-in;
			-webkit-transition: all .2s ease-in;
		}

		.service1-item > img:hover {
			cursor: pointer;
			opacity: 1;
		}

		.service-image-left {
			padding-right: 50px;
		}

		.service-image-right {
			padding-left: 50px;
		}

		.service-image-left > center > img,.service-image-right > center > img{
			max-height: 155px;
		}

        body{
        	background: #f4f4f4;
        }
		img {
		
		object-fit: cover;
			background-size: cover;
		}
		.popover{
		position: fixed;
		}

	</style>
</head>
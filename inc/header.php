<?php include('config/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>QR Digital Menu System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="https://img.icons8.com/color/2x/cocktail.png"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<link href="inc/css/search.css" rel="stylesheet">
    
	<style type="text/css">
		
		html {
		  scroll-behavior: smooth;
		 }
		 

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

		/*********************************************
						fixing white space issue from right 
		*********************************************/
		.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
		   
		    min-height: 0px;
		 
		}

	</style>
</head>
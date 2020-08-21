<?php include('../inc/config/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	
<?php
	$page = isset($_GET['page'])?$_GET['page']:'1';

		switch($page)
		{
		    case '1':
		        $title = 'Dashboard';
		        $icon = '<i class="fas fa-tachometer-alt"></i>';
		        $content = "inc/home.php"; 
		        break;
		    case '2':
		        $title = 'Products';
		        $icon = '<i class="fas fa-cart-plus"></i>';
		        $content = "inc/product.php"; 
		        break;
		    case '3':
		        $title = 'Category';
		         $icon = '<i class="fas fa-align-justify"></i>';
		        $content = "inc/category.php"; 
		        break;
 		    case '4':
		        $title = 'History';
		        $icon = '<i class="fas fa-history"></i>';
		        $content = "inc/bill_history.php"; 
		        break;
				
			 case '5':
		        $title = 'Sales';
		        $icon = '<i class="fas fa-chart-line"></i>';
		        $content = "inc/sales.php"; 
		        break;	
				
			case '6':
		        $title = 'Settings';
		        $icon = '<i class="fas fa-tools"></i>';
		        $content = "inc/settings.php"; 
		        break;		

		    default :
			     $title = 'Dashboard';
			     $icon = '<i class="fas fa-tachometer-alt"></i>';
			     $content = "inc/home.php"; 
			     break;
		}
?>

	<title><?php echo $title;?></title>


	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="https://img.icons8.com/fluent/48/000000/data-configuration.png"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	
	<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap.min.css" rel="stylesheet">
	

	 <!--Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 	
 	<!--Latest compiled and minified CSS of switch toggle -->
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"><!--https://www.bootstraptoggle.com/-->	

	<!------ Include the https://tailwindcss.com/docs/installation ---------->
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<!------ Include the above in your HEAD tag ---------->
	<style type="text/css">
		h1.page-header {
		margin-top: -5px;
	}

	.sidebar {
		padding-left: 0;
	}

	.main-container { 
		background: #FFF;
		padding-top: 15px;
		margin-top: -20px;
	}

	.footer {
		width: 100%;
	}  

	:focus {
		outline: none;
	}

	.side-menu {
		position: relative;
		width: 100%;
		height: 100%;
		background-color: #f8f8f8;
		border-right: 1px solid #e7e7e7;
	}
	.side-menu .navbar {
		border: none;
	}
	.side-menu .navbar-header {
		width: 100%;
		border-bottom: 1px solid #e7e7e7;
	}
	.side-menu .navbar-nav .active a {
		background-color: transparent;
		margin-right: -1px;
		border-right: 5px solid #e7e7e7;
	}
	.side-menu .navbar-nav li {
		display: block;
		width: 100%;
		border-bottom: 1px solid #e7e7e7;
	}
	.side-menu .navbar-nav li a {
		padding: 15px;
	}
	.side-menu .navbar-nav li a .glyphicon {
		padding-right: 10px;
	}
	.side-menu #dropdown {
		border: 0;
		margin-bottom: 0;
		border-radius: 0;
		background-color: transparent;
		box-shadow: none;
	}
	.side-menu #dropdown .caret {
		float: right;
		margin: 9px 5px 0;
	}
	.side-menu #dropdown .indicator {
		float: right;
	}
	.side-menu #dropdown > a {
		border-bottom: 1px solid #e7e7e7;
	}
	.side-menu #dropdown .panel-body {
		padding: 0;
		background-color: #f3f3f3;
	}
	.side-menu #dropdown .panel-body .navbar-nav {
		width: 100%;
	}
	.side-menu #dropdown .panel-body .navbar-nav li {
		padding-left: 15px;
		border-bottom: 1px solid #e7e7e7;
	}
	.side-menu #dropdown .panel-body .navbar-nav li:last-child {
		border-bottom: none;
	}
	.side-menu #dropdown .panel-body .panel > a {
		margin-left: -20px;
		padding-left: 35px;
	}
	.side-menu #dropdown .panel-body .panel-body {
		margin-left: -15px;
	}
	.side-menu #dropdown .panel-body .panel-body li {
		padding-left: 30px;
	}
	.side-menu #dropdown .panel-body .panel-body li:last-child {
		border-bottom: 1px solid #e7e7e7;
	}
	.side-menu #search-trigger {
		background-color: #f3f3f3;
		border: 0;
		border-radius: 0;
		position: absolute;
		top: 0;
		right: 0;
		padding: 15px 18px;
	}
	.side-menu .brand-name-wrapper {
		min-height: 50px;
	}
	.side-menu .brand-name-wrapper .navbar-brand {
		display: block;
	}
	.side-menu #search {
		position: relative;
		z-index: 1000;
	}
	.side-menu #search .panel-body {
		padding: 0;
	}
	.side-menu #search .panel-body .navbar-form {
		padding: 0;
		padding-right: 50px;
		width: 100%;
		margin: 0;
		position: relative;
		border-top: 1px solid #e7e7e7;
	}
	.side-menu #search .panel-body .navbar-form .form-group {
		width: 100%;
		position: relative;
	}
	.side-menu #search .panel-body .navbar-form input {
		border: 0;
		border-radius: 0;
		box-shadow: none;
		width: 100%;
		height: 50px;
	}
	.side-menu #search .panel-body .navbar-form .btn {
		position: absolute;
		right: 0;
		top: 0;
		border: 0;
		border-radius: 0;
		background-color: #f3f3f3;
		padding: 15px 18px;
	}
	/* Main body section */
	.side-body {
		margin-left: 310px;
	}
	/* small screen */
	@media (max-width: 768px) {
		.side-menu {
			position: relative;
			width: 100%;
			height: 0;
			border-right: 0;
		}

		.side-menu .navbar {
			z-index: 999;
			position: relative;
			height: 0;
			min-height: 0;
			background-color:none !important;
			border-color: none !important;
		}
		.side-menu .brand-name-wrapper .navbar-brand {
			display: inline-block;
		}
		/* Slide in animation */
		@-moz-keyframes slidein {
			0% {
				left: -300px;
			}
			100% {
				left: 10px;
			}
		}
		@-webkit-keyframes slidein {
			0% {
				left: -300px;
			}
			100% {
				left: 10px;
			}
		}
		@keyframes slidein {
			0% {
				left: -300px;
			}
			100% {
				left: 10px;
			}
		}
		@-moz-keyframes slideout {
			0% {
				left: 0;
			}
			100% {
				left: -300px;
			}
		}
		@-webkit-keyframes slideout {
			0% {
				left: 0;
			}
			100% {
				left: -300px;
			}
		}
		@keyframes slideout {
			0% {
				left: 0;
			}
			100% {
				left: -300px;
			}
		}
	/* Slide side menu*/
	/* Add .absolute-wrapper.slide-in for scrollable menu -> see top comment */
	.side-menu-container > .navbar-nav.slide-in {
		-moz-animation: slidein 300ms forwards;
		-o-animation: slidein 300ms forwards;
		-webkit-animation: slidein 300ms forwards;
		animation: slidein 300ms forwards;
		-webkit-transform-style: preserve-3d;
		transform-style: preserve-3d;
	}
	.side-menu-container > .navbar-nav {
		/* Add position:absolute for scrollable menu -> see top comment */
		position: fixed;
		left: -300px;
		width: 300px;
		top: 43px;
		height: 100%;
		border-right: 1px solid #e7e7e7;
		background-color: #f8f8f8;
		overflow: auto;
		-moz-animation: slideout 300ms forwards;
		-o-animation: slideout 300ms forwards;
		-webkit-animation: slideout 300ms forwards;
		animation: slideout 300ms forwards;
		-webkit-transform-style: preserve-3d;
		transform-style: preserve-3d;
	}
	@-moz-keyframes bodyslidein {
		0% {
			left: 0;
		}
		100% {
			left: 300px;
		}
	}
	@-webkit-keyframes bodyslidein {
		0% {
			left: 0;
		}
		100% {
			left: 300px;
		}
	}
	@keyframes bodyslidein {
		0% {
			left: 0;
		}
		100% {
			left: 300px;
		}
	}
	@-moz-keyframes bodyslideout {
		0% {
			left: 300px;
		}
		100% {
			left: 0;
		}
	}
	@-webkit-keyframes bodyslideout {
		0% {
			left: 300px;
		}
		100% {
			left: 0;
		}
	}
	@keyframes bodyslideout {
		0% {
			left: 300px;
		}
		100% {
			left: 0;
		}
	}
	/* Slide side body*/
	.side-body {
		margin-left: 5px;
		margin-top: 70px;
		position: relative;
		-moz-animation: bodyslideout 300ms forwards;
		-o-animation: bodyslideout 300ms forwards;
		-webkit-animation: bodyslideout 300ms forwards;
		animation: bodyslideout 300ms forwards;
		-webkit-transform-style: preserve-3d;
		transform-style: preserve-3d;
	}
	.body-slide-in {
		-moz-animation: bodyslidein 300ms forwards;
		-o-animation: bodyslidein 300ms forwards;
		-webkit-animation: bodyslidein 300ms forwards;
		animation: bodyslidein 300ms forwards;
		-webkit-transform-style: preserve-3d;
		transform-style: preserve-3d;
	}
	/* Hamburger */
	.navbar-toggle-sidebar {
		border: 0;
		float: left;
		padding: 18px;
		margin: 0;
		border-radius: 0;
		background-color: #f3f3f3;
	}
	/* Search */
	#search .panel-body .navbar-form {
		border-bottom: 0;
	}
	#search .panel-body .navbar-form .form-group {
		margin: 0;
	}
	.side-menu .navbar-header {
		/* this is probably redundant */
		position: fixed;
		z-index: 3;
		background-color: #f8f8f8;
	}
	/* Dropdown tweek */
	#dropdown .panel-body .navbar-nav {
		margin: 0;
	}
}
	/* cards for dashboard */
	.notice {
		padding: 15px;
		background-color: #fafafa;
		border-left: 6px solid #7f7f84;
		margin-bottom: 10px;
		-webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
		   -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
				box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
	}
	.notice-sm {
		padding: 10px;
		font-size: 80%;
	}
	.notice-lg {
		padding: 35px;
		font-size: large;
	}
	.notice-success {
		border-color: #80D651;
	}
	.notice-success>strong {
		color: #80D651;
	}
	.notice-info {
		border-color: #45ABCD;
	}
	.notice-info>strong {
		color: #45ABCD;
	}
	.notice-warning {
		border-color: #FEAF20;
	}
	.notice-warning>strong {
		color: #FEAF20;
	}
	.notice-danger {
		border-color: #d73814;
	}
	.notice-danger>strong {
		color: #d73814;
	}
		
	
	</style>
</head>
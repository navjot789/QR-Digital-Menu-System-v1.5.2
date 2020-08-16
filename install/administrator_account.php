<?php
################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 #
## --------------------------------------------------------------------------- #
##  ApPHP EasyInstaller Pro version                                            #
##  Developed by:  ApPHP <info@apphp.com>                                      #
##  License:       GNU LGPL v.3                                                #
##  Site:          https://www.apphp.com/php-easyinstaller/                    #
##  Copyright:     ApPHP EasyInstaller (c) 2009-2013. All rights reserved.     #
##                                                                             #
################################################################################

	session_start();
	
	require_once('include/shared.inc.php');    
    require_once('include/settings.inc.php');    
	require_once('include/functions.inc.php');
	require_once('include/languages.inc.php');	

	$task = isset($_POST['task']) ? prepare_input($_POST['task']) : '';
	$passed_step = isset($_SESSION['passed_step']) ? (int)$_SESSION['passed_step'] : 0;
	$focus_field = 'admin_username';
	$error_msg = '';
	
	// handle previous steps
	// -------------------------------------------------
	if($passed_step >= 3){
		// OK
	}else{
		header('location: start.php');
		exit;				
	}
	
	// handle form submission
	// -------------------------------------------------
	if($task == 'send'){

		// skip this step if admin account is not required
		if(!EI_USE_ADMIN_ACCOUNT){
			$_SESSION['admin_username'] = '';
			$_SESSION['admin_password'] = '';
			$_SESSION['admin_email'] = '';
			$_SESSION['password_encryption'] = '';
			
			$_SESSION['passed_step'] = 4;
			header('location: ready_to_install.php');
			exit;
		}

		$admin_username = isset($_POST['admin_username']) ? prepare_input($_POST['admin_username']) : '';
		$admin_password = isset($_POST['admin_password']) ? prepare_input($_POST['admin_password']) : '';
		$admin_email = isset($_POST['admin_email']) ? prepare_input($_POST['admin_email']) : '';
		$password_encryption = isset($_POST['password_encryption']) ? prepare_input($_POST['password_encryption']) : EI_PASSWORD_ENCRYPTION_TYPE;

		// validation here
		// -------------------------------------------------
		if($admin_username == ''){
			$focus_field = 'admin_username';
			$error_msg = lang_key('alert_admin_username_empty');	
		}else if($admin_password == ''){
			$focus_field = 'admin_password';
			$error_msg = lang_key('alert_admin_password_empty');				
		}else if($admin_email != '' && !is_email($admin_email)){
			$focus_field = 'admin_email';
			$error_msg = lang_key('alert_admin_email_wrong');				
		}else{

			if(EI_MODE == 'demo'){
				if($admin_username != 'test' || $admin_password != 'test'){
					$error_msg = lang_key('alert_wrong_testing_parameters');
				}
			}

			if(empty($error_msg)){
				$_SESSION['admin_username'] = $admin_username;
				$_SESSION['admin_password'] = $admin_password;
				$_SESSION['admin_email'] = $admin_email;
				$_SESSION['password_encryption'] = $password_encryption;				

				$_SESSION['passed_step'] = 4;
				header('location: ready_to_install.php');
				exit;
			}
		}
	}else{
		$admin_email = isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : '';
		$admin_username = isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : '';
		$admin_password = isset($_SESSION['admin_password']) ? $_SESSION['admin_password'] : '';
		$password_encryption = isset($_SESSION['password_encryption']) ? $_SESSION['password_encryption'] : EI_PASSWORD_ENCRYPTION_TYPE;
		$install_type = isset($_SESSION['install_type']) ? $_SESSION['install_type'] : '';
		
		// skip administrator settings
		if($install_type == 'un-install'){
			$_SESSION['passed_step'] = 3;
			header('location: database_settings.php');					
		}
	}

?>	

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="ApPHP Company - Advanced Power of PHP">
    <meta name="generator" content="ApPHP EasyInstaller">
	<title><?php echo lang_key("installation_guide"); ?> | <?php echo lang_key('administrator_account'); ?></title>

	<link href="images/apphp.ico" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="templates/<?php echo EI_TEMPLATE; ?>/css/styles.css" />
	<?php
		if($curr_lang_direction == 'rtl'){
			echo '<link rel="stylesheet" type="text/css" href="templates/'.EI_TEMPLATE.'/css/rtl.css" />'."\n";
		}
	?>

	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<?php
		if(file_exists('languages/js/'.$curr_lang.'.js')){
			echo '<script type="text/javascript" src="language/'.$curr_lang.'/js/common.js"></script>';
		}else{
			echo '<script type="text/javascript" src="language/en/js/common.js"></script>';
		}
	?>
</head>
<body onload="bodyOnLoad()">
<div id="main">
	<h1><?php echo lang_key('new_installation_of'); ?> <?php echo EI_APPLICATION_NAME.' '.EI_APPLICATION_VERSION;?>!</h1>
	<h2 class="sub-title"><?php echo lang_key('sub_title_message'); ?></h2>
	
	<div id="content">
		<?php
			draw_side_navigation(4);		
		?>
		<div class="central-part">
			<h2><?php echo lang_key('step_4_of'); ?> - <?php echo lang_key('administrator_account'); ?></h2>
			<h3><?php echo lang_key('admin_access_data'); ?></h3>

			<form action="administrator_account.php" method="post">
			<input type="hidden" name="task" value="send" />
			<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
			
			<?php
				if(!empty($error_msg)){
					echo '<div class="alert alert-error">'.$error_msg.'</div>';
				}
			?>

			<table width="100%" border="0" cellspacing="1" cellpadding="1">
			<?php if(EI_USE_ADMIN_ACCOUNT){ ?>
			<tr>
				<td colspan="3"><span class="star">*</span> <?php echo lang_key('alert_required_fields'); ?></td>
			</tr>
			<tr><td nowrap height="10px" colspan="3"></td></tr>
			<tr>
				<td width="250px">&nbsp;<?php echo lang_key('admin_login'); ?>&nbsp;<span class="star">*</span></td>
				<td><input name="admin_username" id="admin_username" class="form_text" size="28" maxlength="22" value="<?php echo $admin_username; ?>" onfocus="textboxOnFocus('notes_admin_username')" onblur="textboxOnBlur('notes_admin_username')" <?php if(EI_MODE != 'debug') echo 'autocomplete="off"'; ?> placeholder="<?php if(EI_MODE == 'demo') echo 'demo: test'; ?>" /></td>
				<td rowspan="6" valign="top">					
					<div id="notes_admin_email" class="notes_container">
						<h4><?php echo lang_key('admin_email'); ?></h4>
						<p><?php echo lang_key('admin_email_info'); ?></p>
					</div>
					<div id="notes_admin_username" class="notes_container">
						<h4><?php echo lang_key('admin_login'); ?></h4>
						<p><?php echo lang_key('admin_login_info'); ?></p>
					</div>
					<div id="notes_admin_password" class="notes_container">
						<h4><?php echo lang_key('admin_password'); ?></h4>
						<p><?php echo lang_key('admin_password_info'); ?></p>
					</div>
					<img class="loading_img" src="images/ajax_loading.gif" alt="<?php echo lang_key('loading'); ?>..." />
					<div id="notes_message" class="notes_container"></div>					
				</td>
			</tr>
			<tr>
				<td>&nbsp;<?php echo lang_key('admin_password'); ?>&nbsp;<span class="star">*</span></td>
				<td><input name="admin_password" id="admin_password" class="form_text" type="password" size="28" maxlength="22" value="<?php echo $admin_password; ?>" onfocus="textboxOnFocus('notes_admin_password')" onblur="textboxOnBlur('notes_admin_password')" <?php if(EI_MODE != 'debug') echo 'autocomplete="off"'; ?> placeholder="<?php if(EI_MODE == 'demo') echo 'demo: test'; ?>" /></td>
			</tr>
			<!--<tr>
				<td>&nbsp;<?php echo lang_key('admin_email'); ?>&nbsp;</td>
				<td><input name="admin_email" id="admin_email" class="form_text" size="28" maxlength="125" value="<?php echo $admin_email; ?>" onfocus="textboxOnFocus('notes_admin_email')" onblur="textboxOnBlur('notes_admin_email')" <?php if(EI_MODE != 'debug') echo 'autocomplete="off"'; ?> /></td>
			</tr>-->
				<?php if(EI_USE_PASSWORD_ENCRYPTION){ ?>
				<tr>
					<td>&nbsp;<?php echo lang_key('password_encryption'); ?>&nbsp;</td>
					<td>
						
						<select class="form_select" name="password_encryption" id="password_encryption">
							
						<option <?php echo (($password_encryption == 'MD5') ? 'selected="selected"' : ''); ?> value="MD5">MD5</option>
						<option <?php echo (($password_encryption == 'AES') ? 'selected="selected"' : ''); ?> value="AES">AES</option>
						
						</select>
					</td>
				</tr>							
				<?php } ?>
			<?php }else{ ?>
				<tr><td colspan="2"><?php echo lang_key('administrator_account_skipping'); ?></td></tr>			
			<?php } ?>
			<tr><td colspan="2" nowrap height="50px">&nbsp;</td></tr>
			<tr>
				<td colspan="2">
					<a href="database_settings.php" class="form_button" /><?php echo lang_key('back'); ?></a>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" class="form_button" value="<?php echo lang_key('continue'); ?>" />
				</td>
			</tr>                        
			</table>
			</form>                        
		</div>
		<div class="clear"></div>
	</div>
	
	<?php include_once('include/footer.inc.php'); ?>        

</div>

<script type="text/javascript">
	function bodyOnLoad(){
		setFocus("<?php echo $focus_field; ?>");
	}	
</script>
</body>
</html>

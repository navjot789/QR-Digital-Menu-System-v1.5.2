<?php
################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 #
## --------------------------------------------------------------------------- #
##  ApPHP EasyInstaller Free version                                           #
##  Developed by:  ApPHP <info@apphp.com>                                      #
##  License:       GNU LGPL v.3                                                #
##  Site:          https://www.apphp.com/php-easyinstaller/                    #
##  Copyright:     ApPHP EasyInstaller (c) 2009-2013. All rights reserved.     #
##                                                                             #
################################################################################

	session_start();
	
	require_once('include/shared.inc.php');    
    require_once('include/settings.inc.php');
	require_once('include/database.class.php'); 
    require_once('include/functions.inc.php');	
	require_once('include/languages.inc.php');	
    
	$passed_step = isset($_SESSION['passed_step']) ? (int)$_SESSION['passed_step'] : 0;

	// handle previous steps
	// -------------------------------------------------
	if($passed_step >= 5){
		// OK
	}else{
		header('location: start.php');
		exit;				
	}
	
	if(EI_MODE == 'debug') error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
    
	$completed = false;
	$error_mg  = array();
		
	if($passed_step == 5){
		
		$database_host		 = isset($_SESSION['database_host']) ? prepare_input($_SESSION['database_host']) : '';
		$database_name		 = isset($_SESSION['database_name']) ? prepare_input($_SESSION['database_name']) : '';
		$database_username	 = isset($_SESSION['database_username']) ? prepare_input($_SESSION['database_username']) : '';
		$database_password	 = isset($_SESSION['database_password']) ? prepare_input($_SESSION['database_password']) : '';
		$database_prefix     = isset($_SESSION['database_prefix']) ? stripslashes($_SESSION['database_prefix']) : '';
		$install_type		 = isset($_SESSION['install_type']) ? $_SESSION['install_type'] : 'create';
		
		$admin_username 	 = isset($_SESSION['admin_username']) ? stripslashes($_SESSION['admin_username']) : '';
		$admin_password 	 = isset($_SESSION['admin_password']) ? stripslashes($_SESSION['admin_password']) : '';
		$admin_email 		 = isset($_SESSION['admin_email']) ? stripslashes($_SESSION['admin_email']) : '';
		$password_encryption = isset($_SESSION['password_encryption']) ? $_SESSION['password_encryption'] : EI_PASSWORD_ENCRYPTION_TYPE;
		
		if($install_type == 'update'){
			$sql_dump_file = EI_SQL_DUMP_FILE_UPDATE;
		}else if($install_type == 'un-install'){
			$sql_dump_file = EI_SQL_DUMP_FILE_UN_INSTALL;
		}else{
			$sql_dump_file = EI_SQL_DUMP_FILE_CREATE;
		}		
						
		if(empty($database_host)) $error_mg[] = lang_key('alert_db_host_empty');	
		if(empty($database_name)) $error_mg[] = lang_key('alert_db_name_empty'); 
		if(empty($database_username)) $error_mg[] = lang_key('alert_db_username_empty'); 	
		//if (empty($database_password)) $error_mg[] = lang_key('alert_db_password_empty');

		if(empty($error_mg)){		
			if(EI_MODE == 'demo'){
				if($database_host == 'localhost' && $database_name == 'db_name' && $database_username == 'test' && $database_password == 'test'){
					$completed = true; 
				}else{
					$error_mg[] = lang_key('alert_wrong_testing_parameters');
				}
			}else{				
				$db = Database::GetInstance($database_host, $database_name, $database_username, $database_password, EI_DATABASE_TYPE, false, true);
				if(EI_DATABASE_CREATE && ($install_type == 'create') && !$db->Create()){
					$error_mg[] = $db->Error();					
				}else if($db->Open()){
					if(EI_CHECK_DB_MINIMUM_VERSION && (version_compare($db->GetVersion(), EI_DB_MINIMUM_VERSION, '<'))){
						$alert_min_version_db = lang_key('alert_min_version_db');
						$alert_min_version_db = str_replace('_DB_VERSION_', '<b>'.EI_DB_MINIMUM_VERSION.'</b>', $alert_min_version_db);
						$alert_min_version_db = str_replace('_DB_CURR_VERSION_', '<b>'.$db->GetVersion().'</b>', $alert_min_version_db);
						$alert_min_version_db = str_replace('_DB_', '<b>'.$db->GetDbDriver().'</b>', $alert_min_version_db);
						$error_mg[] = $alert_min_version_db;
					}else{
						// read sql dump file
						$sql_dump = file_get_contents($sql_dump_file);
						if($sql_dump != ''){
							if(false == ($db_error = apphp_db_install($sql_dump_file))){
								if(EI_MODE != 'debug') $error_mg[] = lang_key('error_sql_executing');								
							}else{
								// write additional operations here, like setting up system preferences etc.
								// ...
								$completed = true;
								
								session_destroy();
								
								// now try to create file and write information
								$config_file = file_get_contents(EI_CONFIG_FILE_TEMPLATE);
								$config_file = str_replace('<DB_HOST>', $database_host, $config_file);
								$config_file = str_replace('<DB_NAME>', $database_name, $config_file);
								$config_file = str_replace('<DB_USER>', $database_username, $config_file);
								$config_file = str_replace('<DB_PASSWORD>', $database_password, $config_file);
								$config_file = str_replace('<DB_PREFIX>', $database_prefix, $config_file);
								
								if(EI_USE_ADMIN_ACCOUNT){
									$config_file = str_replace('<ENCRYPTION>', (EI_USE_PASSWORD_ENCRYPTION) ? 'true' : 'false', $config_file);			
									$config_file = str_replace('<ENCRYPTION_TYPE>', $password_encryption, $config_file);			
									$config_file = str_replace('<ENCRYPT_KEY>', EI_PASSWORD_ENCRYPTION_KEY, $config_file);
								}else{
									$config_file = str_replace('<ENCRYPTION>', '', $config_file);			
									$config_file = str_replace('<ENCRYPTION_TYPE>', '', $config_file);			
									$config_file = str_replace('<ENCRYPT_KEY>', '', $config_file);									
								}
								
								//chmod(EI_CONFIG_FILE_PATH, 0777);
								
								$f = fopen(EI_CONFIG_FILE_PATH, 'w+');
								if(!fwrite($f, $config_file) > 0){
									$error_mg[] = str_replace('_CONFIG_FILE_PATH_', EI_CONFIG_FILE_PATH, lang_key('error_can_not_open_config_file')); 
								}
								fclose($f);
								if($install_type == 'un-install') unlink(EI_CONFIG_FILE_PATH);
								///@chmod('../'.EI_CONFIG_FILE_DIRECTORY, 0644);									
							}							
						}else{
							$error_mg[] = str_replace('_SQL_DUMP_FILE_', $sql_dump_file, lang_key('error_can_not_read_file')); 
						}						
					}
				}else{
					if(EI_MODE == 'debug'){
						$error_mg[] = str_replace('_ERROR_', '<br />Error: '.$db->Error(), lang_key('error_check_db_connection')); 
					}else{
						$error_mg[] = str_replace('_ERROR_', '', lang_key('error_check_db_connection')); 
					}						
				}
			}			
		}
	}else{
		$error_mg[] = lang_key('alert_wrong_parameter_passed');
	}
        
?>	

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="ApPHP Company - Advanced Power of PHP">
    <meta name="generator" content="ApPHP EasyInstaller">
	<title><?php echo lang_key('installation_guide'); ?> | <?php echo lang_key('complete_installation'); ?></title>

	<link href="images/apphp.ico" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="templates/<?php echo EI_TEMPLATE; ?>/css/styles.css" />
	<?php
		if($curr_lang_direction == 'rtl'){
			echo '<link rel="stylesheet" type="text/css" href="templates/'.EI_TEMPLATE.'/css/rtl.css" />'."\n";
		}
	?>

	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
</head>
<body>
<div id="main">    
	<h1><?php echo lang_key('new_installation_of'); ?> <?php echo EI_APPLICATION_NAME.' '.EI_APPLICATION_VERSION;?>!</h1>
	<h2 class="sub-title"><?php echo lang_key('sub_title_message'); ?></h2>
	
	<div id="content">
		<?php
			draw_side_navigation(6);		
		?>

		<div class="central-part">
			<h2><?php echo lang_key('step_6_of'); ?>
			<?php if(!$completed){ ?>
				- <?php echo lang_key('database_import_error'); ?>
			<?php }else{ ?>
				- <?php echo lang_key('completed'); ?>
				<!--<h3><?php //echo lang_key('updating_completed'); ?></h3>			-->
			<?php } ?>
			</h2>

			<?php
				if(!$completed){
					echo '<div class="alert alert-error">';
					foreach($error_mg as $msg){
						echo $msg.'<br>';
					}
					echo '</div>';
				}
			?>
		
			<table width="99%" cellspacing="0" cellpadding="0" border="0">
			<tbody>
			<?php if(!$completed){ ?>
				<tr><td nowrap height="25px">&nbsp;</td></tr>
				<tr>
					<td>	
						<a href="ready_to_install.php" class="form_button"><?php echo lang_key('back'); ?></a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" class="form_button" onclick="javascript:location.reload();" value="<?php echo lang_key('complete'); ?>" />
					</td>
				</tr>							
			<?php }else{ ?>
				<tr><td>&nbsp;</td></tr>						
				<?php if($install_type == 'update'){ ?>
					<tr><td><h4><?php echo lang_key('updating_completed'); ?></h4></td></tr>
					<tr>
						<td>
							<div class="alert alert-success"><?php echo str_replace('_CONFIG_FILE_', EI_CONFIG_FILE_PATH, lang_key('file_successfully_rewritten')); ?></div>
							<div class="alert alert-warning"><?php echo lang_key('alert_remove_files'); ?></div>
							<?php echo (EI_POST_INSTALLATION_TEXT != '') ? '<div class="alert alert-info">'.EI_POST_INSTALLATION_TEXT.'</div>' : ''; ?>
							<br /><br />
							<?php if(EI_APPLICATION_START_FILE != ''){ ?><a href="<?php echo '../'.EI_APPLICATION_START_FILE;?>"><?php echo lang_key('proceed_to_landing_page'); ?></a><?php } ?>
						</td>
					</tr>									
				<?php }else if($install_type == 'un-install'){ ?>
					<tr><td><h4><?php echo lang_key('uninstallation_completed'); ?></h4></td></tr>
					<tr>
						<td>
							<div class="alert alert-success"><?php echo str_replace('_CONFIG_FILE_', EI_CONFIG_FILE_PATH, lang_key('file_successfully_deleted')); ?></div>
							<div class="alert alert-warning"><?php echo lang_key('alert_remove_files'); ?></div>
							<br /><br />
							<?php if(EI_APPLICATION_START_FILE != ''){ ?><a href="<?php echo '../'.EI_APPLICATION_START_FILE;?>"><?php echo lang_key('proceed_to_landing_page'); ?></a><?php } ?>
						</td>
					</tr>															
				<?php }else{ ?>									
					<tr><td><h4><?php echo lang_key('installation_completed'); ?></h4></td></tr>
					<tr>
						<td>
							<div class="alert alert-success"><?php echo str_replace('_CONFIG_FILE_', EI_CONFIG_FILE_PATH, lang_key('file_successfully_created')); ?></div>
							<div class="alert alert-warning"><?php echo lang_key('alert_remove_files'); ?></div>
							<?php echo (EI_POST_INSTALLATION_TEXT != '') ? '<div class="alert alert-info">'.EI_POST_INSTALLATION_TEXT.'</div>' : ''; ?>
							<br /><br />
							<?php if(EI_APPLICATION_START_FILE != ''){ ?><a href="<?php echo '../'.EI_APPLICATION_START_FILE;?>"><?php echo lang_key('proceed_to_login_page'); ?></a><?php } ?>
						</td>
					</tr>															
				<?php } ?>
			<?php } ?>
			</tbody>
			</table>
			<br>

			<?php
				if(EI_ALLOW_START_ALL_OVER && $completed){
					echo '<h3>'.lang_key('start_all_over').'</h3>';
					echo '<p>'.lang_key('start_all_over_text').'</p>';
					echo '<form action="start.php" method="post">';
					echo '<input type="hidden" name="task" value="start_over" />';
					echo '<input type="hidden" name="token" value="'.$_SESSION['token'].'" />';
					echo '<input type="submit" class="form_button" name="btnSubmit" value="'.lang_key('remove_configuration_button').'" />';
				}
			?>			
			
		</div>
		<div class="clear"></div>
	</div>
	
	<?php include_once('include/footer.inc.php'); ?>        

</div>
</body>
</html>
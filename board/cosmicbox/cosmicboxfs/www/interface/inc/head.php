<head>
	<meta charset="utf-8">
	<title>CosmicBox <?php echo @$_GET['dir']?></title>
	<link rel="icon" href="<?php echo DIR_INTERFACE; ?>/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo DIR_INTERFACE; ?>/css/tinytypo.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo DIR_INTERFACE; ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo DIR_INTERFACE; ?>/css/themes.css">

<?php
if(file_exists (DIR_INTERFACE.'/'.USER_CONF_FILE)){
	$userfile   = fopen(DIR_INTERFACE.'/'.USER_CONF_FILE, 'r');
	fgets($userfile); //on passe une ligne (identifiant);
	$background = trim(fgets($userfile));
	$font       = trim(fgets($userfile));
	$userban    = trim(fgets($userfile));
	$size       = trim(fgets($userfile));
	global $theme;
	$theme      = trim(fgets($userfile));
	echo'
	<style type="text/css">
		header,footer { background-color: '.$background.'; color:'.$font.'; }
		';
	if ($userban == 'yes'){
		echo'
		section{ background-image: url("'.DIR_INTERFACE.'/css/img/user.jpg"); background-size: '.$size.'; background-repeat: no-repeat; }
		';
	}

	echo'</style>';

	fclose ($userfile);
}

else{
	$custom = TRUE;
	global $theme;
	$theme = 'light';
}
?>
</head>

<?php
//on inclus les constantes de configurations
require ('inc/config/config.php');
$host = $_SERVER['HTTP_HOST'];

$id_code    = @$_POST['id-code'];
$background = @$_POST['background'];
$font       = @$_POST['font'];
$userban    = @$_POST['userban'];
$size       = @$_POST['size'];
$theme      = @$_POST['explorer-theme'];

$ban        = @$_FILES['ban'];

$userfile   = fopen(USER_CONF_FILE, 'x');

if($userfile == FALSE){
	header("Status: 301 Moved Permanently", false, 301);
	header("Location: http://$host");
	exit();
}

else{
	fwrite($userfile,$id_code ."\r\n");
	fwrite($userfile,$background ."\r\n");
	fwrite($userfile,$font."\r\n");
	fwrite($userfile,$userban."\r\n");
	fwrite($userfile,$size."\r\n");
	fwrite($userfile,$theme);
	fclose ($userfile);

	if($userban == 'no'){
		header("Status: 301 Moved Permanently", false, 301);
		header("Location: http://$host/");
		exit();
	}

	else{
		include ('inc/config/upload.php');
		$userdir = 'css/img/user.jpg';
		uploadfile($ban, $userdir);
	}

	header("Status: 301 Moved Permanently", false, 301);
	header("Location: http://$host/");
	exit();
}

?>

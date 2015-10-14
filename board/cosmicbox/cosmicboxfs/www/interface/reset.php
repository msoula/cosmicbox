<?php
//on inclus les constantes de configurations
require ('inc/config/config.php');
$host = $_SERVER['HTTP_HOST'];

$submit_id_code    = trim(@$_POST['id-code']);

$userfile = fopen(USER_CONF_FILE, 'r');

if($userfile == FALSE){
	header("Status: 301 Moved Permanently", false, 301);
	header("Location: http://$host");
	exit();
}

else{
	$id_code = trim(fgets($userfile));
	fclose ($userfile);

	if ($id_code == $submit_id_code){
		unlink(USER_CONF_FILE);
		header("Status: 301 Moved Permanently", false, 301);
		header("Location: http://$host/");
		exit();
	}
	else{
		header("Status: 301 Moved Permanently", false, 301);
		header("Location: http://$host/?reset=error");
		exit();
	}
}

?>

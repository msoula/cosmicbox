<?php
function uploadfile($file, $dir){

	$name     = $file['name'];
	$type     = $file['type'];
	$size     = $file['size'];
	$tmp_name = $file['tmp_name'];
	$error    = $file['error'];

	if ( move_uploaded_file($tmp_name, $dir) ) {
		echo 'ok';
	}
	else {
		echo 'error';
	}
}
?>

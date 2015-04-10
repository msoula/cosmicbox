<?php

session_start();
if (isset($_SESSION['hasVisited'])) {
	exit(0);
}
$_SESSION['hasVisited'] = "yes";

// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('UTC');

$date = date("Y-m-d");

# Encrypt combination of IP + Date + Useragent.
# So one user only have a specific string per day
$client_string = getenv('REMOTE_ADDR') . getenv('HTTP_USER_AGENT') . $date;

$sha = sha1($client_string);

include ("vc.func.php");

vc_save_visitor($sha, $date);

print json_encode(array($sha, $date));

?>

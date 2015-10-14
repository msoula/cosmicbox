<?php
$host = $_SERVER['HTTP_HOST'];
header("Status: 301 Moved Permanently", false, 301);
header("Location: http://$host");
exit();
?>
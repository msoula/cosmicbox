<section <?php if(isset($custom)){echo'class="custom"';}?> >

<?php
if (isset($_GET['disp'])){
	$disp = $_GET['disp'];
}
else{
	$disp = 'list';
}

if (isset($_GET['dir'])){
	include (PATH_INCLUDE.'/explorer.php');
}

else if (isset($_GET['page'])){

}
else{
	include (PATH_INCLUDE.'/welcome.php');
}
?>

</section>

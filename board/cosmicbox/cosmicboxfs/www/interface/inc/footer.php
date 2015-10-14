<footer>
</footer>


<script type="text/javascript" src="<?php echo DIR_INTERFACE; ?>/js/jquery.min.js"></script>
<?php
if (isset($custom)){
	echo'<script type="text/javascript" src="'.DIR_INTERFACE.'/js/custom-form.js"></script>';
}

if (isset($_GET['dir'])){
	echo'<script type="text/javascript" src="'.DIR_INTERFACE.'/js/onscroll.js"></script>
		<script type="text/javascript" src="'.DIR_INTERFACE.'/js/explorer.js"></script>';
}
?>

<?php

if (isset($_GET['disp'])){
	$disp = $_GET['disp'];
}
else{
	$disp = 'list';
}

if (isset($custom)){
	echo'<header class="custom">';
}
else{
	echo'<header>';
}
?>
	<div id="nav-header">
		<a href="/" class="logo">
			<img src="<?php echo DIR_INTERFACE; ?>/img/lbx-logo-small.png" width="36" alt="lbx-logo-small">
			<h1>CosmicBox</h1>
		</a>
		<nav>
			<ul>
				<li><a id="explorer" href="?disp=<?php echo $disp; ?>&dir">Explorateur de fichiers</a></li>
			</ul>
		</nav>
	</div>
</header>


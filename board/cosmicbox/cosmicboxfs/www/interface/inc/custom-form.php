<aside id="custom-tools">
	<h2 class="welcome">Bienvenue, <br>vous allez procéder à la personnalisation de votre CosmicBox.</h2>
	<noscript>Vous devez activer javascript pour effectuer les modifications.</noscript>
	<p class="welcome mini">Pour plus de confort, il est conseillé d'utiliser un ordinateur pour réaliser cette configuration.</p>
	<hr class="welcome">
	<p class="welcome">Pour commencer, choisissez :</p>
	<form action="<?php echo DIR_INTERFACE; ?>/custom.php" method="post" enctype="multipart/form-data">
		<button type="button" class="choice" id="discover"><span>&#128568; Découverte</span><br>
		Configuration guidée étape par étape</button>
		<button type="button" class="choice" id="advance"><span>&#128572; Rapide</span><br>
		Afficher toutes les options maintenant</button>
		<fieldset id="step1">
			<legend>Menu principal</legend>
			<div><label for="background">Couleur du fond</label><input id="background" name="background" type="color" value="#000000"><input id="hexa-background" type="text" value="#000000"></div>
			<div><label for="font">Couleur du texte</label><input id="font" name="font" type="color" value="#ffffff"><input id="hexa-font" type="text"  value="#ffffff"></div>
		</fieldset>
		<fieldset id="step2">
			<legend>Bannière</legend>
			<!--<p>Chargez une image ici ou glissez-la dans la zone cadriée.</p>-->
			<div id="inputimg">
				<label for="ban">Image</label><input type="hidden" id="userban" name="userban" value="no"><input id="ban" name="ban" type="file" accept="image/jpeg,image/x-png,image/gif">
			</div>
			<p>(format jpg, png ou gif)</p>
			<div><label for="size">Disposition</label><input type="text" id="size" name="size" value="cover"><input type="button" id="cover" class="select" value="Rognée" disabled><input type="button" id="contain" value="Cadrée" disabled></div>
		</fieldset>
		<fieldset id="step3">
			<legend>Explorateur de fichiers</legend>
			<div>
			<label for="explorer-theme">Thème</label><input type="text" id="explorer-theme" name="explorer-theme" value="light" ><input type="button" id="dark" value="Sombre"><input type="button" id="light" class="select" value="Clair">
			</div>
		</fieldset>


		<input  id="next" class="goto2" type="button" value="Suivant &#8658;">
		<input id="valid" type="submit" value="&#128570; Valider la personnalisation">
		<p id="valid-info" class=" mini">Pour annuler les modifications après validation, supprimez le fichier <i><?php echo USER_CONF_FILE; ?></i> se trouvant dans le dossier <i>interface</i>.<br>
			OU<br>
			Rendez-vous à la page <a href="<?php echo $host ; ?>/?reset"><?php echo $host ; ?>/?reset</a> <br>
			et indiquez l'identifiant ci-dessous :</p>
		<hr>
<?php
// On génère l'identifiant unique
$string1 = substr(str_shuffle('abcefghijklmnopqrstuvwxyz'), 0, 5);
$string2 = rand(11111,99999);
$id_code = $string1.$string2;
$id_code = str_shuffle($id_code);
?>
		<input id="id-code" name="id-code" type="text" readonly value="<?php echo $id_code; ?>">
	</form>
	<hr>
	<p class="mini">En cas de problème, envoyez un mail à <br><a href="mailto:support-cosmicbox@leschatcosmiques.net">support-cosmicbox@leschatcosmiques.net</a></p>
</aside>

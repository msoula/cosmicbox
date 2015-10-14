<header class="custom">
	<div id="custom-tools">
	<h2 class="welcome">Bienvenue, vous allez procéder à la personnalisation de votre CosmicBox.</h2>
		<p class="welcome">Pour commencer, choisissez :</p>
		<form action="<?php echo DIR_INTERFACE; ?>/custom.php" method="get" enctype="multipart/form-data">
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
				<p>Chargez une image ici ou glissez-la directement dans la zone cadriée. (format jpg, png ou gif)</p>
				<div id="inputimg"><label for="ban">Image</label><input id="ban" name="ban" type="file" accept="image/jpeg,image/x-png,image/gif"></div>
				<div><label for="size">Disposition</label><input type="hidden" id="size" name="size"><input type="button" id="cover" class="select" value="Rognée" disabled><input type="button" id="contain" value="Cadrée" disabled></div>
			</fieldset>
			<fieldset id="step3">
				<legend>Explorateur de fichiers</legend>
				<div>
				<label for="explorer-theme">Thème</label><input type="hidden" id="explorer-theme" name="explorer-theme" ><input type="button" id="dark" value="Sombre"><input type="button" id="light" class="select" value="Clair">
				</div>
			</fieldset>


			<input id="next" type="button" value="Suivant &#8658;">
			<input id="valid" type="submit" value="&#128570; Valider la personnalisation">
		</form>
	</div>
</header>

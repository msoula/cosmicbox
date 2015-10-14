<aside id="custom-tools">
	<h2 class="welcome">Réinitialisation</h2>
	<form action="<?php echo DIR_INTERFACE; ?>/reset.php" method="post">
<?php
if($reset == 'error'){
echo'<p class="">Une erreur est survenue, vérifiez le code d\'identification :</p>';
}
else{
echo'<p>Pour effacer la personnalisation de votre CosmicBox, indiquez le code d\'identification :</p>';
}
?>
		<input id="id-code" name="id-code" type="text">
		<input id="reset" type="submit" value="&#128570; Effacer la personnalisation">
	</form>
	<hr>
	<p class="mini">En cas de problème, envoyez un mail à <br><a href="mailto:support-cosmicbox@leschatcosmiques.net">support-cosmicbox@leschatcosmiques.net</a></p>
</aside>

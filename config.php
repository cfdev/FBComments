<?php if(!defined('PLX_ROOT')) exit; ?>
<?php
	if(!empty($_POST)) {
	$plxPlugin->setParam('moderatorID', $_POST['moderatorID'], 'string');
	$plxPlugin->setParam('numposts', $_POST['numposts'], 'string');
	$plxPlugin->saveParams();
	header('Location: parametres_plugin.php?p=FBComments');
	exit;
	}
?>
	<h2>Configuration</h2>
	<p class="alert orange">Paramètres du plugin comments - <a href="https://developers.facebook.com/docs/plugins/comments" target="blank">https://developers.facebook.com/docs/plugins/comments</a></p>
	<form action="parametres_plugin.php?p=FBComments" method="post">
	<fieldset>

	<label for="moderator">ID de l'admin Facebook (pour la modération) :</label>
	<input type="text" name="moderatorID" id="moderator" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('moderatorID')) ?>" />

	<label for="num">Nombre de commentaires affichés :</label>
	<input type="text" name="numposts" id="num" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('numposts')) ?>" />
	
	<p class="in-action-bar">
		<input type="submit" name="submit" value="Enregistrer" />
	</p>
	
	</fieldset>
</form>
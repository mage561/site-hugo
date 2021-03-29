<?php
	session_start();

	if($_SESSION['admin'] != "true")
		header("Location: ../index.php");
?>

<fieldset>
	<legend>Ajouter un sport</legend>
	<form id="Inscription" method="post" action="../traitement/traitementAjouterSport.php" >
	

	<p>
		<label for="sport">Nom du sport :</label> <br/>
		<input type="text" name="sport" class="forminscript" id="sport" size="30" maxlength="50"/>
	</p>

		<input type="submit" name="ajouter" id="ajouter" value="Ajouter le sport"/>

	</form>
</fieldset>
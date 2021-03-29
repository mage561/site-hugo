<?php
	session_start();

	if($_SESSION['admin'] != "true")
		header("Location: ../index.php");
?>

<fieldset>
	<legend>Ajouter un coach</legend>
	<form id="Inscription" method="post" action="../traitement/traitementAjouterCoach.php" >
		
	<p>
		<label for="email">Adresse mail :</label> <br/>
		<input type="email" name="email" class="forminscript" id="email" size="30" maxlength="50"/>
	</p>

	<p>
		<label for="nom">Nom :</label> <br/>
		<input type="text" name="nom" class="forminscript" id="nom" size="30" maxlength="50"/>
	</p>

	<p>
		<label for="prenom">Prénom :</label> <br/>
		<input type="text" name="prenom" class="forminscript" id="prenom" size="30" maxlength="50"/>
	</p>

	<p>
		<label for="sexe">Choisissez le sexe du coach :</label> <br/>
		<select name="sexe" id="sexe">
		   	<option value="">-----------</option>
		   	<option value="Homme">Homme</option>
		   	<option value="Femme">Femme</option>
	    </select>
	</p>

	<p>
		<label for="date">Date de naissance :</label> <br/>
		<input type="date" id="date" name="date" value="1990-01-01" />
	</p>

	<p>
		<label for="adresse">Adresse :</label> <br/>
		<input type="text" name="adresse" id="adresse" size="30" maxlength="50"/>
	</p>

	<p>
		<label for="password">Mot de passe :</label><br/>
		<input type="password" name="password" class="forminscript" id="password" size="30" maxlength="50"/><br/>
		<span class="info">Au moins 6 caractères contenant chiffre(s) et lettres</span><br/>
	</p>

	<p>
		<label for="confirmPassword">Confirmation mot de passe :</label><br/>
		<input type="password" name="confirmPassword" class="forminscript" id="confirmPassword" size="30" maxlength="50"/>
	</p>

		<input type="submit" name="inscrire" id="inscrire" value="Ajouter le coach"/>

	</form>
</fieldset>
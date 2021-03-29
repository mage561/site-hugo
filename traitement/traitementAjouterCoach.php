<?php
	
	// =============================[ Vérification connecté en admin ]===================================
	
	session_start(); // je dis que j'utilise les variables de session

	if($_SESSION['admin'] != "true") // redirige l'utilisateur s'il n'est pas administrateur
		header("Location: ../index.php");

	// ==================================================================================================

	





	// =============================[ Connection à la base de données ]==================================
	
	include_once("../configuration.php"); // j'importe le fichier de configuration pour l'accès à la base de données
	
	try {
	    $BDD = new PDO("mysql:host=$ipBaseDeDonnees;port=$portBaseDeDonnees;dbname=$nomBaseDeDonnees", "$NomUtilisateurBaseDeDonnees", "$MotDePasseBaseDeDonnees");
	} catch (PDOException $e) { 
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	}
	$BDD->exec("SET CHARACTER SET utf8");
	// ==================================================================================================
	






	// =============================[ Contrôle des erreurs de saisie ]===================================
	
	$messageErreur = "Erreur :"; // Je créer une variable qui contiendra les messages d'erreur
	$erreur = false; // Je créer une variable me permetant de savoir s'il y a une erreur ou non
	
	if (empty($_POST['nom']) || !isset($_POST['nom'])){ // si la variable nom est vide (empty) ou (||) n'a pas été défini (!isset)
		$messageErreur.="<br>- Nom non défini "; // j'ajoute la phrase à coté dans le message d'erreurs
		$erreur=true; // je met cette variable à 'true' pour dire qu'il y a eu une erreur
	}

	if (empty($_POST['prenom']) || !isset($_POST['prenom'])){ // je répète ce qui a été fait ci-dessus avec les autres champs
		$messageErreur.="<br>- Prénom non défini ";
		$erreur=true;
	}
	
	if (empty($_POST['sexe'])){ // je ne met pas de 'isset' car c'est un select, et il est 'defini' vide de base, il ne peut donc pas ne pas être défini
		$messageErreur.="<br>- Sexe non choisi ";
		$erreur=true;
	}

	if (empty($_POST['date']) || !isset($_POST['date'])){
		$messageErreur.="<br>- Date de naissance non définie ";
		$erreur=true;
	}

	if (empty($_POST['adresse']) || !isset($_POST['adresse'])){
		$messageErreur.="<br>- Adresse non définie ";
		$erreur=true;
	}

	if (empty($_POST['password']) || !isset($_POST['password'])){
		$messageErreur.="<br>- Mot de passe non entré ";
		$erreur=true;
	}

	if (empty($_POST['confirmPassword']) || !isset($_POST['confirmPassword'])){
		$messageErreur.="<br>- Confirmation de mot de passe non entrée ";
		$erreur=true;
	}
	// ==================================================================================================






	// ==========================[ Affectation des variables necessaires ]================================
	
	$nom = ucfirst(htmlspecialchars($_POST['nom']));
	$prenom = ucfirst(htmlspecialchars($_POST['prenom']));
	$sexe = ucfirst(strtolower($_POST['sexe']));
	$date = $_POST['date'];
	$adresse = htmlspecialchars($_POST['adresse']);
	$email = strtolower($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$confirmPassword = htmlspecialchars($_POST['confirmPassword']);
	// ==================================================================================================

	
	if ($erreur) { // si la variable d'erreur est vrai, donc s'il y a une erreur
		echo $messageErreur; // j'affiche le message d'erreur contenant toutes les erreurs
	} 
	
	else {
		




		// =============================[ Vérifications diverses ]===================================

		if (!(preg_match("/[a-z]/i",$password) && preg_match("/[0-9]/",$password) && strlen($password)>=6)) {
			$erreur = true;
			$messageErreur .= "</br>- Le mot de passe doit faire 6 caractères minimum et contenir au moins un chiffre !";
		} 

		if ($password != $confirmPassword) {
			$erreur = true;
			$messageErreur .= "</br>- Les mots de passe ne sont pas identiques !";
		} 

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$erreur = true;
			$messageErreur .= "</br>- L'adresse mail entrée n'existe pas !";
		}

		if ($email == $AdresseMailAdministrateur) {
			$erreur = true;
			$messageErreur .= "</br>- L'adresse mail entrée est déjà utilisée !";
		}


		$query = "SELECT * FROM profil";
		$result = $BDD->query($query);

		while ($data = $result->fetch()) {
			if ( $data["mailUtilisateur"] == $email) {
				$erreur = true;
				$messageErreur .= "</br>- L'adresse mail entrée est déjà utilisée !";
			} 
		}
		// ==================================================================================================






		if($erreur) { 
			echo $messageErreur; 
		}

		else {







			// =============================[ Inscription dans la BDD ]===================================

			$mdpCrypte = md5($password); // je crypte le mot de passe pour la base de données

			$insertCoach = "

			INSERT INTO coach (DateDeNaissance, Sexe, Nom, Prenom, Adresse)
			VALUES ('$date', '$sexe', '$nom', '$prenom', '$adresse')

			"; // requête pour créer le coach dans la base de données

			$BDD->query($insertCoach); // j'execute la requete ci-dessus


			$query2 = "

			INSERT INTO profil (AdresseMailProfil, MotDePasseProfil, RefCoach, RefJoueur) 
			VALUES ('$email', '$mdpCrypte', (SELECT MAX(IdCoach) FROM coach), 0)

			"; // requête pour créer le compte du coach precedemment créé
			
			$BDD->query($query2); // j'execute la requete ci-dessus
			// ==================================================================================================







		}
	}

	$BDD = null; // ferme la connection avec la base de données
	header("Location: ../index.php"); // redirige à la page de base
?>
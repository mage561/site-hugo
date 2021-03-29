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
	
	if (empty($_POST['sport']) || !isset($_POST['sport'])){ // si la variable nom est vide (empty) ou (||) n'a pas été défini (!isset)
		$messageErreur.="<br>- Nom non défini "; // j'ajoute la phrase à coté dans le message d'erreurs
		$erreur=true; // je met cette variable à 'true' pour dire qu'il y a eu une erreur
	}
	// ==================================================================================================






	// ==========================[ Affectation des variables necessaires ]================================
	
	$sport = ucfirst(htmlspecialchars($_POST['sport']));

	// ==================================================================================================

	
	if ($erreur) { // si la variable d'erreur est vrai, donc s'il y a une erreur
		echo $messageErreur; // j'affiche le message d'erreur contenant toutes les erreurs
	} 
	
	else {


			// =============================[ Inscription dans la BDD ]===================================

		$mdpCrypte = md5($password); // je crypte le mot de passe pour la base de données

		$insertSport = "

		INSERT INTO sport (NomSport)
		VALUES ('$sport')

		"; // requête pour créer le coach dans la base de données

		$BDD->query($insertSport); // j'execute la requete ci-dessus
	}

	$BDD = null; // ferme la connection avec la base de données
	header("Location: ../index.php"); // redirige à la page de base
?>
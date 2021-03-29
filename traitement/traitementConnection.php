<?php
	session_start();
	
	$messageErreur = "Erreur :"; // Je créer une variable qui contiendra les messages d'erreur
	$erreur=false; // Je créer une variable me permetant de savoir s'il y a une erreur ou non
	$estConnecte = false; // Je créer une variable pour savoir plus tard si l'utilisateur a pu se connecter
	$estAdmin = false;

	include_once("../configuration.php"); // j'importe le fichier de configuration pour l'accès à la base de données

	try {
	    $BDD = new PDO("mysql:host=$ipBaseDeDonnees;port=$portBaseDeDonnees;dbname=$nomBaseDeDonnees", "$NomUtilisateurBaseDeDonnees", "$MotDePasseBaseDeDonnees"); // Je me connecte à la bdd, retourne une erreur en cas de problème
	} catch (PDOException $e) { 
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	}
	$BDD->exec("SET CHARACTER SET utf8"); // Je défini l'encodage des cacactères en UTF8

	$query = "SELECT * FROM profil";
	$result = $BDD->query($query);

	if (isset($_POST['password'])){ // si la variable post password est définie
		$password = htmlspecialchars($_POST['password']); // je la stocke sans caractères spéciaux dans une variable password
	}
	else {
		$erreur = true;
		$messageErreur .= "</br>- mot de passe non entré"; // assez explicite je pense :)
	}

	if(isset($_POST['email'])){ // si la variable post mail est définie
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ // si l'adresse mail ne correspond pas à une email valide
			$erreur = true;
			$messageErreur .= "</br>- format de l'adresse mail inconnu";
		} 
		else {
			$email = strtolower($_POST['email']); // je stocke l'email en minuscule dans une variable email
		}
	}

	if ($erreur == true) { // s'il y a une/des erreurs
		echo $messageErreur; // je les affiches
	}
	elseif (!empty($_POST['password']) && !empty($_POST["email"])) { // si le mpd et l'email ne sont pas vides
		while ($data = $result->fetch()) { // je regarde ce que j'ai dans la requete
			if ( $data["AdresseMailProfil"] == $email) { // si l'email de la variable correspond à une email dans la base de donnée
				
				$mdpCrypte = md5($password); // je crypte le mot de passe précedemment entré

				if($data["MotDePasseProfil"] == $mdpCrypte) { // et si le mot de passe crypté correspond au mot de passe crypté de la base de données
					//$nom = $data["nomUtilisateur"];
					//$prenom = $data["prenomUtilisateur"];
					$id = $data["IdProfil"];
					$email = $data["AdresseMailProfil"];
					
					if($data["RefCoach"] == 0) {
						$estJoueur = true;
						$refPersonne = $data["RefJoueur"];

						$estCoach = false;
					}
					else {
						$estCoach = true;
						$refPersonne = $data["RefCoach"];

						$estJoueur = false;
					}


					$estConnecte = true; // alors la connection est validée !
				} 
				else {
					$erreur = true;
					$messageErreur .= "</br>- identifiant/mot de passe incorrect";
				}
			} 
			else {
				$erreur = true;
				$messageErreur .= "</br>- identifiant/mot de passe incorrect";
			}
			
		}
		if($_POST["email"] == $AdresseMailAdministrateur && $_POST['password'] == $motDePasseAdmin) {
			$id = -1;
			$erreur = false;
			$estConnecte = true;
			$estAdmin = true;
		}
	}


	if ($estConnecte) // si la connection est validée par la base de donnée
	{
		if($estAdmin){
			$_SESSION['admin'] = "true";
		} else {
			$_SESSION['admin'] = "false";
		}
		//$_SESSION['nom'] = $nom;
		//$_SESSION['prenom'] = $prenom;
		$_SESSION['id'] = $id;
		$_SESSION['email'] = $email;
		$_SESSION['estJoueur'] = $estJoueur;
		$_SESSION['estCoach'] = $estCoach;
		$_SESSION['refPersonne'] = $refPersonne;
		// Les 4 lignes ci-dessus permettent de connecter l'utilisateur

		header("Location: ../index.php");
	}
	else {
		echo $messageErreur;
	}

	
?>
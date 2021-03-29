<?php

	try {
	    $BDD = new PDO("mysql:host=$ipBaseDeDonnees;port=$portBaseDeDonnees;dbname=$nomBaseDeDonnees", "$NomUtilisateurBaseDeDonnees", "$MotDePasseBaseDeDonnees"); // Je me connecte à la bdd, retourne une erreur en cas de problème
	} catch (PDOException $e) { 
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	}
	$BDD->exec("SET CHARACTER SET utf8"); // Je défini l'encodage des cacactères en UTF8

	$query = "SELECT * FROM sport";
	$result = $BDD->query($query);

	while ($data = $result->fetch()) {
		echo "<p>".$data["NomSport"]."</p>"; // on affiche la liste des sports lignes par lignes (grâce au while)
	}

?>
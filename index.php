<?php 
  session_start();
  include_once("configuration.php"); 
?>

<!DOCTYPE html>
<html>
<head>
    <!-- <link rel="stylesheet" type="text/css" href="style/style.css">  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta charset="utf-8">

    <title>Accueil</title>
</head>

<header>
<div id="image"></div>
</header>

<body>
	<div class="container">
		<div class="navbar">
			<nav>
				<div class="nav-wrapper grey darken-4">
					<a href="#!" class="brand-logo">Logo</a>
					<ul class="right hide-on-med-and-down">
					<li><a href="pages/connection.php">Se connecter </a></li>
					<li><a href="traitement/traitementDeconnection.php">Se déconnecter</a></li>
					</ul>
			</div>
			</nav>
		</div>
		<img class="materialboxed" width="100%" height="500px" src="images/shutterstocks.png">
		<?php
		  if (!empty($_SESSION['id'])) { 
		?>
		

		<?php

		  if($_SESSION['admin'] == "true") { //si l'utilisateur connecté est admin on affiche les boutons (class = button) :
			echo "<section><a class='button' href='pages/ajouterCoach.php'>Inscrire un coach</a>"; // inscrire un coach
			echo "<a class='button' href='pages/ajouterJoueur.php'>Inscrire un joueur</a>"; // inscricre un joueur
			echo "<a class='button' href='pages/ajouterSport.php'>Ajouter un sport</a></section>"; // ajouter un sport
		  }
		  else if($_SESSION['estJoueur']){ // sinon si l'utilisateur est un joueur : 
			echo "<section class='listeCoach'>";
			include_once("traitement/listeCoach.php"); // on affiche la liste des coachs (dans une section de class = listeCoach)
			echo "</section>";

			echo "<section class='listeSports'>";
			include_once("traitement/listeSports.php"); // on affiche la liste des sports (dans une section de class = listeSports)
			echo "</section>";
		  }
		  else if($_SESSION['estCoach']){ // sinon si l'utilisateur est un coach  :
			echo "<section class='listeJoueurs'>";
			include_once("traitement/listeJoueurs.php"); // on affiche la liste des joueurs associés au coach (dans une section de class = listeJoueurs)
			echo "</section>";

			echo "<section class='listeSports'>";
			include_once("traitement/listeSports.php"); // on affiche la liste des sports (dans une section de class = listeSports)
			echo "</section>";
		  }

		}

		  else { // sinon l'utilisateur n'est pas connecté
		?>

		<?php } ?>


		<div class="row center-align" style="margin-left: auto; margin-right: auto; width: 100%;">
		 <div class="card-panel grey lighten-3 col s6 offset-s3">
			<h3>Les objectifs</h3>
		 </div>
		</div>
		<div class="row center-align">
		 <div>
			  Pourquoi cherchez-vous une salle de sport ? <br>
			  Que souhaitez-vous améliorer en pratiquant une activité sportive régulièrement ? <br>
			  Les coachs de votre club O’Top Chambéry sont là pour vous faire atteindre votre but. <br>
			  Dites-nous quel est votre objectif, nous élaborons votre programme d’entrainement ! <br>
			  EN SAVOIR +
		 </div>
		</div>

		<footer class="page-footer grey darken-4">
		  <div class="container">
			<div class="row">
			  <div class="col l6 s12">
				<h5 class="white-text">Contact</h5>
				<p class="grey-text text-lighten-4">Si vous voulez nous contacter veuillez vous addresser au contact suivant</p>
			  </div>
			  <div class="col l4 offset-l2 s12">
				<h5 class="white-text">Coordonnée</h5>
				<ul>
				  <li><a class="grey-text text-lighten-3" href="#!">06 06 06 06 06 06</a></li>
				  <li><a class="grey-text text-lighten-3" href="#!">3 Rue de la Boustifaille cedex</a></li>
				  <li><a class="grey-text text-lighten-3" href="#!">Badger@gmail.com</a></li>
				  <li><a class="grey-text text-lighten-3" href="#!">Paris 74000</a></li>
				</ul>
			  </div>
			</div>
		</footer>
	</div>
</body>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.parallax');
		var instances = M.Parallax.init(elems, options);
	});
</script>
</html>

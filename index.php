<?php 
  session_start();
  include_once("configuration.php"); 
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <meta charset="utf-8">

    <title>Accueil</title>
</head>

<header>
<div id="image"></div>
</header>

<body>

    <?php
      if (!empty($_SESSION['id'])) { 
    ?>
    <section>
        <div id="d">
           <h1><a href="traitement/traitementDeconnection.php">Se déconnecter</a></h1>
        </div>
    </section>
    

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

    <section>
        <div id="d">
           <h1> <a href="pages/connection.php">Se connecter </a>  </h1> <!-- on affiche le boutton pour se connecter -->
        </div>
    </section>

    <?php } ?>

    <section>
        <div id="c">  <h2>Les objectifs</h2>
          <br>
          <br>
          Pourquoi cherchez-vous une salle de sport ? <br>
          Que souhaitez-vous améliorer en pratiquant une activité sportive régulièrement ? <br>
          Les coachs de votre club O’Top Chambéry sont là pour vous faire atteindre votre but. <br>
          Dites-nous quel est votre objectif, nous élaborons votre programme d’entrainement ! <br>
          EN SAVOIR +
         </div>


         <div id="e">  <h2>Les objectifs</h2>
           <br>
           <br>
           Pourquoi cherchez-vous une salle de sport ? <br>
           Que souhaitez-vous améliorer en pratiquant une activité sportive régulièrement ? <br>
           Les coachs de votre club O’Top Chambéry sont là pour vous faire atteindre votre but. <br>
           Dites-nous quel est votre objectif, nous élaborons votre programme d’entrainement ! <br>
           EN SAVOIR +
          </div>

          <div id="f">  <h2>Les objectifs</h2>
            <br>
            <br>
            Pourquoi cherchez-vous une salle de sport ? <br>
            Que souhaitez-vous améliorer en pratiquant une activité sportive régulièrement ? <br>
            Les coachs de votre club O’Top Chambéry sont là pour vous faire atteindre votre but. <br>
            Dites-nous quel est votre objectif, nous élaborons votre programme d’entrainement ! <br>
            EN SAVOIR +
           </div>
    </section>



    <footer>
      <div id="g"> <p> Pour nous contacter veuillez vous adresser ......© 2020</p> </div>

    </footer>
</body>
</html>

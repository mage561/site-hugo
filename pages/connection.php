<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta charset="utf-8">

    <title>Connexion</title>
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

    <section>



        <div id="e">  <h2>Entrez vos identifiants</h2>
           <br>
           <br>
           <div class="row">
            <form id="Connexion" method="post" action="../traitement/traitementConnection.php" >
              <div class="col s6">
              <p>
                <label for="email">Adresse mail :</label> <br />
                <input type="email" name="email" id="email" size="60" />
              </p>
              </div>
              <div class="col s6">
              <p>
                <label for="password">Mot de passe :</label> <br />     
                <input type="password" name="password" id="password" size="60" />
              </p>
            </div>

              <input class="waves-effect blue-grey darken-2 btn" type="submit" name="connecter" id="connecter" value="Se connecter"/>

            </form>
          </div>
        </div>



         <div id="f">  <h2>Pas encore de compte ?</h2>
           <br>
           <p>
           Envoyez vos coordonées à l'adresse ci dessous et un administateur vous en crée un en 24h
          </p>
           <br>
        </div>



    </section>



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
</body>
</html>

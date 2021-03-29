<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style/connexion.css">
    <meta charset="utf-8">

    <title>Connexion</title>
</head>

<header>
<div id="image"></div>
</header>

<body>


    <section>
        <div id="d">
            <h1> <a href="../index.php">Retour à l'accueil</a>  </h1>

        </div>
    </section>


    <section>



        <div id="e">  <h2>Entrez vos identifiants</h2>
           <br>
           <br>
            <form id="Connexion" method="post" action="../traitement/traitementConnection.php" >
              <p>
                <label for="email">Adresse mail :</label> <br />
                <input type="email" name="email" id="email" size="60" />
              </p>

              <p>
                <label for="password">Mot de passe :</label> <br />     
                <input type="password" name="password" id="password" size="60" />
              </p>

              <input type="submit" name="connecter" id="connecter" value="Se connecter"/>

            </form>
        </div>



         <div id="f">  <h2>Pas encore de compte ?</h2>
           <br>
           <p>
           Envoyez vos coordonées à l'adresse ci dessous et un administateur vous en crée un en 24h
          </p>
           <br>
        </div>



    </section>



    <footer>
      <div id="g"> <p> Pour nous contacter veuillez vous adresser ......© 2020</p> </div>

    </footer>
</body>
</html>

<?php
	session_start();
	session_unset();
	session_destroy();
	session_write_close();
	session_regenerate_id(true);
	//Les 5 lignes ci-dessus permettent de supprimer les variables de session, et donc déconnecter l'utilisateur

	header("Location: ../index.php");
	//Cette instruction redirige l'utilisateur à la page de base du site
?>
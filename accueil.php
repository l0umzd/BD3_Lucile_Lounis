<?php
  session_start() ;
?>
<html>
<head><title>Bienvenue sur ton garde robe electronique!</title></head>
<body>
<h1 align="center">Bienvenue!</h1> <br/><br/>
<?php
	if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] != "") {
		echo '<a href="deconnexion.php">Se déconnecter (connecté en tant que '.$_SESSION['pseudo'].')</a>';
		$connect = 1;
	}
	else {
		echo '<a href="inscription.php">S\'inscrire</a> - <a href="connexion.php">Se connecter</a>';
		$connect = 0;
	}
?>
<a href="creationtenue.php" align="center">Créer Tenue</a>
<a href="gallerietenues.php" align="center">Voir Tenues</a>
<a href="top10.php" align="center">Top 10</a>
<br/><br/>
</body>
</html>

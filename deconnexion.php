<?php
	session_start();
?>
<html>
<head><title>Deconnexion</title></head>
<body bgcolor="#f9e6fe" text="191970">
<h1 align="center">Déconnexion</h1>
<?php
	$_SESSION = array();
	session_destroy();
?>
Vous avez bien été déconnecté.<br/><br/>
<a href="accueil.php">Retour à l'accueil</a>
</body>
</html>

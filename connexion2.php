<?php 
	session_start() ;
?>
<html>
<head><title>onnexion</title></head>
<body>
<h1 align="center">Connexion - 2</h1>
<?php
	if (!empty($_POST["pseudo"]) and !empty($_POST["pass"])) {
		$pseudo = $_POST["pseudo"];
		$pass = $_POST["pass"];
		
		$connexion=mysqli_connect("mysql03.univ-lyon2.fr", "php_lmazenod", "7grcLredXvjBIAXGl1fAfaKPW");
		mysqli_select_db($connexion,"closet_db");

		$req='SELECT Pseudo, Id_User FROM utilisateur WHERE Pseudo="'.$pseudo.'" AND Mdp="'.$pass.'";';

		$res=mysqli_query($connexion, $req);

		if(mysqli_num_rows($res)==1){
			echo 'Vous êtes bien connecté';
			$_SESSION['pseudo'] = $pseudo;
			$enreg_utilisateur = mysqli_fetch_array($res);
			$_SESSION['ID'] = $enreg_utilisateur['Id_User'];
	}
		else {
		echo 'Pseudo ou mot de passe incorrect!';
	}
	mysqli_close($connexion);


		echo '<br/><br/><a href="index.php">Retour à l\'index</a>';
	}
	else {
		die("Vous devez indiquer un nom d'utilisateur et un mot de passe !");
	}
?>
</body>
</html>

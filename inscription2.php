<?php
  session_start() ;
?>
<html>
<head><title>Inscription</title></head>
<body>
  <h1 align="center">Validation de l'inscription</h1>
  <?php
    if(isset($_SESION['pseudo']) AND $_SESSION['pseudo'] != ""){
      die('Vous êtes déjà connecté. <a href="accueil.php">Retour à l\'accueil</a>');
    }
  ?>

  <?php
    if (empty($_POST["pseudo"]) or empty($_POST["pass1"]) or empty($_POST["pass2"]) or empty($_POST["mail"])) {
		die("Vous devez remplir TOUS les champs !");
	}
    else {
		$pseudo = $_POST["pseudo"];
		$pass1 = $_POST["pass1"];
		$pass2 = $_POST["pass2"];
		$mail = $_POST["mail"];

		if ($pass1 != $pass2) {
			die("Les deux mots de passe doivent être identiques !");
		}
		else {
			$connexion=mysqli_connect("mysql03.univ-lyon2.fr", "php_lmazenod", "7grcLredXvjBIAXGl1fAfaKPW");
			mysqli_select_db($connexion,"closet_db");

			$req = "INSERT INTO utilisateur (Pseudo, Email, Mdp) VALUES ('".$pseudo."', '".$mail."', '".$pass1."')";

			mysqli_query($connexion, $req);

			mysqli_close($connexion);

			echo 'Vous avez bien té enregisté.e avec le pseudo '.$pseudo.' et le mot de passe '.$pass1.' avec le mail '.$mail.'.';
			echo '<br/><a href="accueil.php">Retour à l\'accueil</a>';
		}
	}
  ?>
</body>
  
</html>

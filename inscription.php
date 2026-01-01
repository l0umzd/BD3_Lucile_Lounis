<?php
  session_start();
?>
<html>
<head><title>Inscription</title></head>

<body>
  <h1 align = "center">Formulaire d'inscription</h1>
  <?php
    if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] != ""){
      die('Vous êtes déjà  connecté. <a href="index.php">Retour à l\'accueil</a>');
    }
  ?>
  Veuillez remplir le formulaire suivant: <br/><br/>
  <form action="inscription2.php" method="POST">
    Pseudo: <input type="text" size="15" name="pseudo"><br/><br>
    Mot de passe: <input type="password" size="10" name="pass1"><br/><br>
    Confirmation: <input type="password" size="10" name="pass2"><br/><br>
    Addresse email: <input type="text" size="30" name="mail"><br/><br>
    <input type="submit" value="S'inscrire">   <input type="reset" value="Effacer"><br/><br>
  </form>

  <a href="index.php">Retour à la page d'accueil</a>
</body>
</html>

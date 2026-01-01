<?php
   session_start() ;   
?>
<html>
  <head><title>Connexion</title>
  </head>
  <body>
    <h1 aligh="center">Connectez-vous</h1><br/><br/>
    <?php
      if(isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] != ""){
        die('Vous êtes déjà connecté. <a href="accueil.php">Retour à l\'accueil</a>');
      }
    ?>
    <form action="connexion2.php" method="POST">
      Pseudo: <input type="text" name="pseudo"><br/><br/>
      Mot de passe: <input type="password" name="pass"><br/><br/>
      <input type="submit" value="Envoyer">   <input type="reset" value="Effacer">
    </form>
    <br/>
    <br/>
    <a href="accueil">Retour à l'accueil</a>
  </body>
</html>

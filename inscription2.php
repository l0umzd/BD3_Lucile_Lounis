<?php
  session_start() ;
?>
<html>
<head><title>Inscription</title></head>
<body>
  <h1 align="center">Validation de l'inscription</h1>
  <?php
    if(isset($_SESION['pseudo']) AND $_SESSION['pseudo'] != ""){
      die('Vous êtes déjà connecté. <a href="index.php">Retour à l\'accueil</a>');
    }
  ?>
</body>
  
</html>

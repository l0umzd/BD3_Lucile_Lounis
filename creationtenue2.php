<?php
session_start();
if (!isset($_SESSION['Id_User'])) {
    die("Vous devez être connecté pour créer une tenue.");
}
?>
<html>
<head><title>Creation d'une tenue</title></head>
<body>
<h1 align="center">Créer une tenue2</h1><br/>
<?php
$connexion=mysqli_connect("localhost", "root", "") ;
mysqli_select_db($connexion,"closet_db");

if (!isset($_POST['items']) || empty($_POST['items'])) {
    die("Aucun vêtement sélectionné.");
}
if (empty($_POST['Titre_Tenue'])) {
    die("Le titre est obligatoire.");
}
$vetements = $_POST['items'];

$Id_User = $_SESSION['Id_User'];
$Titre_Tenue = $_POST['Titre_Tenue'];
$Id_Saison = $_POST['Id_Saison'] ?? 1;


$req = "INSERT INTO tenue (Titre_Tenue, Img_Tenue, Id_User, Id_Saison)
        VALUES ('$Titre_Tenue', '', $Id_User, $Id_Saison)";
mysqli_query($connexion, $req);


$Id_Tenue = mysqli_insert_id($connexion);


foreach($vetements as $Id_Vet){
  $req2 = "INSERT INTO tenue_vetement (Id_Tenue, Id_Vet) VALUES ($Id_Tenue, $Id_Vet)";
  $res2 = mysqli_query($connexion, $req2);
}
?>
<h2>Votre tenue: </h2> <?php echo htmlspecialchars($Titre_Tenue); ?>
<div class="tenue">
<?php
$req3 = "
SELECT v.Img_Vet
FROM vetement v
JOIN tenue_vetement tv ON v.Id_Vet = tv.Id_Vet
WHERE tv.Id_Tenue = $Id_Tenue
";

$res3 = mysqli_query($connexion, $req3);

while ($row = mysqli_fetch_assoc($res3)) {
    echo '<img src="'.$row['Img_Vet'].'" width="150">';
}
?>
</div>
<a href="creationtenue.php">Créer une autre tenue</a><br>
<a href="accueil.php">Retour à l'accueil</a>
</body>
</html>

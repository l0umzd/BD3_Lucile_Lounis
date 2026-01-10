<?php
session_start();
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

$vetements = $_POST['items'];

$Id_User = $_SESSION['Id_User'];
$Titre_Tenue = $_POST['titre'];
$Id_Saison = $_POST['Id_Saison'] ?? 1;


$sql = "INSERT INTO tenue (Titre_Tenue, Img_Tenue, Id_User, Id_Saison)
        VALUES (?, '', ?, ?)";
$stmt = mysqli_prepare($connexion, $sql);
mysqli_stmt_bind_param($stmt, "sii", $Titre_Tenue, $Id_User, $Id_Saison);
mysqli_stmt_execute($stmt);

$Id_Tenue = mysqli_insert_id($connexion);

$sql_link = "INSERT INTO tenue_vetement(Id_Tenue, Id_Vet) VALUES (?, ?)";
$stmt_link = mysqli_prepare($connexion, $sql_link);

foreach($vetements as $Id_Vet){
  mysqli_stmt_bind_param($stmt_link, "ii", $Id_Tenue, $Id_Vet);
  mysqli_stmt_execute($stmt_link);
}
?>
<h2>Votre tenue</h2>
<div class="outfit">
<?php
$req = "
SELECT v.Img_Vet
FROM vetements v
JOIN tenue_vetement tv ON v.Id_Vet = tv.Id_Vet
WHERE tv.Id_Tenue = $Id_Tenue
";

$res = mysqli_query($connexion, $req);

while ($row = mysqli_fetch_assoc($res)) {
    echo '<img src="'.$row['Img_Vet'].'" width="150">';
}
?>
</div>
<a href="creationtenue.php">Créer une autre tenue</a><br>
<a href="accueil.php">Retour à l'accueil</a>
</body>
</html>

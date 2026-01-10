<?php
session_start();

if (!isset($_SESSION['Id_User'])) {
    echo "Vous devez être connecté.<br>";
    echo '<a href="connexion.php">Se connecter</a>';
    exit;
}
?>
<html>
<head><title>Creation d'une tenue</title>
<style>
.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 15px;
}

.item {
    text-align: center;
    cursor: pointer;
}

.item img {
    width: 100%;
    border: 2px solid transparent;
}

.item input:checked + img {
    border-color: #000;
}

</style>
</head>
<body>
<h1 align="center">Créer une tenue</h1><br/>
<?php
$connexion=mysqli_connect("localhost", "root", "") ;
mysqli_select_db($connexion,"closet_db");

$req = "SELECT Id_Vet, Img_Vet FROM vetement";

$res=mysqli_query($connexion, $req); 
?>
<form method="POST" action="creationtenue2.php" enctype="multipart/form-data">
<label>Titre de la tenue :</label><br>
    <input type="text" name="Titre_Tenue" required><br><br>
    <label>Saison :</label><br>
    <select name="Id_Saison">
        <?php
        $req2 = "SELECT Id_Saison, Nom_Saison FROM saison";
        $res2 = mysqli_query($connexion, $req2);
        while ($s = mysqli_fetch_assoc($res2)) {
            echo '<option value="'.$s['Id_Saison'].'">'.$s['Nom_Saison'].'</option>';
        }    
        ?>
    </select><br><br> 
    <label>Image de la tenue :</label><br>
<input type="file" name="img_tenue" accept=".jpg,.jpeg,.png" required>
<br><br>
    <div class="gallery">
        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
            <label class="item">
                <input type="checkbox" name="items[]" value="<?= $row['Id_Vet'] ?>">
                <img src="<?= $row['Img_Vet'] ?>">
            </label>
        <?php } ?>
 </div>
 <button type="submit">Créer</button>
</form>

<a href="accueil.php">Retour a l'accueil</a>
</body>
</html>

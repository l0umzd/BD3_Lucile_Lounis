<?php
	session_start();
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
<form method="POST" action="creationtenue2.php">
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

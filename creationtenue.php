<?php
	session_start();
?>
<html>
<head><title>Creation d'une tenue</title></head>
<body>
<h1 align="center">Créer une tenue</h1><br/>
<?php
$connexion=mysqli_connect("mysql03.univ-lyon2.fr", "php_lmazenod", "7grcLredXvjBIAXGl1fAfaKPW") ;
mysqli_select_db($connexion,"closet_db");

$req = "SELECT Id_Vet, Img_Vet FROM vetements";

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

<?php
session_start();

?>
<html>
<head>
<title>Top 10 Tenues</title>
 <style>
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }
        .card {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        img {
            width: 100%;
        }
    </style>
</head>
<body>
<h1 align= "center">Top 10 des tenues</h1>
<div class "gallery">
<?php
$connexion = mysqli_connect("localhost", "root", "");
mysqli_select_db($connexion, "closet_db");

$req = "
SELECT 
    t.Id_Tenue,
    t.Titre_Tenue,
    t.Img_Tenue,
    u.Pseudo,
    AVG(n.Note) AS Moyenne,
    COUNT(n.Note) AS NbVotes
FROM tenue t
JOIN utilisateur u ON t.Id_User = u.Id_User
JOIN notation n ON t.Id_Tenue = n.Id_Tenue
GROUP BY t.Id_Tenue
ORDER BY Moyenne DESC, NbVotes DESC
LIMIT 10
";
$res = mysqli_query($connexion, $req);
$rank = 1;

while ($row = mysqli_fetch_assoc($res)){
  echo '<div class = "card">';
  echo '<h3>#'.$rank.'</h3?';
  echo '<img.scr = "'.$row['Img_Tenue'].'">';
  echo '<h4>'.htmlspecialchars($row['Titre_Tenue']).'</h4>';
  echo '<p>Par <b>'.$row['Pseudo'].'</b></p>';
  echo '<p>⭐ '.number_format($row['Moyenne'], 1).' / 10</p>';
  echo '<p>('.$row['NbVotes'].' votes)</p>';
  echo '</div>';
  $rank++;
}
?>
</div>
<br>
<a href="accueil.php">Retour à l'accueil</a>
</body>
</html>

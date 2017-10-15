<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <?php
            try{
        $bdd = new PDO('mysql:host=sqletud.u-pem.fr;dbname=tsenilh_db', 'tsenilh', '24theo08!!!');
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    $requete = $bdd->query('SELECT * FROM article');
    while($donnees = $requete->fetch()){
        echo "<h1>".$donnees['titre']."</h1>";
        echo "<p>".$donnees['resume']."</p>";
        echo "<a href=\"article.php?id=".$donnees['id']."\">Voir l'article</a>";
    }
    $requete->closeCursor();
        ?>
</body>
</html>
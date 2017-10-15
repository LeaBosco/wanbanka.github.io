<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Envoicomment</title>
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
    $identite = intval($_POST['identifiant']);
    $ide = intval($_POST['ide']);
    $jour = date("d-m-Y");
    $heure = date("H:i", strtotime('+2 hours'));
    $comment = addslashes($_POST['commentaire']);
    $inscrit = $bdd->prepare('INSERT INTO commentaires(contenu, jour_publication, heure_publication, id_utilisateur, id_article) VALUES(:comment, :jour, :heure, :identite, :ide)');
    $inscrit->execute(array('comment' => $comment,
                            'jour' => $jour,
                            'heure' => $heure,
                            'identite' => $identite, 
                           'ide' => $ide)) or die(print_r($inscrit->errorInfo()));
    echo "<p>Commentaire ajouté</p>";
    echo "<a href=\"article.php?id=".$ide."\" onload=\"setTimeout(\'redirectionJ(\'href\'), 2000\')\">Voir l'article</a>";
    ?>
    <script>
    function redirectionJ(lien) {
        document.location.href = lien;
    }
    </script>
</body>
</html>
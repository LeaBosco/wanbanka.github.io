<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commentaire</title>
</head>
<body>
   <section>
       <?php
    try{
        $bdd = new PDO('mysql:host=sqletud.u-pem.fr;dbname=tsenilh_db', 'tsenilh', '24theo08!!!');
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    $id = intval($_GET['id']);
        $selection = $bdd->prepare('SELECT * FROM article WHERE id = :identite');
        $selection->execute(array('identite' => $id));
        while ($preparer = $selection->fetch()){
            echo "<h1>".$preparer['titre']."</h1>";
            echo "<article>".$preparer['contenu_article']."</article>";
        }
       ?>
   </section><br>
   <fieldset><legend>Commentaire:</legend>
        <form action="envoicomment.php" method="post">
        <?php
        $identite = intval($_SESSION['id']);
        $id = intval($_GET['id']);
        echo "<input type=\"hidden\" name=\"identifiant\" id=\"identifiant\" value=\"$identite\">";
        echo "<input type=\"hidden\" name=\"ide\" id=\"ide\" value=\"$id\">";
        ?>
        <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Votre commentaire"></textarea><br>
        <input type="submit" value="Envoyer">
    </form>
    </fieldset>
     <a href="accueil2.php">Retour à l'accueil</a>
    <?php 
    
    $identite = intval($_GET['id']);
    $affiche = $bdd->prepare('SELECT pseudo, contenu, jour_publication, heure_publication FROM commentaires, inscription, article WHERE commentaires.id_utilisateur = inscription.id AND article.id = :identite AND article.id = commentaires.id_article ORDER BY jour_publication DESC, heure_publication DESC');
    $affiche->execute(array('identite' => $identite));
    while ($donnees = $affiche->fetch()) {
        $pseudo = stripslashes($donnees['pseudo']);
        $contenu = stripslashes($donnees['contenu']);
        echo "<p><strong>".$pseudo."</strong> ".$donnees['jour_publication']." à ".$donnees['heure_publication']."</p>";
        echo "<p>".$contenu."</p>";
    }
    $affiche->closeCursor();
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Le voilà, le mot de passe !</title>
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
    $personne = '';
    $mailing = '';
        $pseudo = addslashes($_POST['pseudo']);
        $mail = addslashes($_POST['mail']);
        $mdp = addslashes($_POST['mdp']);
        $confirmer = addslashes($_POST['confirmer']);
        $cherche = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = :pseudo');
        $cherche->execute(array('pseudo' => $pseudo));
        $donnees = $cherche->fetch();
        $personne = $donnees['pseudo'];
        $mailing = $donnees['mail'];
        $cherche->closeCursor();
         if ($personne == $pseudo){
             if($mailing == $mail){
            if ($mdp == $confirmer){
                $renouveler = $bdd->prepare('UPDATE inscription SET mot_de_passe = :mdp WHERE pseudo = :pseudo');
                $renouveler->execute(array('pseudo' => $pseudo,
                                          'mdp' => $mdp));
                    echo "<p>Votre mot de passe a été modifié. Bonne journée !</p>";
            } else {
                echo "<p>Le mot de passe et le mot de passe de confirmation ne correspondent pas. Veuillez recommencer.</p>";
            }
             } else {
                 echo "<p>Le mail n'est pas dans notre base de données. Veuillez recommencer.</p>";
             }
        } else {
            echo "<p>Vous n'êtes pas encore inscrit sur notre site.</p>";
        }
    ?>
    <a href="oubli_mdp.php">Retour en arrière</a>
</body>
</html>
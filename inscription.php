<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
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
        $nom = addslashes($_POST['nom']);
        $prenom = addslashes($_POST['prenom']);
        $pseudo = addslashes($_POST['pseudo']);
        $mail = addslashes($_POST['mail']);
        $mdp = addslashes($_POST['mdp']);
        $confirmer = addslashes($_POST['confirmer']);
        $verif = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = :pseudo');
        $verif->execute(array('pseudo' => $pseudo));
        $compte_pseudo = $verif->rowCount();
        $verif->closeCursor();
        $verif2 = $bdd->prepare('SELECT * FROM inscription WHERE mail = :mail');
        $verif2->execute(array('mail' => $mail));
        $compte_mail = $verif2->rowCount();
        $verif2->closeCursor();
        if ($compte_pseudo == 0){
            if ($compte_mail == 0){
                        if ($mdp == $confirmer){
        $inscrit = $bdd->prepare('INSERT INTO inscription(nom, prenom, pseudo, mail, mot_de_passe) VALUES(:nom, :prenom, :pseudo, :mail, :mdp)');
        $inscrit->execute(array('nom' => $nom,
                               'prenom' => $prenom,
                               'pseudo' => $pseudo,
                               'mail' => $mail,
                               'mdp' => $mdp));
        echo "<p>Vous êtes bien inscrit ! Bonne journée !</p>";
        } else {
        echo "<p>Votre mot de passe de confirmation ne correspond pas au mot de passe tapé précédemment. Veuillez recommencer.</p>";
        }
            } else {
                echo "<p>Ce mail a déjà été utilisé.</p>";
                }
                    } else {    
                        echo "<p>Le pseudo est déjà utilisé.</p>";
                    }
    ?>
    <a href="formulaire.php">Retour en arrière</a>
</body>
</html>
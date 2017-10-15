<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification</title>
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
        $mail = addslashes($_POST['mail']);
        $mdp = addslashes($_POST['mdp']);
        $verification = $bdd->prepare('SELECT * FROM inscription WHERE mail = :mail');
        $verification->execute(array('mail' => $mail));
        $donneesr = $verification->fetch();
        $recup = $donneesr['mail'];
        $recuppseudo = $donneesr['pseudo'];
        $identifiant = $donneesr['id'];
        $verification->closeCursor();
        $verification2 = $bdd->prepare('SELECT mot_de_passe FROM inscription WHERE mail = :mail');
        $verification2->execute(array('mail' => $mail));
        $donnees = $verification2->fetch();
        $recup2 = $donnees['mot_de_passe'];
        $verification2->closeCursor();
        if ($mail == $mail){
            if ($mdp == $recup2){
                $_SESSION['id'] = $identifiant;
                echo "<form action=\"accueil2.php\" method=\"post\" id=\"automatique\"><input type=\"hidden\" name=\"identifie\" id=\"identifie\" value=\"".$_SESSION['id']."\"></form>";
            } else {
                echo "<p>Le mot de passe n'est pas correct. Veuillez le retaper.</p>";
                echo "<a href=\"connexion.php\">Retour en arrière</a>";
            }
        } else {
            echo "<p>Le mail n'est pas dans notre base de données. Veuillez recommencer.</p>";
            echo "<a href=\"connexion.php\">Retour en arrière</a>";
        }
    ?>
    <script>
    document.getElementById('automatique').submit();
    </script>
</body>
</html>
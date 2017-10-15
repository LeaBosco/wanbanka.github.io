<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>No password</title>
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
    $mdp = $_GET['m'];
    $pseudo = $_GET['p'];
    $recherche = $bdd->prepare('SELECT mail, mot_de_passe FROM inscription WHERE mail = :mail AND mot_de_passe = :mot_de_passe');
    $recherche->execute(array('mail' => $pseudo,
                             'mot_de_passe' => $mdp));
    $donnees = $recherche->fetch();
    if($pseudo !== '' && $mdp !== '' && $donnees['mail'] == ''){
        echo "<p>Votre mot de passe de confirmation ne correspond pas.</p>";
    }
    ?>
</body>
</html>
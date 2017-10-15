<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe</title>
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
    $confirmer = $_GET['c'];
    if($mdp !== '' && $confirmer !== '' && $mdp !== $confirmer){
        echo "<p>Votre mot de passe de confirmation ne correspond pas.</p>";
    }
    ?>
</body>
</html>
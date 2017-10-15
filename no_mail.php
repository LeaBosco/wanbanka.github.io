<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>No_mail</title>
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
    $recup2 = addslashes($_GET['e']);
$pseudo = $bdd->prepare('SELECT mail FROM inscription WHERE mail = :mail');
$pseudo->execute(array('mail' => $recup2));
$donnees = $pseudo->fetch();
if($recup2 !== '' && $donnees['mail'] !== $recup2){
    echo "<p>Le mail n'est pas rentré dans la base de données</p>";
}
    ?>
</body>
</html>
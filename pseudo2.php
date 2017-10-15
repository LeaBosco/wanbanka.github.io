<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Pseudo mauvais</title>
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
$recup = addslashes($_GET['p']);
$pseudo = $bdd->prepare('SELECT pseudo FROM inscription WHERE pseudo = :pseudo');
$pseudo->execute(array('pseudo' => $recup));
$donnees = $pseudo->fetch();
if($recup !== '' && $donnees[0] !== $recup){
    echo "<p>Le pseudo n'existe pas</p>";
}
?>
</body>
</html>
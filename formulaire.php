<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
</head>
<body>
    <form action="inscription.php" method="post">
        <fieldset><legend>Remplissez les champs suivants :</legend> 
        <label for="nom">Nom</label><input type="text" name="nom" id="nom" required pattern="[A-Z]{2,100}" autofocus><br>
        <label for="prenom">Prénom</label><input type="text" name="prenom" id="prenom" required pattern="[A-Za-zéèê]{2,50}"><br>
        <label for="pseudo">Pseudo</label><input type="text" name="pseudo" id="pseudo" required pattern="{5, 50}"><div id="apparait"></div>
        <label for="mail">Mail</label><input type="email" name="mail" id="mail" required><div id="pris"></div>
        <label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp" required pattern="{8}"><br>
        <label for="confirmer">Confirmer le mot de passe</label><input type="password" name="confirmer" id="confirmer" required pattern="{8}"><div id="incorrect"></div>
        <input type="submit" id="envoi" value="S'inscrire"><br><br>
        <input type="reset" value="Recommencer">
        </fieldset>
    </form>
    <script src="jquery-3.2.1.min.js"></script>
    <script>
    $(function() {
       $('#pseudo').blur(function() {
          var param = 'p=' + $('#pseudo').val();
           $('#apparait').load('pseudo.php',param);
       }); 
    });
    </script>
    <script>
        $(function() {
           $('#confirmer').blur(function() {
        var param2 = 'm=' + $('#mdp').val();
        var param3 = 'c=' + $('#confirmer').val();
        var param4 = param2 + '&' + param3;
        $('#incorrect').load('motdepasse.php',param4);
    });
        });
    </script>
    <script>
        $(function() {
            $('#mail').blur(function() {
                var param5 = 'e=' + $('#mail').val();
                $("#pris").load('mail.php',param5);
            });
        });
    </script>
</body>
</html>
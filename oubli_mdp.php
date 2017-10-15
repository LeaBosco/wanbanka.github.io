<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Oubli de mot de passe</title>
</head>
<body>
    <form action="affichage_mdp.php" method="post">
        <label for="pseudo">Pseudo</label><input type="text" name="pseudo" id="pseudo" required autofocus pattern="{50}"><div id="mauvais"></div>
        <label for="mail">Mail</label><input type="email" name="mail" id="mail" required><div id="nomail"></div>
        <label for="mdp">Taper le nouveau mot de passe</label><input type="password" name="mdp" id="mdp" required pattern="{8}"><br>
        <label for="confirmer">Taper à nouveau le mot de passe</label><input type="password" name="confirmer" id="confirmer" required pattern="{8}"><div id="impossible"></div>
        <input type="submit" value="Valider le nouveau mot de passe">
    </form>
    <script src="jquery-3.2.1.min.js"></script>
    <script>
    $(function() {
           $('#pseudo').blur(function() {
        var param = 'p=' + $('#pseudo').val();
        $('#mauvais').load('pseudo2.php',param);
    });
        });
    </script>
    <script>
    $(function() {
       $('#mail').blur(function() {
           var param2 = 'e=' + $('#mail').val();
           $('#nomail').load('no_mail.php',param2);
       }); 
    });
    </script>
    <script>
    $(function() {
           $('#confirmer').blur(function() {
        var param2 = 'm=' + $('#mdp').val();
        var param3 = 'c=' + $('#confirmer').val();
        var param4 = param2 + '&' + param3;
        $('#impossible').load('motdepasse.php',param4);
    });
        });
    </script>
</body>
</html>
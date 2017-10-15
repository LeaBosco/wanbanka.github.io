<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <form action="verif.php" method="post">
       <fieldset><legend>Espace de connexion</legend>
        <label for="mail">Mail</label><input type="email" name="mail" id="mail" required><br><div id="incorrect"></div>
        <label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp" required pattern="{8}"><br><div id="mot"></div>
        <a href="oubli_mdp.php">Mot de passe oublié ?</a><br>
        <input type="submit" value="Se connecter">
        </fieldset>
    </form>
    <script src="jquery-3.2.1.min.js"></script>
    <script>
    $(function() {
       $('#mail').blur(function() {
          var param = 'e=' + $('#mail').val();
           $('#incorrect').load('no_mail.php',param);
       }); 
    });
    </script>
    <script>
    $(function() {
       $('#mdp').blur(function() {
          var param2 = 'm=' + $('#mdp').val();
          var param3 = 'p=' + $('#mail').val();
          var param4 = param2 + '&' + param3;
          $('#mot').load('no_password.php',param4);
       }); 
    });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Espace clients</title>
</head>
<body>
    <p>Authentifiez-vous</p>
    <div id="inscription">
    <form method="POST" action="Client/authentification_va.php">
        <label for="identifiant">Identifiant</label><br>
        <input type="text" name="identifiant" id="identifiant" placeHolder="identifiant"><br>
        <label for="mdp">Mot de passe</label><br>
        <input type="password" name="mdp" id="mdp" placeHolder="mot de passe"><br>
        <button type="submit" id="connection">Connection</button>
    </form>
    <a href="inscription.php">Pas encore inscrit ?</a>
</div>
</body>
</html>


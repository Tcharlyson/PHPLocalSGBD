<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Espace inscription</title>
</head>
<body>
    <div id="inscription">
    <p>Inscrivez-vous</p>
    <form method="POST" action="Client/inscription_va.php" enctype="multipart/form-data">
        <input type="text" name="identifiant" id="identifiant" placeHolder="identifiant"><br>
        <input type="password" name="mdp" id="mdp" placeHolder="mot de passe"><br>
        <input type="text" name="nom" id="nom" placeHolder="nom"><br>
        <input type="text" name="prenom" id="prenom" placeHolder="prenom"><br>
        <input type="text" name="date_n" id="date_n" placeHolder="date de naissance"><br>
        <input type="email" name="email" id="email" placeHolder="email"><br>
        <input type="file" name="file" id="file" accept="image/gif, image/jpeg, image/png"><br>
        <button type="submit" name"inscription" value="Inscription">Inscription</button>
    </form>
    </div>
    
    <?php 
    if (!isset($_POST['nom'])) {
       echo "Il y a des erreurs dans votre formulaire :<br>";
       foreach ($_SESSION['nom'] as $key => $value) {
           echo '<ul><li style=color:red>' . $value . '</ul></li>';
       }
    }
    ?>
    </div>
</body>
</html>


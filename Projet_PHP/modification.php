<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Espace modification</title>
</head>
<body>
    <div id="inscription">
    <p>Modifiez vos données</p>
    <form method="POST" action="Client/modification_va.php" enctype="multipart/form-data">
        <input type="text" name="identifiant" id="identifiant_mo"><br>
        <input type="password" name="mdp" id="mdp" placeHolder="mot de passe" value="<?php if(isset($_SESSION['mdp'])) echo htmlspecialchars($_SESSION['mdp']);?>"><br>
        <input type="text" name="nom" id="nom" placeHolder="nom" value="<?php if(isset($_SESSION['nom'])) echo htmlspecialchars($_SESSION['nom']);?>"><br>
        <input type="text" name="prenom" id="prenom" placeHolder="prenom" value="<?php if(isset($_SESSION['prenom'])) echo htmlspecialchars($_SESSION['prenom']);?>"><br>
        <input type="text" name="date_n" id="date_n" placeHolder="Retaper votre date de naissance"><br>
        <input type="email" name="email" id="email" placeHolder="email" value="<?php if(isset($_SESSION['email'])) echo htmlspecialchars($_SESSION['email']);?>"><br>
        <input type="file" name="file" id="file" accept="image/gif, image/jpeg, image/png"><br>
        <button type="submit" name"modification" value="Modification">Modification</button>
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


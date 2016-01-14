<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Espace membre</title>
</head>
<body>
	<?php 
		echo "<div id='conn'>";
    	echo "<p>Vous êtes connecté</p><br>Voici vos informations " . $filearray[2] . ' ' . $filearray[3] . "<br><br><br>";
        echo "<img src='$filearray[6]'>";
    	echo "<span>Identifiant:</span> " . $filearray[0] . "<br>";
    	echo "<span>Mot de passe:</span> " . $filearray[1] . "<br>";
    	echo "<span>Nom:</span> " . $filearray[2] . "<br>";
    	echo "<span>Prénom:</span> " . $filearray[3] . "<br>";
    	echo "<span>Date de naisance:</span> " . $filearray[4] . "<br>";
    	echo "<span>Email:</span> " . $filearray[5] . "<br>";
        if (isset($_POST['identifiant']) && isset($_POST['mdp'])) 
        {
    	$_SESSION['identifiant'] = $filearray[0];
    	$_SESSION['mdp'] = $filearray[1];
        $_SESSION['nom'] = $filearray[2];
        $_SESSION['prenom'] = $filearray[3];
        $_SESSION['email'] = $filearray[5];
        $_SESSION['date_n'] = $filearray[4];
        }
        echo "<br><a href='../modification.php'>Modifier mes informations</a><br>";
        echo "<a href='../deconnexion.php'>Deconnexion</a>";
        echo "</div>";
     ?>
 </body>
 </html>
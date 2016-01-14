<?php
session_start();

    if (isset($_SESSION["identifiant"]) && isset($_SESSION["mdp"]))
    {
    $filename = $_SESSION["identifiant"].".txt";
    $filestring = file_get_contents($filename);
    $filearray = explode("\n", $filestring);
    if ($_SESSION["identifiant"] == $filearray[0] && $_SESSION["mdp"] == $filearray[1]) {
        include('administration_va.php');
    }
    else
    {
        echo "<p style='color:red'>Identifiant ou mot de passe incorrect</p><br>";
        echo "<a href='javascript:history.go(-1)'>Retour</a>";
    }  
    }
    else
    {
        echo "Veuillez vous connecter<br>";
        echo "<a href='../authentification.php'>Retour</a>";
    }
?>
</body>
</html>

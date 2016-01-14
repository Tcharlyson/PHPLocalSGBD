<?php
session_start();

    if (isset($_POST["identifiant"]) && isset($_POST["mdp"]))
    {
    $filename = $_POST["identifiant"].".txt";
    $filestring = file_get_contents($filename);
    $filearray = explode("\n", $filestring);
    if ($_POST["identifiant"] == $filearray[0] && $_POST["mdp"] == $filearray[1]) {
        include('administration_va.php');
    }
    elseif ($_POST["identifiant"] == 'admin' && $_POST["mdp"] == 'admin') {
        header('Location: administration.php');
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

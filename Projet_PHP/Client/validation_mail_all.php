<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Envoyé</title>
</head>
<body>
    <?php
if (isset($_SESSION['tableau'])) {
    foreach ($_SESSION['tableau'] as $key => $value) {
        mail($value, $_POST['sujet'], $_POST['message']);
            }
    echo "<p>Votre mail a été envoyé correctement</p>";
    echo "<a href='administration.php'>Retour aux profils</a>";
}
?>
    


</body>
</html>

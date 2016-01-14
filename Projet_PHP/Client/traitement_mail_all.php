<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Mail</title>
</head>
<body>
    <?php echo "<p>Destinataires : " . $_POST['nombre'] . "</p>"; ?>
    <form method="POST" action="validation_mail_all.php">
        <div id="conn">
        <input type="text" name="email" id="email_post"><br>
        <input type="text" name="nombre" id="email_post" value="<?php echo $_POST['nombre']; ?>"><br>
        <label for="sujet">Sujet</label><br>
        <input type="text" name="sujet" id="sujet"><br>
        <label for="message">Message</label><br>
        <input type="text" name="message" id="message"><br>
        <button type="submit" name"mail" value="Mail">Envoyer mail</button>
    </form>
    </div>
</body>
</html>



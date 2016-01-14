<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Mail</title>
</head>
<body>
    <?php echo "<p>Destinataire :<br>" . $_POST['email'] . "</p>"; ?>
    <form method="POST" action="validation_mail.php">
        <div id="conn">
        <input type="text" name="email" id="email_post" value="<?php echo $_POST['email']; ?>" placeHolder="email"><br>
        <label for="sujet">Sujet</label><br>
        <input type="text" name="sujet" id="sujet" placeHolder="sujet"><br>
        <label for="message">Message</label><br>
        <input type="text" name="message" id="message" placeHolder="message"><br>
        <button type="submit" name"mail" value="Mail">Envoyer mail</button>
    </form>
    </div>
</body>
</html>



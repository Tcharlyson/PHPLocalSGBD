<?php session_start(); ?><link rel="stylesheet" href="../style.css">
<?php 
$email = array();
$dir = "./";
echo "<div id='admi'>";
echo "<p>Bienvenue admin !</p>";
echo "</div>";
$compteur=0;
//  si le dossier pointe existe
if (is_dir($dir)) {

   // si il contient quelque chose
   if ($dh = opendir($dir)) {

       // boucler tant que quelque chose est trouve
       while (($file = readdir($dh)) !== false) {
        
           if (preg_match('/^.*\.(txt)$/i', $file) && isset($file)) {
            $compteur+=1;
            $session = file($file);
            echo "<div id='admi'>";
            echo "<span>Fichier:</span> " . $file . "<br />\n";
             echo "<span>Identifiant:</span> " . $session[0] . "<br>";
              echo "<span>Mot de passe:</span> " . $session[1] . "<br>";
              echo "<span>Nom:</span> " . $session[2] . "<br>";
              echo "<span>Prenom:</span> " . $session[3] . "<br>";
              echo "<span>Date de naisance:</span> " . $session[4] . "<br>";
              echo "<span>Email:</span> " . $session[5] . "<br>";
              $email[] = $session[5];
              $_SESSION['tableau'] = $email;
             echo "<img src='$session[6]'><br><br>";
             echo "<form method='POST' action='traitement_mail.php'>
                  <input type='email' name='email' id='email_post' value='$session[5]'><br>
                  <button type='submit' name'test' id='submit'>Envoyer mail</button>
                  </form>";
            }
           
       }
       
       closedir($dh);
   }
   echo "<form method='POST' action='traitement_mail_all.php'>
                  <input type='email' name='email' id='email_post'><br>
                  <input type='text' name='nombre' id='email_post' value='$compteur'><br>
                  <button type='submit' name'test' id='submit'>Envoyer mail global</button>
                  </form>";
   echo "<a href='../deconnexion.php'>Deconnexion</a>";
   echo "</div>";
}
?>
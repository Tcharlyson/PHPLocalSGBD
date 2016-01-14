<?php 
session_start();
   
    function validident($identifiant)
    {
        return strlen($identifiant) >= 5 && preg_match("/^[a-zA-Z0-9]+$/", $identifiant);
    }
    function validname($name)
    {
        return strlen($name) >= 2 && preg_match("/^[a-zA-Z-' ]+$/", $name);
    }
    function validmdp($mdp)
    {
        return strlen($mdp) >= 5;
    }
    function validmail($email)
    {
        return $email === filter_var($email,FILTER_VALIDATE_EMAIL);
    }
    function validdate($month, $day, $year)
    {
        return checkdate($month, $day, $year);
    }
    $errors = array();

    $dat = stripSlashes($_POST['date_n']);
    if (!ereg("^([0-9]){2}/([0-9]){2}/([1-2])([0-9]){3}$", $dat)) {
        $errors[] = "La date de naissance n'est pas au bon format.";
    } else {
        $champsDate = explode("/", $dat);
        if (!checkdate($champsDate[1], $champsDate[0], $champsDate[2])) {
            $errors[] = "La date de naissance est invalide.";
        }
    }

    if ($_FILES['file']['error'] > 0) $errors[] = "Erreur lors du transfert";
    
    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
    $extension_upload = strtolower(  substr(  strrchr($_FILES['file']['name'], '.')  ,1)  );
    if (!in_array($extension_upload,$extensions_valides) ) 
        {
            $errors[] = "Extension incorrecte";
        }

    if (!validname($_POST['prenom'])) 
    {
        $errors[] = 'Votre Prenom ne semble pas valide';
    }
    if (!validmail($_POST['email'])) 
    {
        $errors[] = 'Votre Mail ne semble pas valide';
    }
    if (!validname($_POST['nom'])) 
    {
        $errors[] = 'Votre Nom ne semble pas valide';
    }
    if (!validident($_SESSION['identifiant'])) 
    {
        $errors[] = 'Votre Identifiant ne semble pas valide';
    }
    if (!validmdp($_POST['mdp'])) 
    {
        $errors[] = 'Votre Mot de passe ne semble pas valide';
    }
    

$filename = $_POST['identifiant'].'.txt';

$target_dir = "../Avatar/";
$imageFile = pathinfo($target_dir . $_FILES["file"]["name"],PATHINFO_EXTENSION);
$target_file = $target_dir . basename($_SESSION['identifiant'] . ".$imageFile");
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

 $filename = "../Avatar/" . $_SESSION["identifiant"].".gif";
 $filename1 = "../Avatar/" . $_SESSION["identifiant"].".jpg";
 $filename2 = "../Avatar/" . $_SESSION["identifiant"].".png";
    unlink($filename);
    unlink($filename1);
    unlink($filename2);

if (file_exists($target_file)) {
    $errors[] = "L'image existe deja<br>";
    $uploadOk = 0;
}

if ($_FILES["file"]["size"] > 500000000) {
    $errors[] = "Votre avatar est trop grand<br>";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $errors[] = "Seuls les formats jpg, png et gif sont autorises<br>";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    $errors[] = "L'image n'a pas ete uploader<br>";

} 
if (count($errors) > 0)
    {
        $_SESSION['nom'] = $errors;
        header('Location: ../modification.php');
    }
    else
    {
         echo "Te revoila " . $_SESSION['identifiant'] ."<br><br>";
        echo "<a href='connection_va.php'>Acceder à mes informations</a><br>";
        echo "<a href='../deconnexion.php'>Deconnection</a><br>";
    }

if (count($errors) == 0) 
{
    
    $filename = $_SESSION["identifiant"].".txt";
    $id = array();
    $id[] = $_SESSION["identifiant"];
    unlink($filename);
    session_destroy();
    $_SESSION["identifiant"] = $id[0];

	file_put_contents($_SESSION['identifiant'] . ".txt", $_SESSION['identifiant'] ."\n". $_POST['mdp'] ."\n". $_POST['nom'] ."\n". $_POST['prenom'] ."\n". $_POST['date_n'] ."\n". $_POST['email'] ."\n". '../Avatar/'. $_SESSION['identifiant'] . '.' . $imageFileType,FILE_APPEND);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    session_start();
    $_SESSION['identifiant'] = $id[0];
        $_SESSION['mdp'] = $_POST['mdp'];
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['date_n'] = $_POST['date_n'];
        $_SESSION['email'] = $_POST['email'];
}


       
    
?>
<!DOCTYPE html>
<html>
<head>
<title>Formulaire d'informations d'utilisateur</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if(isset($_POST['username'])&& isset($_POST['password'])){
    echo"<h2> Vos Information son bien saisie </h2> \n";
    echo"<p> Bonjour" .$_POST['username'] ." " . $_POST['password'] ."</P> \n";

    setcookie('username' ,$_POST['username'],time()+3600);
    setcookie('password' ,$_POST['password'],time()+3600);
   

}else{
    if(isset($_COOKIE['username'])&& isset($_COOKIE['password'])){
        echo"<h2> Vos Informations sont bien saisie </h2> \n";
        echo"<p> Bonjour" .$_COOKIE['username'] ." " . $_COOKIE['password'] ."</P> \n";
        echo"<p> Vous informations sont connues et ils sont trouver dans les cookies de votre ordinateur </p> \n";
}else{
    echo"<h2> Vos Informations sont bien saisie </h2> \n";
    echo"<p> Vos informations sont inconnues car vous n'avez utilise ni le formulaire ni les cookies \n"; 

}
}
?>
</body>
</html>
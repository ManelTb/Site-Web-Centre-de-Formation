<!DOCTYPE html>
<html>
<head>
<title>Formulaire d'informations d'utilisateur</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
   if(isset($_COOKIE['username'])&& isset($_COOKIE['password'])&& isset($_COOKIE['adresse'])&& isset($_COOKIE['ville'])){

    setcookie('username' ,$_POST['username'],time()-3600);
    setcookie('password' ,$_POST['password'],time()-3600);
    
    echo"<h2> Les cookies sont supprimes </h2> \n";
   }
   ?>
   </body>
   </html>
    
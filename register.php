<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />

</head>
<body>
<?php
require('config.php');
if (isset( $_POST['nom']) ){
	
	// récupération des données du formulaire d'inscription
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$ville = $_POST['ville'];
	$datenaissance = $_POST['datenaissance'];
	$tel = $_POST['tel'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	// cryptage du mot de passe avec md5
	$password = md5($password);
	//requéte SQL + mot de passe crypté


	
    // $query = "INSERT into `users` (username, email, password)
    //           VALUES ('$username', '$email', '".hash('sha256', $password)."')";
	$query = "INSERT into `users` (nom, prenom, email,datenaissance, username,tel,ville,password)
	VALUES ('$nom', '$prenom', '$email','$datenaissance', '$username', '$tel','$ville', '$password')";	
	// Exécute la requête sur la base de données
    
	$res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
			 </div>";
    } else {echo ('erreur requete');}
}else{
?>

<form class="box" action="" method="post">
 
    <h1 class="box-title">S'inscrire</h1>
	<input type="text" class="box-input" name="nom" placeholder="Nom d'utilisateur" required />
	<input type="text" class="box-input" name="prenom" placeholder="Pénom d'utilisateur" required />
	<input type="date" class="box-input" name="datenaissance" placeholder="Date de Naissance" required />
	<input type="email" class="box-input" name="email" placeholder="Email" required />
	<input type="text" class="box-input" name="tel" placeholder="Tel"  />
	<input type="text" class="box-input" name="username" placeholder="Login" required />
    <input type="text" class="box-input" name="ville" placeholder="Ville"  />
    <input type="password" class="box-input" name="password" id="password" placeholder="Mot de passe" required  />
    <input type="password" class="box-input" name="verifpassword" id="verifpassword" placeholder="Confirmer Mot de passe" required onchange="verifierpwd();" />
    
	<input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>


<?php } ?>

<script type="text/javascript"> 
	var pass=document.getElementById('password');
	var verif=document.getElementById('verifpassword');
	function verifierpwd(){
	console.log(pass.value+";"+verif.value);
	
	if (verif.value != pass.value){
		
		
		alert('Mots de passe différents!');
		verif.value="";
		verif.focus();
	
		  } 
		   

		 
} 
 
</script>
</body>
</html>
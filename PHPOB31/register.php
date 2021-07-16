

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
 crossorigin="anonymous"> 
 <style>
      body {
	background:url(background.jpg) no-repeat center center fixed ;
	-webkit-background-size:cover;
	-moz-background-size:cover;
	-o-background-size:cover;
	background-size:cover;
}
      </style>
    <title>Inscription</title>
</head>
<body><div class="row">
    <div class="col-md-6 col-md-offset-3" id="login">
     
        <form class="box" action="" method="POST">
        <img src="img.png"  style="width:30%" >

        <center> <h1 class="box-title">S'inscrire</h1></center>
        <div class="form-group">    
    <label class="idn">Email : </label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="email" name="email" placeholder="Entrer email" required >
        </div>
</div>

<div class="form-group">    
    <label class="idn">Login : </label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="login" name="login" placeholder="Entrer identifiant" required >
        </div>
</div>

<div class="form-group">
    <label class="idn">Mot de passe : </label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrer mot de passe" required >
        </div>
</div>
<div class="form-group">
      <button type="submit" class="btn btn-primary">S'inscrire</button>
</div>
<p class="box-register">Déjà inscrit? <a href="auth.php">Connectez-vous ici</a></p>
</form>
<?php

if(isset($_REQUEST['retour']))
{
  $res=$_REQUEST['retour'];
  if($res)
  echo "<center><b><span style='color:green'>ajout avec succés</span></b></center>";
  else
  echo "<center><b><span style='color:red'>erreu d'insertion</span></b></center>";
}


?>
</body>
</html>
<?php 

 // Vérifie qu'il provient d'un formulaire
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $vemail= $_POST['email'] ;
    $vlogin = $_POST["login"]; 
    $vmdp = $_POST["mdp"];
    
    if (!isset($vemail)){
      die("S il vous plaît entrez votre email");
    }
    if (!isset($vlogin)){
      die("S'il vous plaît entrez votre nom");
    }
    if (!isset($vmdp)){
      die("S'il vous plaît entrez votre mdp");
    }
    
    //print "Salut " . $vlogin . " ;
  }

  // Vérifie qu'il provient d'un formulaire
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //identifiants mysql
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "gestion";
    $vemail= $_POST['email'] ;
    $vlogin = $_POST["login"]; 
    $vmdp = $_POST["mdp"];

    if (!isset($vemail)){
      die("S il vous plaît entrez votre email");
    }

    if (!isset($vlogin)){
      die("S il vous plaît entrez votre nom");
    }
    if (!isset($vmdp)){
      die("S il vous plaît entrez votre adresse e-mail");
    }  

    //Ouvrir une nouvelle connexion au serveur MySQL
    $mysqli = new mysqli($host, $username, $password, $database);
    
    //Afficher toute erreur de connexion
    if ($mysqli->connect_error) {
      die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }  
    
    //préparer la requête d'insertion SQL
    $statement = $mysqli->prepare("INSERT INTO users (email,login, mdp) VALUES(?,?,?)"); 
    //Associer les valeurs et exécuter la requête d'insertion
    $statement->bind_param('ss',$vemail, $vlogin, $vmdp); 
    
    if($statement->execute()){
      
        header('location: auth.php');
        //echo "salut" ;
      //print "Salut " . $name . ";
    }else{
        echo "erreur" ;
      //print $mysqli->error; 
    }
  }
  ?>
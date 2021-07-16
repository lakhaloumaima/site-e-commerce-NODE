<?php
require_once("MySQL.php");
try {
    //connexion à la base de donnée
    $connexionDB = new PDO("mysql:host=localhost;dbname=gestion", "root", "");
    $connexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}
// Hachage du mot de passe
//$pass_hache = sha1($_POST['password']);

// Vérification des identifiants
$login = $_POST['login'];
$mdp = $_POST['mdp'];
$req = $connexionDB->prepare("SELECT * FROM users WHERE login ='$login' AND mdp= '$mdp' ");
$req->execute(array($login,$mdp));

$resultat = $req->fetch();


  if ($resultat) {
    session_start();
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
   

    $_SESSION['login']=$login;
        if ( ($resultat['login'] == "adminS") AND
        ($resultat['mdp'] == "123") ) 
        {
            header("location:homeS.php");
          }
        elseif ( ($resultat['login'] == "adminM") AND 
        ($resultat['mdp'] == "123") ) 
        {
            header("location:homeM.php");
          }
          else {
            header("location:homeP.php");

          }
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
 crossorigin="anonymous"> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

    <title>Se connecter</title>
    <style>
      body {
	background:url(background.jpg) no-repeat center center fixed ;
	-webkit-background-size:cover;
	-moz-background-size:cover;
	-o-background-size:cover;
	background-size:cover;
}
      </style>
</head>

<body>
  
<div class="row">
    <div class="col-md-6 col-md-offset-3" id="login">
        <!--<form class="box" action="" method="POST"> -->
        <form  class="box" action="" method="POST" >
        <img src="img.png"  style="width:20%" >
            <center> <h1 class="box-title">Se connecter</h1> </center>
           
            <div class="form-group">
                <label for="login">Login: </label>
                <div class="input-group">
                    <span class="input-group-addon" ><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Entrer identifiant" required>
                 
                </div>
             
            </div>
           

            <div class="form-group">
                <label for="mdp">Mot de passe: </label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrer mot de passe">
                
                  </div>
            </div>
   

            <br>
            <div class="form-check">
            <a href=".php">Forgot password?</a> <br>
        <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
        <label class="form-check-label" for="autoSizingCheck2">
          Remember me
        </label>
      </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="msgSubmit">Connexion</button>
            </div>
            <p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>

        </form>


    </div>
</div>

<script>
function submitMSG(valid, msg){
  var msgClasses;
if(valid) {
  msgClasses = "h3 text-center tada animated text-success";
} else {
  msgClasses = "h3 text-center text-danger";
}
$("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}
</script>
</body>

</html>
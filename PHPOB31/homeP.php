<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: auth.php");
    exit(); 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title> espace patient</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
-->
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
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="homeP.php">Acceuil</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="glyphicon glyphicon-user"></i> Compte
                         <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="logout.php"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                        <!--<li><a href="#"><i class="fa fa-user-secret"></i> Mon Profile</a></li>-->
                            <li>
                            <a href="#"><i class="fa fa-unlock-alt"></i> Changer Mot de passe</a></li>
                        </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
    <br>
<div class="row">
    <div class="col-md-6 col-md-offset-1" id="login">
<img src="img.png"  style="width:20%" > 
<?php
require_once("Contact.php") ; //import 
 $contact=new Contact() ;
  $les_contact=$contact->editAll() ;
 //$les_patients=$patient->editBy($id) ;
 //$item=$patient->editBy($id);
 //$les_patients=$patient->editAll() ;

 require_once("Patient.php");
//$id = $_POST['id'] ;
 $patient = new Patient() ;
 $les_patients=$patient->editBy($id) ;
 ?>
<h1><marquee> bienvenue </marquee></h1>
<div class="row">
    <div class="col-md-5 col-md-offset-2" id="login">
<form class="box" method="GET">

    <a href='dossier.php?dd=$id' class='btn btn-primary' > Mon dossier </a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href='contactP.php?dd=4' class='btn btn-primary'> Contact </a> 
    

</form> 
</div>
</div>
</div>
</div>











</body>
</html>
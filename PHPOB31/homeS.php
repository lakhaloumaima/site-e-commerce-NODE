
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

    <title> espace secretaire</title>
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

<form action="" method="post">
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="homeS.php">Acceuil</a><!--ici j'ajoute logo-->*
            <a class="navbar-brand" href="Calendar 04.html">Agenda</a>
            <a class="navbar-brand" href="edit.php">Patients</a>
            <a class="navbar-brand" href="rdv.php">RDV</a>
            <a class="navbar-brand" href="contactList.php">Contact</a>
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
    <!-- /container -->
    
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-1" id="login">
<img src="img.png"  style="width:20%" > 

<h1><marquee> bienvenue </marquee></h1>
<div class="row">
    <div class="col-md-5 col-md-offset-2" id="login">
<form class="box" >
    <a href="Calendar 04.html" class="btn btn-info" > agenda </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="insertion_patient_form.php" class="btn btn-info"> Ajouter un patient </a>
</form> 
</div>
</div>
</div>
</div>
<div>
    
             
        
        
       
</div>
</form>
</body>
</html>
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
<html>
<head>
<style>
    form{
    margin-left:auto;
    margin-right:auto;
    width:500px;
    }
</style>
<title>insert patient</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
</div>

<form action="ajoutRDV_action.php" method="post">
<h1>Ajouter un RDV :</h1>
  <div class="form-group">
    <label for="idR">idR :</label>
    <input type="text" class="form-control" id="idR" name="idR" placeholder="Entrez idR">
  </div>

  <div class="form-group">
    <label for="dateR">DateR :</label>
    <input name="dateR"  id="dateR" class="form-control" placeholder="Entrer dateR">
  </div>
  <div class="form-group">
    <label for="time">Time :</label>
    <input name="time"  id="time" class="form-control" placeholder="Entrer time">
  </div>
  <div class="form-group">
    <label for="id">idP :</label>
    <input type="text" class="form-control" id="id" name="id" placeholder="Entrez idP">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      
      <input type="submit"  class="btn btn-outline-success" value="Ajouter" >
    </div>
    <div class="form-group col-md-6">
      
      <input type="reset"   class="btn btn-outline-success" value="effacer">
    </div>
  </div>   
</form>

<?php
if(isset($_REQUEST['retour']))
{
  $res=$_REQUEST['retour'];
  if($res)
  echo "<center><b><span style='color:green'>ajout avec succés</span></b></center>";
  else
  echo "<center><b><span style='color:red'>erreur d'insertion</span></b></center>";
}
?>
</body>
</html>
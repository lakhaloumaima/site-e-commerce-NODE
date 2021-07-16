<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: auth.php");
    exit(); 
  }
?>
<!doctype html> 
<html> 
<head>
<title>Liste RDV </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
.xyz{
 font-size:14px;
 font-family:Arial Black  ;
 color:black;

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
<h1>la liste des RDV : </h1>
<br>

 <?php
 
 require_once("RDVP.php") ; //import 
 $rdv = new RDVP() ;
 $les_rdvP=$rdv->editAll() ;
 echo "<table class='table table-bordered table-dark'>";
 echo"<tr class='xyz'>
 <th>idR</th>
 <th>idP</th>
 <th>Nom</th>
 <th>Prenom</th>
 <th>Date</th>
 <th>Time</th>
 <th>Actions</th> 
 </tr>" ;
 
 foreach ($les_rdvP as $item) {
 echo  "<tr>
 <td class='xyz' class='p-3 mb-2 bg-dark text-white'>" . $item['idR'] ."</td>
 <td class='xyz'>".$item['id']."</td>
 <td class='xyz'>" . $item['nom']."</td>
 <td class='xyz'>".$item['prenom']."</td>
 <td class='xyz'>".$item['dateR']."</td>
 <td class='xyz'>".$item['time']."</td>
 <td>
<a  class='btn btn-danger' href='suppRDV.php?dd=$item[0]'> Supprimer</a>
<a class='btn btn-info' href='modifierRDV.php?dd=$item[1]'> Modifier</a>
</tr>";
}
echo "</table>" ;
?>
<div class="col-md-6 col-md-offset-3" id="login">
<div class="row">
<a class="btn btn-success" href="ajoutRDV.php">Ajouter</a>
</div></div>
</body>
</html>
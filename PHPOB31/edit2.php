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
<title>Liste patient </title>
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
    * {
  box-sizing: border-box;
}

.openBtn {
  background: #f1f1f1;
  border: none;
  padding: 10px 15px;
  font-size: 20px;
  cursor: pointer;
}

.openBtn:hover {
  background: #bbb;
}

.overlay {
  height: 100%;
  width: 100%;
  display: none;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
}

.overlay-content {
  position: relative;
  top: 46%;
  width: 80%;
  text-align: center;
  margin-top: 30px;
  margin: auto;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
  cursor: pointer;
  color: white;
}

.overlay .closebtn:hover {
  color: #ccc;
}

.overlay input[type=text] {
  padding: 15px;
  font-size: 17px;
  border: none;
  float: left;
  width: 80%;
  background: white;
}

.overlay input[type=text]:hover {
  background: #f1f1f1;
}

.overlay button {
  float: left;
  width: 20%;
  padding: 15px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.overlay button:hover {
  background: #bbb;
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
            <a class="navbar-brand" href="homeM.php">Acceuil</a><!--ici j'ajoute logo-->*
            <a class="navbar-brand" href="Calendar 04.html">Agenda</a>
            <a class="navbar-brand" href="edit2.php">Patients</a>
            <a class="navbar-brand" href="listeMaladie.php">liste Maladie</a>
            <a class="navbar-brand" href="ficheListe.php">liste fichiers</a>
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
<button class="openBtn" onclick="openSearch()">Rechercher </button>

<script>
function openSearch() {
  document.getElementById("myOverlay").style.display = "block";
}

function closeSearch() {
  document.getElementById("myOverlay").style.display = "none";
}
</script>
<div id="myOverlay" class="overlay">
  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
  <div class="overlay-content">
    <form action="search2.php">
      <input type="text" placeholder="Search.." name="id">
      <button type="submit" ><i class="fa fa-search"></i>rechercher</button>
    </form>
  </div>
</div>
<h1>la liste des patients : </h1>
<br>

 <?php
require_once("Patient.php") ; //import 
 $patient = new Patient() ;
 $les_patients=$patient->editAll() ;
echo "<table class='table table-bordered table-dark'>";
echo"<tr class='xyz'>
<th>id</th>
<th>Nom</th>
<th>Prenom</th>
<th> Age</th>
<th>Sexe</th>
<th>Tel</th>
<th>Adresse</th>
<th>Actions</th> 
</tr>" ;

foreach ($les_patients as $item) {
echo  "<tr>
<td class='xyz' class='p-3 mb-2 bg-dark text-white'>" . $item[0] ."</td>
<td class='xyz'>".$item['1']."</td>
<td class='xyz'>" . $item[2]."</td>
<td class='xyz'>".$item[3]."</td>
<td class='xyz'>".$item[4]."</td>
<td class='xyz'>".$item[5]."</td>
<td class='xyz'>".$item[6]."</td>
<td>
<a class='btn btn-primary' href='details.php?dd=$item[0]'>Voir</a>
<a  class='btn btn-danger' href='supp_sql2.php?mm=$item[0]'> Supprimer</a>
<a class='btn btn-info' href='modif_sql.php?dd=$item[0]'> Modifier</a>
</tr>";
}
echo "</table>" ;
?>



<!--
<tr class="table-active">...</tr>

<tr class="table-primary">...</tr>
<tr class="table-secondary">...</tr>
<tr class="table-success">...</tr>
<tr class="table-danger">...</tr>
<tr class="table-warning">...</tr>
<tr class="table-info">...</tr>
<tr class="table-light">...</tr>
<tr class="table-dark">...</tr>

<tr>
  <td class="table-active">...</td>
  
  <td class="table-primary">...</td>
  <td class="table-secondary">...</td>
  <td class="table-success">...</td>
  <td class="table-danger">...</td>
  <td class="table-warning">...</td>
  <td class="table-info">...</td>
  <td class="table-light">...</td>
  <td class="table-dark">...</td>
</tr>
-->
</body>
</html>

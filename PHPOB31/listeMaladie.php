
<!doctype html> 
<html> 
<head>
<title>Liste maladies </title>
<meta charset="UTF-8">
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
<h1>la liste des maladies : </h1>
<br>

 <?php
require_once("Maladie.php") ; //import 
 $maladie = new Maladie() ;
 $les_maladies=$maladie->editAll() ;
echo "<table class='table table-bordered table-dark'>";
echo"<tr class='xyz'>
<th class='xyz'>idM</th>
<th class='xyz'>NomSym</th>
<th class='xyz'>DescSym</th>
<th class='xyz'>Ordonance</th>
<th> Actions </th>
</tr>" ;

foreach ($les_maladies as $item) {
echo  "<tr >
<td class='xyz' class='p-3 mb-2 bg-dark text-white'>" . $item[0] ."</td>
<td class='xyz'>".$item['1']."</td>
<td class='xyz'>" . $item[2]."</td>
<td class='xyz'>".$item[3]."</td>
<td>
<a class='btn btn-primary' href='detailsM.php?dd=$item[0]'>Voir</a>
<a  class='btn btn-danger' href='suppMaladie.php?dd=$item[0]'> Supprimer</a>
<a class='btn btn-info' href='modif_sql.php?dd=$item[0]'> Modifier</a>
</tr>";
}
echo "</table>" ;
?>

<div class="col-md-6 col-md-offset-3" id="login">
<div class="row">
<a class="btn btn-success" href="ajout_maladie.php">Ajouter</a>
</div></div>
</body>
</html>

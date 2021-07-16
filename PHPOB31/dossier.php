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
<h1>Mon dossier : </h1>
<br>
<?php
require_once("Patient.php");
/*if(isset($_REQUEST['dd']))
{
$id=$_REQUEST['dd'];
}
*/
$id=$_GET['id'] ;
$patient = new Patient();
$le_patient= $patient -> editBy($id);

echo"$id" ;

/*if(isset($_REQUEST['dd']))
{
$num=$_REQUEST['dd'];
}


 $num=$_GET['dd'];
 $patient = new Patient() ;
 $les_patients=$patient->editBy($num) ; 

*/
/*require_once("Patient.php");
if(isset($_REQUEST['dd']))
{
$num=$_REQUEST['dd'];
}

 $num=$_GET['dd'];
 $patient = new Patient() ;
 $les_patients=$patient->editBy($num) ; 
 */

 
echo "<table class='table table-bordered table-dark'>";
echo"<tr class='xyz'>
<th>id</th>
<th>Nom</th>
<th>Prenom</th>
<th> Age</th>
<th>Sexe</th>
<th>Tel</th>
<th>Adresse</th> 
</tr>" ;

echo  "<tr class='xyz'>
<td class='p-3 mb-2 bg-dark text-white'>" . $le_patient[0] ."</td>
<td>".$le_patient['1']."</td>
<td>" .$le_patient[2]."</td>
<td>".$le_patient[3]."</td>
<td>".$le_patient[4]."</td>
<td>".$le_patient[5]."</td>
<td>".$le_patient[6]."</td>
</tr>";

echo "</table>" ;
 
?>

</body>
</html>
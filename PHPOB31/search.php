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
<title>Liste Search </title>
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

    } </style>
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
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
require_once("Patient.php" ) ;
$id=$_GET['id'] ;
//$nom=@$_POST['nom'];
if(isset($_POST['submit'])){
//String qr="select codeprod,nomprod,prix,sum(qte) as stock,sum(qte)*prix as montant from vue1 group by codeprod ";
$exer=mysqli_query($conn,"select * from patient where id='$id' ");
if($exer){
   print'<div style="overflow-x:auto;">';
	print"<table class='table table-bordered table-dark'>";
	print"<tr class='xyz'><th>Id /</th><th>Nom </th>
    <th>Prenom</th><th>Age</th><th>Sexe</th><th>Tel</th><th>Adresse</th></tr>";
	if($row = mysqli_fetch_assoc($exer)){
	$id=$row['id'];
	$nom=$row['nom'];
	$prenom=$row['prenom'];
	$age=$row['age'];
	$sexe=$row['sexe'];
    $tel=$row['tel'];
    $adresse=$row['adresse'];
	print"<tr class='xyz'>";
	print'<td>';
	     echo $id;
	print'</td>';
	
	
	print'<td>';
	     echo 	$nom;
	print'</td>';
	
		print'<td>';
	     echo 	$prenom;
	print'</td>';
	
	print'<td>';
	     echo 	$age;
	print'</td>';
	print'<td>';
	     echo 	$sexe;
	print'</td>';
	print'<td>';
	     echo 	$tel;
	print'</td>';
    print'<td>';
	     echo 	$adresse;
	print'</td>';
	
	print'</tr>';
		}
	print'</table >';
print'</div>';
}

}
?>
<?php 
require_once("Patient.php" ) ;

//affichage
$exe4=mysqli_query($conn,"select * from patient where id='$id' group by nom");
if($exe4){
   print'<div style="overflow-x:auto;">';
	print"<table  class='table table-bordered table-dark'>";
    print"<tr class='xyz'><th>Id </th><th>Nom </th>
    <th>Prenom</th><th>Age</th><th>Sexe</th><th>Tel</th><th>Adresse</th></tr>";
	while($row = mysqli_fetch_assoc($exe4)){
        $id=$row['id'];
        $nom=$row['nom'];
        $prenom=$row['prenom'];
        $age=$row['age'];
        $sexe=$row['sexe'];
        $tel=$row['tel'];
        $adresse=$row['adresse'];
        ?>
    <?php
        print"<tr class='xyz'>";
        print'<td>';
             echo $id;
        print'</td>';
        
        
        print'<td>';
             echo 	$nom;
        print'</td>';
        
            print'<td>';
             echo 	$prenom;
        print'</td>';
        
        print'<td>';
             echo 	$age;
        print'</td>';
        print'<td>';
             echo 	$sexe;
        print'</td>';
        print'<td>';
             echo 	$tel;
        print'</td>';
        print'<td>';
             echo 	$adresse;
        print'</td>';
        
        print'</tr>';
            }
        print'</table >';
    print'</div>';
    }
    

?>

<body>

</html>



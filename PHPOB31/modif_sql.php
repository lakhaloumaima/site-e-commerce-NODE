<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: auth.php");
    exit(); 
  }
?>
<html>
<head>
	<title>Modification de patient</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
    
    <?php
    
        echo "Modification de patient :";
        include "Patient.php";
        $vConn = fConnect();
        $id=$_POST['id'];
        $vSql= "SELECT * from patient where id='$id';";
        $vQuery = pg_query($vConn, $vSql);
        $vResult=pg_fetch_array($vQuery);
        if(!empty($vQuery)){
        echo '  <form method="POST" action="modif-sql.php">
        Nom :
        <input type="text" name="nom" value="'.$vResult[nom].'" required> </br>
	Prenom :
        <input type="text" name="prenom" value="'.$vResult[prenom].'" required> </br>
	Numéro de rue :
        <input type="text" name="num_rue" value="'.$vResult[age].'" required> </br>
	Rue :
        <input type="text" name="rue" value="'.$vResult[sexe].'" required> </br>
	Code Postal :
        <input type="text" name="code_postal" value="'.$vResult[tel].'" required> </br>
	Telephone :
        <input type="text" name="telephone" value="'.$vResult[adresse].'" required> </br>
        <input type="hidden" name="dossier" value="'.$id.'" required>

        <input type="submit"/> </form>';
	
	}

 pg_close($vConn);
    ?>

</body>

</html>






























<!--

// Récupérer l'id à modifier (depuis la page précédente)
/*$id = $_REQUEST['dd'] ;
// Connexion à la bdd
require_once("Patient.php") ;
// Récupérer toutes les données de l'étudiant relatif à l'ID récupéré
$res = "SELECT * FROM patient WHERE id=$id" ;
$etd = exec($res) ; // Ceci est UN SEUL patient
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

 <style>
	 form{
    margin-left:auto;
    margin-right:auto;
    width:500px;
    }
	</style>
	
	<style>
      body {
	background:url(background.jpg) no-repeat center center fixed ;
	-webkit-background-size:cover;
	-moz-background-size:cover;
	-o-background-size:cover;
	background-size:cover;
}
      </style>
 <title>Modifier un patient</title>
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
 <form action="modif_sql_action.php" >
 <h1>Modifier un patient</h1>
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" id="nom"  placeholder="Enter le nom" name="nom">  
  </div>
  <div class="form-group">
    <label for="prenom">Prenom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez le prenom">
  </div>
  <div class="form-group">
    <label for="age">Age</label>
    <input name="age"  id="age" class="form-control" placeholder="Enter l'age">
  </div>
  <div class="form-group">
    <label for="sexe">Sexe</label>
    <input type="text" class="form-control" name="sexe" id="sexe" placeholder="Enter le sexe"> 
  </div>
  <div class="form-group">
    <label for="tel">Tel</label>
    <input type="text" class="form-control" name="tel" id="tel" placeholder="Enter le telephone"> 
  </div>
  <div class="form-group">
    <label for="adresse">Adresse</label>
    <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Enter l'adresse"> 
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      
      <input type="submit" href='modif_sql_action.php?dd=$item[0]' class="btn btn-outline-success" value="Modifier" >
    </div>
    <div class="form-group col-md-6">
      
      <input type="reset"   class="btn btn-outline-success" value="effacer">
    </div>
  </div>   
</form>
 
</body>
</html>



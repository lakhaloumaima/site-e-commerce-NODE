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
    .xyz{
 font-size:14px;
 font-family:Arial Black ;
 color:black;

    }
    body {
	background:url(background.jpg) no-repeat center center fixed ;
	-webkit-background-size:cover;
	-moz-background-size:cover;
	-o-background-size:cover;
	background-size:cover;
}
</style>
<title>details maladie</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
      
<form action="" method="post">

<?php
require_once("Maladie.php");
if(isset($_REQUEST['dd']))
{
$num=$_REQUEST['dd'];

?>
 
 <br>
<?php
echo "<table class='table table-bordered table-dark'>";
echo"<tr>
<th class='xyz'>Détails du maladie Num: $num</th> </tr>" ;
echo "<center><b><span style='color:blue;font-size:2em'>
Détails du maladie Num: $num</span></b></center>"; ?> 

<ul>  
      <?php
require_once("Maladie.php");
 $maladie = new Maladie();
 $item=$maladie->editBy($num);
 echo "<tr>
 <td><div class='xyz'>Nom du maladie : $item[1]</div></td><br>
 <td><div class='xyz'>Description du maladie : $item[2]</div></td><br>
 <td><div class='xyz'>Ordonance du maladie : $item[3]</div></td><br>
 </tr></table>"  ;
}
 
else
echo "spécifier le code du patient";
?>
<button class="btn btn-primary" >
            <a  href="listeMaladie.php"  class="text-dark">Retour à la page d'acceuil</a>
        </button>
</form>
</body>
</html>
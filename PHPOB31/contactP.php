<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: auth.php");
    exit(); 
  }
?>
<!doctype htm>
<html>
    <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
  body {
	background:url(background.jpg) no-repeat center center fixed ;
	-webkit-background-size:cover;
	-moz-background-size:cover;
	-o-background-size:cover;
	background-size:cover;
}
.contact-form{
    background: #fff;
    margin-top: 10%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}
</style>

</head>
<body>
<?php
require_once("Contact.php");
require_once("Patient.php") ; //import 
$contact=new Contact() ;
 $patient = new Patient() ;
 $les_patients=$patient->editAll() ;
 $les_contact=$contact->editAll() ;
 ?>
<div class="container contact-form">
<button>
    <a href="homeP.php" class="btn btn-primary">Retour à la page d'acceuil</a>
</button>
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form action="contact_action.php" method="post">
                <h3>Contact :</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="nom" class="form-control" placeholder="Votr Nom *" value="" />
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="prenom" class="form-control" placeholder="Votre Prenom *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Votre Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btn btn-primary" value="Envoyer" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Votre Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>
<?php
if(isset($_REQUEST['retour']))
{
  $res=$_REQUEST['retour'];
  if($res)
  echo "<center><b><span style='color:green'>envoyée avec succés</span></b></center>";
  else
  echo "<center><b><span style='color:red'>erreur d'envoi </span></b></center>";
}
?>

</html>
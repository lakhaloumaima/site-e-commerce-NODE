<?php 
require_once("Patient.php") ;
require_once("Contact.php") ; //import

$idC =$_POST['idC'] ;
$nom =$_POST['nom'] ;
$prenom =$_POST['prenom'];
$email =$_POST['email'] ;
$message =$_POST['message'] ;
$id = $_POST['id'] ;

$contact= new Contact() ;
//$contact ->setIdC($idC) ;
$contact ->setNom($nom) ;
$contact ->setPrenom($prenom) ;
$contact->setEmail($email) ;
$contact->setMessage($message) ;
//$contact ->setIdP($id) ;

$retour=$contact->ajou($idC) ;

header("location:homeP.php?retour=$retour") ;

?>
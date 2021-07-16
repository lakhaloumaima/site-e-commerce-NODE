<?php 
require_once("Patient.php") ; //import
$nom =$_POST['nom'] ;
$prenom =$_POST['prenom'];
$age =$_POST['age'] ;
$sexe =$_POST['sexe'] ;
$tel =$_POST['tel'] ;
$adresse =$_POST['adresse'];

//echo ("$vtype ,$vcompany ,$vdescription ,$vdate_expiration ,$vemail ") ;
$patient= new Patient() ;
$patient ->setNom($nom) ;
$patient ->setPrenom($prenom) ;
$patient->setAge($age) ;
$patient->setSexe($sexe) ;
$patient ->setTel($tel) ;
$patient ->setAdresse($adresse) ;

$retour=$patient->ajouter() ;

header("location:edit.php?retour=$retour") ;

?>
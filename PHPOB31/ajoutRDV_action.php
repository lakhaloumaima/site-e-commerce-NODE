<?php 
require_once("RDVP.php") ; //import
require_once("Patient.php") ;
$idR =$_POST['idR'] ;
$dateR =$_POST['dateR'] ;
$time =$_POST['time'];
$id =$_POST['id'] ;

$rdvp= new  RDVP() ;
$rdvp ->setIdR($idR) ;
$rdvp ->setDateR($dateR) ;
$rdvp ->setTime($time) ;
$rdvp ->setIdP($id) ;


$retour=$rdvp->ajoutt($idR) ;

header("location:rdv.php?retour=$retour") ;

?>
<?php
require_once("Patient.php") ;
require_once("RDVP.php") ;
// Récupérer toutes les données de l'étudiant à modifier
$id = $_POST['idP'];
$dateR = $_POST['dateR'] ;
$time =$_POST['time'] ;
$idR = $_GET['idR'] ;

echo "$idR" ;
// Exécuter la requête SQL de mise à jour
$rdvp= new RDVP() ;
//$rdvp ->setIdR($idR) ;
$rdvp->setDateR($dateR) ;
$rdvp->setTime($time) ;
//$rdvp ->setIdP($id) ;
$retour=$rdvp->modif($idR) ;


// Redirection à la page principale
header("location:rdv.php?retour=$retour") ;
?>


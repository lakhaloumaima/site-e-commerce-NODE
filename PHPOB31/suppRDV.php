<?php
require_once("Patient.php") ;
require_once("RDVP.php") ; //import
//verifier si le formulaire a été envoyé
$rdvp = new RDVP() ;
$idR=$_REQUEST['dd'] ;

$r=$rdvp->supp($idR) ;
if($r)
    header("location:rdv.php") ;
    else
    echo "erreur de suppression " ;
?>
<?php
require_once("Patient.php") ; //import
require_once("RDVP.php") ;

//verifier si le formulaire a été envoyé
$patient = new Patient() ;

$id=$_REQUEST['mm'] ;
$r=$patient->sup($id) ;
if($r)
    header("location:edit2.php") ;
    else
    echo "erreur de suppression "
?>
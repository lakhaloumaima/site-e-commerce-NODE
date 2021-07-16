<?php
require_once("Patient.php") ; //import
//verifier si le formulaire a été envoyé
$patient = new Patient() ;

$id=$_REQUEST['dd'] ;
$r=$patient->sup($id) ;
if($r)
    header("location:edit.php") ;
    else
    echo "erreur de suppression "
?>
<?php

require_once("FicheN.php") ; //import
//verifier si le formulaire a été envoyé
$fiche = new FicheN() ;

$id=$_REQUEST['dd'] ;

$r=$fiche->supprim($id) ;
if($r)
    header("location:ficheListe.php") ;
    else
    echo "erreur de suppression "
?>
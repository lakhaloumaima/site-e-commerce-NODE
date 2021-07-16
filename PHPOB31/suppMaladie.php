<?php
require_once("Maladie.php") ; //import
//verifier si le formulaire a été envoyé

$maladie = new Maladie() ;

$idM=$_REQUEST['dd'] ;

$r=$maladie->supprime($idM) ;
if($r)
    header("location:listeMaladie.php") ;
    else
    echo "erreur de suppression "
?>
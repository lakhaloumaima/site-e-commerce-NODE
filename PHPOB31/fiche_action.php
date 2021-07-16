<?php 
require_once("FicheN.php") ; //import
$idM =$_POST['idM'] ;
$idP =$_POST['idP'];
echo "$idM , $idP" ;
$fiche= new FicheN() ;
$fiche ->setIdMa($idM) ;
$fiche ->setIdPa($idP) ;


$retour=$fiche->ajoute($idM,$idP) ;

header("location:ficheListe.php?retour=$retour") ;

?>
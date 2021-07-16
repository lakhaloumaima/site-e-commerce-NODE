<?php 
require_once("Maladie.php") ; //import

$idM =$_POST['idM'] ;
$nomSym =$_POST['nomSym'] ;
$descSym =$_POST['descSym'];
$ordonance =$_POST['ordonance'] ;

$maladie= new Maladie() ;

$maladie ->setNomSym($nomSym) ;
$maladie ->setDescSym($descSym) ;
$maladie->setOrdonance($ordonance) ;


$retour=$maladie->ajouter() ;

header("location:listeMaladie.php?retour=$retour") ;

?>
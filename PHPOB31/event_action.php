<?php 
require_once("event.php") ; //import
$name =$_POST['name'] ;
$count =$_POST['count'];

//echo ("$vtype ,$vcompany ,$vdescription ,$vdate_expiration ,$vemail ") ;
$event= new Event() ;
$event ->setName($name) ;
$event ->setCount($count) ;

$retour=$event->ajouter() ;

header("location:calendar 04.html?retour=$retour") ;

?>
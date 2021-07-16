<?php
require_once("Patient.php") ;
// Récupérer toutes les données de l'étudiant à modifier
$id = $_GET['id'];
$nom = $_GET['nom'] ;
$prenom = $_GET['prenom'] ;
$age =$_GET['age'] ;
$sexe =$_GET['sexe'] ;
$tel =$_GET['tel'] ;
$adresse =$_GET['adresse'];
// Exécuter la requête SQL de mise à jour
$patient= new Patient() ;
$patient ->setNom($nom) ;
$patient ->setPrenom($prenom) ;
$patient->setAge($age) ;
$patient->setSexe($sexe) ;
$patient ->setTel($tel) ;
$patient ->setAdresse($adresse) ;

$retour=$patient->modifier($id) ;


// Redirection à la page principale
header("location:edit.php?retour=$retour") ;
?>

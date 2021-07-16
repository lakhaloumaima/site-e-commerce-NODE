<?php
require_once("MySQL.php");
class Maladie extends MySQL 
{
       private $idM;

       private $nomSym;

        private $descSym;

        private $ordonance;

     
       



    public function getIdm()
    {
        return $this->idM;
    }

    public function setIdM(string $idM)
    {
        $this->idM = $idM;
        return $this;
    }

    public function getNomSym()
    {
        return $this->nomSym;
    }
    public function setNomSym(string $nomSym)
    {
        $this->nomSym = $nomSym;
        return $this;
    }
    public function getDescSym()
    {
        return $this->descSym;
    }

    public function setDescSym(string $descSym)
    {
        $this->descSym = $descSym;

        return $this;
    }

    public function getOrdonance()
    {
        return $this->ordonance;
    }

    public function setOrdonance(string $ordonance)
    {
        $this->ordonance = $ordonance;

        return $this;
    }


    
    public function editAll(){  
    $res =$this->connexion()->query("SELECT * from maladie ");
 // Extraire (fetch) toutes les lignes (enregistrement, rows)
 $les_maladies = $res->fetchAll(); 
 
        return $les_maladies;
    }
    public function editBy($id){  
        $res =$this->connexion()->query("SELECT * from maladie where idM=$id");
        // Extraire (fetch) toutes les lignes (enregistrement, rows)
         $le_maladie = $res->fetch(); 
     
            return $le_maladie;
        }

    
    public function ajouter()
	{	 if (!isset($this->nomSym) || 
	    	!isset($this->descSym) ||
            !isset($this->ordonance)
            )
            return false;
            
	    $q = "INSERT INTO maladie (nomSym,descSym,ordonance) 
		      VALUES
		  	('$this->nomSym' ,
			'$this->descSym',
            '$this->ordonance'
			)";		
		$stmt = $this->connexion()->exec($q);
        if(!$stmt)
        echo('echec insertion'.$this->connexion()->errorInfo());
        else{
    $r= 1;	// Renvoi l'id de l'enregistrement ajouté	
    return $r;}	
    }
    public function supprime($idM) {
        $q= "delete from maladie where idM=$idM" ;
        $stmt=$this->connexion()->exec($q) ;
        if(!$stmt)
        {
            echo("echec de suppression".$this->connexion()->errorInfo()) ;
        }
        else 
            return $stmt ;
    }
    public function modifier($id) {
        $q= "UPDATE maladie SET nomSym='$nomSym', descSym=$descSym,ordonance='$ordonance' WHERE idM=$id" ;
        $stmt=$this->connexion()->exec($q) ;
        if(!$stmt)
        {
            echo("echec de modification".$this->connexion()->errorInfo()) ;
        }
        else 
            return $stmt ;
    }

    public function editByOne($id){  
        $id =$_POST['idM'];
        $res ="SELECT * from maladie where idM=$id";
        $stmt=$this->connexion()->exec($res) ;
        if(!$stmt)
        {
            echo("echec de modification".$this->connexion()->errorInfo()) ;
        }
        else 
            return $stmt ;
    }

    public function ajout($idM)
	{	 if (!isset($this->nomSym) || 
	    	!isset($this->descSym) ||
            !isset($this->ordonance)
            )
            return false;
            
	    $q = "INSERT INTO maladie (nomSym,descSym,ordonance,id) 
		      VALUES
		  	('$this->nomSym' ,
			'$this->descSym',
            '$this->ordonance' ,
            '$this->id' 
			)";		
		$stmt = $this->connexion()->exec($q);
        if(!$stmt)
        echo('echec insertion'.$this->connexion()->errorInfo());
        else{
    $r= 1;	// Renvoi l'id de l'enregistrement ajouté	
    return $r;}	
    }


}


?>

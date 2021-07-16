<?php
require_once("MySQL.php");
class Contact extends MySQL 
{
       private $idC;

       private $nom;

        private $prenom;

        private $email;

        private $message;

        private $id ;

    public function getIdC()
    {
        return $this->idC;
    }
    public function setIdC(string $idC)
    {
        $this->idC = $idC;
        return $this;
    }
    public function getIdP()
    {
        return $this->id;
    }
    public function setIdP(string $id)
    {
        $this->id= $id;
        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom(string $nom)
    {
        $this->nom = $nom;
        return $this;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;

        return $this;
    }

    
    public function editAll(){  
    $res =$this->connexion()->query("SELECT * from contact ");
 // Extraire (fetch) toutes les lignes (enregistrement, rows)
 $les_contact = $res->fetchAll(); 
 
        return $les_contact;
    }
    public function editBy($idC){  
        $res =$this->connexion()->query("SELECT * from contact where idC='$idC' ");
        // Extraire (fetch) toutes les lignes (enregistrement, rows)
         $le_contact = $res->fetch(); 
     
            return $le_contact;
        }
    
        /*public function editJoin(){  
            $res =$this->connexion()->query("SELECT * from contact ");
         // Extraire (fetch) toutes les lignes (enregistrement, rows)
         $les_contact = $res->fetchAll(); 
         
                return $les_contact;
            }
            */

    public function ajou($idC)
	{	 if (!isset($this->idC) || 
            !isset($this->nom) || 
	    	!isset($this->prenom) ||
            !isset($this->email) ||
            !isset($this->message) 
            
          
            )
            return false;
            
	    $q = "INSERT INTO contact (idC,nom, prenom, email, message) 
		      VALUES
		  	('$this->idC' ,
            '$this->nom' ,
			'$this->prenom',
            '$this->email' ,
            '$this->message' ,
            
           
			)";		
		$stmt = $this->connexion()->exec($q);
        if(!$stmt)
        echo('echec insertion contact'.$this->connexion()->errorInfo());
        else{
    $r= 1;	// Renvoi l'id de l'enregistrement ajouté	
    return $r;}	
    }
    public function supprimer($id) {
        $q= "delete from patient where id=$id" ;
        $stmt=$this->connexion()->exec($q) ;
        if(!$stmt)
        {
            echo("echec de suppression".$this->connexion()->errorInfo()) ;
        }
        else 
            return $stmt ;
    }
    public function modifier($id) {
        $q= "UPDATE patient SET nom='$nom', prenom=$prenom,age='$age',
        sexe='$sexe',tel='$tel',adresse='$adresse' WHERE id=$id" ;
        $stmt=$this->connexion()->exec($q) ;
        if(!$stmt)
        {
            echo("echec de modification".$this->connexion()->errorInfo()) ;
        }
        else 
            return $stmt ;
    }

}

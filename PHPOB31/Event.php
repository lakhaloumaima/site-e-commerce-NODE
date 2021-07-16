<?php
require_once("MySQL.php");
class Event extends MySQL 
{   
        private $id;

       private $name;

       private $count;


    public function getName()
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    public function getCount()
    {
        return $this->count;
    }

    public function setCount(string $count)
    {
        $this->count = $count;

        return $this;
    }

    
    public function editAll(){  
    $res =$this->connexion()->query("SELECT * from events");
 // Extraire (fetch) toutes les lignes (enregistrement, rows)
 $les_events = $res->fetchAll(); 
 
        return $les_events;
    }

    
    public function ajouter()
	{	if (!isset($this->name) || 
	    	!isset($this->count) 
            ) 
                return false;
            
	    $q = "INSERT INTO events (nom, nombre) 
		      VALUES
		  	('$this->name' ,
			'$this->count' 
			)";		
		$stmt = $this->connexion()->exec($q);
        if(!$stmt)
        echo('echec insertion'.$this->connexion()->errorInfo());
        else{
    $r= 1;	// Renvoi l'id de l'enregistrement ajouté	
    return $r;}	
    }
    public function supprimer($id) {
        $q= "delete from events where id=$id" ;
        $stmt=$this->connexion()->exec($q) ;
        if(!$stmt)
        {
            echo("echec de suppression".$this->connexion()->errorInfo()) ;
        }
        else 
            return $stmt ;
    }
}

<?php
require_once("Patient.php");
class RDVP extends MySQL 
{
       private $idR;

       private $dateR;

       private $time;

      
       private $id ;

    public function getIdR()
    {
        return $this->idR;
    }

   
    public function setIdR(String $idR )
    {
        $this->idR = $idR;
        return $this;
    }
    public function getIdP()
    {
        return $this->id;
    }


    public function setIdP(String $id)
    {
        $this->id = $id ;
        return $this;
    }
   
    public function getDateR()
    {
        return $this->dateR;
    }

   
    public function setDateR(String $dateR)
    {
        $this->dateR = $dateR;
        return $this;
    }
    
    public function getTime()
    {
        return $this->time;
    }

   
    public function setTime(String $time)
    {
        $this->time = $time;
        return $this;
    }
   

    
    public function editAll(){  
   // $res =$this->connexion()->query("SELECT *
     //from rdvp R join patient p using(id) ");
     $res =$this->connexion()->query("SELECT *
     from rdvp natural join patient P ");
 // Extraire (fetch) toutes les lignes (enregistrement, rows)
    $les_rdvP = $res->fetchAll(); 
 
        return $les_rdvP;
    }
    public function editBy($idR){  
        $res =$this->connexion()->query("SELECT *
        from rdvp R  join patient p on (p.id=R.idR)
        where idR=$idR");
        // Extraire (fetch) toutes les lignes (enregistrement, rows)
         $le_rdvP = $res->fetch(); 
     
            return $le_rdvP;
        }

    
    public function ajoutt($idR)
	{	 if (!isset($this->idR) || 
	    	!isset($this->dateR) ||
            !isset($this->time) 
            
            )
            return false;
            
	    $q = "INSERT INTO rdvp (idR,dateR,time,id) 
		      VALUES
		  	('$this->idR' ,
			'$this->dateR' ,
            '$this->time' ,
            '$this->id' 
			)";		
		$stmt = $this->connexion()->exec($q);
        if(!$stmt)
        echo('echec insertion'.$this->connexion()->errorInfo());
        else{
            $r= 1;	// Renvoi l'id de l'enregistrement ajouté	
            return $r;
        }	
    }
    public function supp($id) {
        $q= "delete from rdvp where id=$id " ;
        $stmt=$this->connexion()->exec($q) ;
        if(!$stmt)
        {
            echo("echec de suppression".$this->connexion()->errorInfo()) ;
        }
        else 
            return $stmt ;
    }

    public function modif($idR) {
        $q= "UPDATE rdvp SET dateR='$dateR' , time='$time'
        WHERE idR='$idR' " ;
        $stmt=$this->connexion()->exec($q) ;
        if(!$stmt)
        {
            echo("echec de modification".$this->connexion()->errorInfo()) ;
        }
        else 
            return $stmt ;
    }
    

    public function editByOne($id){  
        //$id =$_POST['id'];
        //$res ="SELECT * from patient where id=$id";
       // Récupérer l'id à modifier (depuis la page précédente)
       
        // Connexion à la bdd
        require_once("maladie_patient.php") ;
        // Récupérer toutes les données de l'étudiant relatif à l'ID récupéré
        $res = "SELECT * FROM maladie_patient WHERE id=$id" ;
        $etd = exec($res) ; // Ceci est UN SEUL patient
    }

}
?>

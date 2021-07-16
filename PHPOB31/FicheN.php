<?php
require_once("MySQL.php") ;
//require_once("Maladie.php");
//require_once("Patient.php");
class FicheN extends MySQL 
{
        private $id;

       private $idMa;

       private $idPa;

       public function getId()
       {
           return $this->id;
       }
   
      
       public function setId(String $id )
       {
           $this->id = $id;
           return $this;
       }


    public function getIdMa()
    {
        return $this->idMa;
    }

   
    public function setIdMa(String $idMa )
    {
        $this->idMa = $idMa;
        return $this;
    }
   
    public function getIdPa()
    {
        return $this->idPa;
    }

   
    public function setIdPa(String $idPa)
    {
        $this->idPa = $idPa;
        return $this;
    }
   

    
    public function editAll(){  
    $res =$this->connexion()->query("SELECT *
     from maladie_patient natural join patient p natural join maladie m ");
 // Extraire (fetch) toutes les lignes (enregistrement, rows)
    $les_maladiesP = $res->fetchAll(); 
 
        return $les_maladiesP;
    }
    public function editBy($id){  
        $res =$this->connexion()->query("SELECT *
        from maladie_patient mp natural join maladie m natural join patient p
        where id=$id ");
        // Extraire (fetch) toutes les lignes (enregistrement, rows)
         $le_maladieP = $res->fetch(); 
     
            return $le_maladieP;
        }

    /*public function editBy($idM,$idP){  
        $res =$this->connexion()->query("SELECT mp.idM,mp.id,p.nom,p.prenom,m.nomSym,m.descSym,m.ordonance
        from maladie_patient mp join maladie m on (mp.idM=m.idM) join patient p on (p.id=mp.idP)
        where idM=$idM and idP=$idP ");
        // Extraire (fetch) toutes les lignes (enregistrement, rows)
         $le_maladieP = $res->fetch(); 
     
            return $le_maladieP;
        }
*/
    
    public function ajoute($idMa,$idPa)
	{	 if (!isset($this->idMa) || 
	    	!isset($this->idPa) 
            )
            return false;
            
	    $q = "INSERT INTO maladie_patient (idMa,idPa) 
		      VALUES
		  	('$this->idMa' ,
			'$this->idPa'
			)";		
		$stmt = $this->connexion()->exec($q);
        if(!$stmt)
        echo('echec insertion'.$this->connexion()->errorInfo());
        else{
    $r= 1;	// Renvoi l'id de l'enregistrement ajouté	
    return $r;}	
    }
    public function supprim($id) {
        $q= "delete from 
        from maladie_patient where id='$id' " ;
        $stmt=$this->connexion()->exec($q) ;
        if(!$stmt)
        {
            echo("echec de suppression".$this->connexion()->errorInfo()) ;
        }
        else 
            return $stmt ;
    }

   /* public function supprim($idP) {
        $q= "delete from patient p 
        where id in (select p.id ,m.idM 
        from maladie_patient mp 
        join maladie m on(mp.idM=m.idM)
        where p.id=$idP) " ;
        $stmt=$this->connexion()->exec($q) ;
        if(!$stmt)
        {
            echo("echec de suppression".$this->connexion()->errorInfo()) ;
        }
        else 
            return $stmt ;
    }*/
    public function modifier($id) {
        $q= "UPDATE maladie_patient SET idM='$idM', idP=$idP
        WHERE idM=$idM and idP=$idP";
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

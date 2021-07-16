<?php
require_once("MySQL.php");
require_once("Maladie.php");
class Patient extends MySQL 
{
       private $id;

       private $nom;

        private $prenom;

        private $age;

       private $sexe;

        private $tel;

        private $adresse;
    
        

    public function getId()
    {
        return $this->id;
    }
    public function setId(string $id)
    {
        $this->id = $id;
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

    public function getAge()
    {
        return $this->age;
    }

    public function setAge(string $age)
    {
        $this->age = $age;

        return $this;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }
    public function editAll(){  
    $res =$this->connexion()->query("SELECT * from patient ");
 // Extraire (fetch) toutes les lignes (enregistrement, rows)
 $les_patients = $res->fetchAll(); 
 
        return $les_patients;
    }
    public function editBy($id){  
        $res =$this->connexion()->query("SELECT * from patient where id='$id' ");
        // Extraire (fetch) toutes les lignes (enregistrement, rows)
         $le_patient = $res->fetch(); 
            return $le_patient;
        }

    
    public function ajouter()
	{	 if (!isset($this->nom) || 
	    	!isset($this->prenom) ||
            !isset($this->age) ||
            !isset($this->sexe) ||
            !isset($this->tel) ||
            !isset($this->adresse) 
            )
            return false;
            
	    $q = "INSERT INTO patient (nom, prenom, age, sexe,tel,adresse) 
		      VALUES
		  	('$this->nom' ,
			'$this->prenom',
            '$this->age' ,
            '$this->sexe' ,
            '$this->tel' ,
            '$this->adresse' 


			)";		
		$stmt = $this->connexion()->exec($q);
        if(!$stmt)
        echo('echec insertion'.$this->connexion()->errorInfo());
        else{
    $r= 1;	// Renvoi l'id de l'enregistrement ajouté	
    return $r;}	
    }
    public function sup($id) {
        $q= "delete from patient where id=$id " ;
        $stmt=$this->connexion()->exec($q) ;
        if(!$stmt)
        {
            echo("echec de suppression".$this->connexion()->errorInfo()) ;
        }
        else 
            return $stmt ;
    }
    public function sup2($id) {
        $q= "delete from patient where id=$id " ;
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

    public function editByOne($id){  
        require_once("Patient.php") ;
        // Récupérer toutes les données de l'étudiant relatif à l'ID récupéré
        $res = "SELECT * FROM patient WHERE id=$id" ;
        $etd = exec($res) ; // Ceci est UN SEUL patient
        return $etd ;
        
    }
}
?>

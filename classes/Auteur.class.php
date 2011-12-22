<?php
class Auteur extends Table{
		public $numAuteur;
		public $prenomAuteur;
		public $nomAuteur;
		

		//etc.

		
		//fonctions publiques---------------------------------------------------------------		
		public function __construct($prenomAuteur,$nomAuteur, $numAuteur=-1) {
		
		    parent::__construct();
		
			$this->numAuteur = $numAuteur;
			$this->prenomAuteur = $prenomAuteur;
			$this->nomAuteur = $nomAuteur;
			
			return $this;
		}


		function enregistrer(){
			if($this->numAuteur==-1)
				$this->numAuteur=$this->inserer();			
			else
				$this->modifier();
		}


		public function supprimer(){
			return;
			$sql="DELETE FROM auteur WHERE numAuteur='{$this->numAuteur}'";
			$this->db->exec($sql);
			$this->numAuteur=-1;
		}
		
		public static function chercherParId($id){
			$sql="SELECT * from auteur WHERE numAuteur=?";
			$db=DB::get_instance();
	        $res=$db->prepare($sql);
	        $res->execute(array($id));
	
	        $a= $res->fetch();
		
			return new Auteur($a[1],$a[2],$a[0]);			
		}

        public static function liste($pageCourante=null, $nbEnregistrementsParPage=null){
        
        	if(!isset($pageCourante) && !isset($nbEnregistrementsParPage))
        		$sql="SELECT * FROM auteur";
        	else
        		//On définit notre requête (on récupère l'ensemble des enregistrements)
            	$sql="SELECT * FROM auteur LIMIT ".(($pageCourante-1)*$nbEnregistrementsParPage).",".$nbEnregistrementsParPage;
    
            //Comme on est dans un contexte statique, on récupère l'instance de la BDD
            $db=DB::get_instance();
            $reponse = $db->query($sql);
    
            while($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)){
                $auteur = new Auteur(
                    $enregistrement['prenomAuteur'],
                    $enregistrement['nomAuteur'],
                    $enregistrement['numAuteur']
                );
    
                $liste[]=$auteur;
            }
            
            if(isset($liste))
                return $liste;
            else
                return null;
        }

	//fonctions privées-----------------------------------------------
	function inserer(){
		
		$sql="INSERT INTO auteur VALUES('',?,?)";
		
		$res=$this->db->prepare($sql);
		
		$res->execute(array(
			$this->prenomAuteur,
			$this->nomAuteur
		));			
		
		return $this->db->lastInsertId();
	}

	function modifier(){
		$sql="UPDATE auteur SET prenomAuteur=?,nomAuteur=? WHERE numAuteur=?";
		$res=$this->db->prepare($sql);
		$res->execute(array(
			$this->prenomAuteur,
			$this->nomAuteur,
			$this->numAuteur
		));		
	}		


			
}

?>
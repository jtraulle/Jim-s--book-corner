<?php
class Auteur extends Table{
		public $numAuteur;
		public $prenomAuteur;
		public $nomAuteur;
		

		//etc.

		
		//fonctions publiques---------------------------------------------------------------		
		public function __construct($prenomAuteur,$nomAuteur, $numAuteur=-1) {
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
			$res=$this->db->prepare($sql);
			$r=$res->execute(array($numAuteur));
			//gérer les erreurs éventuelles

			$a= $r->fetch();			
			return new Auteur($a[1],$a[2],$a[0]);			
		}
		public function chercherParNom(){}
		public function liste(){}   		
		public function listerParStatut(){}
		public function desactiver(){}
		public function activer(){}

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
		$sql="UPDATE auteur SET prenomAuteur=?,nomAuteur=?";
		$res=$this->db->prepare($sql);
		$res->execute(array(
			$this->prenomAuteur,
			$this->nomAuteur
		));		
	}		


			
}

?>
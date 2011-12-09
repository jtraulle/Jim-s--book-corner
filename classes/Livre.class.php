<?php
class Emprunteur extends Table{
		public $numLivre;
		public $titreLivre;
		public $resumeLivre;
		public $langueLivre;
		public $nbExemplaireLivre;
		public $numEditeur;
		
		//etc.

		
		//fonctions publiques---------------------------------------------------------------		
		public function __construct($titreLivre,$resumeLivre, $numRueEmprunteur, $langueLivre, $nbExemplaireLivre, $numEditeur, $numLivre=-1) {
			$this->numLivre = $numLivre;
			$this->titreLivre = $titreLivre;
			$this->resumeLivre = $resumeLivre;
			$this->langueLivre = $langueLivre;
			$this->nbExemplaireLivre = $nbExemplaireLivre;
			$this->numEditeur = $numEditeur;

			return $this;
		}


		function enregistrer(){
			if($this->numLivre==-1)
				$this->numLivre=$this->inserer();			
			else
				$this->modifier();
		}


		public function supprimer(){
			return;
			$sql="DELETE FROM livre WHERE numLivre='{$this->numLivre}'";
			$this->db->exec($sql);
			$this->numLivre=-1;
		}
		
		public static function chercherParId($id){
			$sql="SELECT * from livre WHERE numLivre=?";
			$res=$this->db->prepare($sql);
			$r=$res->execute(array($id));
			//gérer les erreurs éventuelles

			$l= $r->fetch();			
			return new Livre($l[1],$l[2],$l[3],$l[4],$l[5],$l[6],$l[0]);			
		}
		public static function chercherParNom($titreLivre){
			$sql="SELECT * FROM livre WHERE titreLivre=$titreLivre";
			$res=$this->db->prepare($sql);
			$r = $res->execute(array($id));
			$l=$r->fetch()
			return new Livre($l[1],$l[2],$l[3],$l[4],$l[5],$l[6],$l[0]);
		}
		public function liste(){}   		
		public function listerParStatut(){}
		public function desactiver(){}
		public function activer(){}

	//fonctions privées-----------------------------------------------
	function inserer(){
		
		$sql="INSERT INTO livre VALUES('',?,?,?,?,?)";
		
		$res=$this->db->prepare($sql);
		
		$res->execute(array(
			$this->titreLivre,
			$this->resumeLivre,
			$this->langueLivre,
			$this->nbExemplaireLivre,
			$this->numEditeur
		));			
		
		return $this->db->lastInsertId();
	}

	function modifier(){
		$sql="UPDATE livre SET titreLivre=?,resumeLivre=?,langueLivre=?,nbExemplaireLivre=?,numEditeur=?";
		$res=$this->db->prepare($sql);
		$res->execute(array(
			$this->titreLivre,
			$this->resumeLivre,
			$this->langueLivre,
			$this->nbExemplaireLivre,
			$this->numEditeur
		));		
	}	
}

?>
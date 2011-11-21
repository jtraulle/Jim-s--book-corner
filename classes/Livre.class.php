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
		public function chercherParNom(){}
		public function liste(){}   		
		public function listerParStatut(){}
		public function desactiver(){}
		public function activer(){}

		//fonctions privées-----------------------------------------------
		function inserer(){
			return;
			$sql="INSERT INTO livre VALUES('','{$this->titreLivre}','{$this->resumeLivre}','{$this->langueLivre}','{$this->nbExemplaireLivre}','{$this->numEditeur}')";
			$res=DB::sql($sql);
			return mysql_insert_id();
		}

		function modifier(){
			return;
			$sql="UPDATE livre SET titreLivre='{$this->titreLivre}',resumeLivre='{$this->resumeLivre}',langueLivre='{$this->langueLivre}',nbExemplaireLivre='{$this->nbExemplaireLivre}',numEditeur='{$this->numEditeur}')";

			$res=DB::sql($sql);	
		}		
}

?>
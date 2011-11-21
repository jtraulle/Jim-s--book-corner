<?php
class Emprunteur extends Table{
		public $numEmprunteur;
		public $nomEmprunteur;
		public $prenomEmprunteur;
		public $numRueEmprunteur;
		public $nomRueEmprunteur;
		public $villeEmprunteur;
		public $codePostalEmprunteur;
		public $identifiantEmprunteur;
		public $mdpEmprunteur;
		public $telFixeEmprunteur;
		public $telPortableEmprunteur;
		public $emailEmprunteur

		//etc.

		
		//fonctions publiques---------------------------------------------------------------		
		public function __construct($nomEmprunteur,$prenomEmprunteur, $numRueEmprunteur, $nomRueEmprunteur, $villeEmprunteur, $codePostalEmprunteur, $identifiantEmprunteur, $mdpEmprunteur, $telFixeEmprunteur, $telPortableEmprunteur, $numEmprunteur=-1) {
			$this->numEmprunteur = $numEmprunteur;
			$this->nomEmprunteur = $nomEmprunteur;
			$this->prenomEmprunteur = $prenomEmprunteur;
			$this->numRueEmprunteur = $numRueEmprunteur;
			$this->nomRueEmprunteur = $nomRueEmprunteur;
			$this->villeEmprunteur = $villeEmprunteur;
			$this->codePostalEmprunteur = $codePostalEmprunteur;
			$this->identifiantEmprunteur = $identifiantEmprunteur;
			$this->mdpEmprunteur = $mdpEmprunteur;
			$this->telFixeEmprunteur = $telFixeEmprunteur;
			$this->telPortableEmprunteur = $telPortableEmprunteur;
			$this->emailEmprunteur = $emailEmprunteur;

			return $this;
		}


		function enregistrer(){
			if($this->id==-1)
				$this->id=$this->inserer();			
			else
				$this->modifier();
		}


		public function supprimer(){
			return;
			$sql="DELETE FROM emprunteur WHERE numEmprunteur='{$this->numEmprunteur}'";
			$this->db->exec($sql);
			$this->numEmprunteur=-1;
		}
		
		public static function chercherParId($id){
			$sql="SELECT * from emprunteur WHERE numEmprunteur=?";
			$res=$this->db->prepare($sql);
			$r=$res->execute(array($id));
			//gérer les erreurs éventuelles

			$e= $r->fetch();			
			return new Emprunteur($e[1],$e[2],$e[3],$e[4],$e[5],$e[6],$e[7],$e[8],$e[9],$e[10],$e[11],$e[0]);
		}
		public function chercherParNom(){}
		public function liste(){}   		
		public function listerParStatut(){}
		public function desactiver(){}
		public function activer(){}

		//fonctions privées-----------------------------------------------
		function inserer(){
			return;
			$sql="INSERT INTO emprunteur VALUES('','{$this->nomEmprunteur}','{$this->prenomEmprunteur}','{$this->numRueEmprunteur}','{$this->nomRueEmprunteur}','{$this->villeEmpruneur}','{$this->codePostalEmprunteur}','{$this->identifiantEmprunteur}','{$this->mdpEmprunteur}','{$this->telFixeEmprunteur}','{$this->telPortableEmprunteur}','{$this->emailEmprunteur}')";
			$res=DB::sql($sql);
			return mysql_insert_id();
		}

		function modifier(){
			return;
			$sql="UPDATE emprunteur SET(nomEmprunteur='{$this->nomEmprunteur}',prenomEmprunteur='{$this->prenomEmprunteur}',numRueEmprunteur='{$this->numRueEmprunteur}',nomRueEmprunteur='{$this->nomRueEmprunteur}',villeEmpruneur='{$this->villeEmpruneur}',codePostalEmprunteur='{$this->codePostalEmprunteur}',identifiantEmprunteur='{$this->identifiantEmprunteur}',mdpEmprunteur='{$this->mdpEmprunteur}',telFixeEmprunteur='{$this->telFixeEmprunteur}',telPortableEmprunteur='{$this->telPortableEmprunteur}',emailEmprunteur='{$this->emailEmprunteur}')";

			$res=DB::sql($sql);
			
			}		


			
}

?>
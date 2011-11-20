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
			$sql="DELETE FROM Membre WHERE id='{$this->id}'";
			$this->db->exec($sql);
			$this->id=-1;
		}
		
		public static function chercherParId($id){
			$sql="SELECT * from Membres WHERE id=?";
			$res=$this->db->prepare($sql);
			$r=$res->execute(array($id));
			//gérer les erreurs éventuelles

			$m= $r->fetch();			
			return new Membre($m[1],$m[2],$m[3],$m[4],$m[5],$m[0]);			
		}
		public function chercherParNom(){}
		public function liste(){}   		
		public function listerParStatut(){}
		public function desactiver(){}
		public function activer(){}

		//fonctions privées-----------------------------------------------
		function inserer(){
			return;
			$sql="INSERT INTO Membres VALUES('','{$this->login}','{$this->nom}','{$this->prenom}','{$this->mail}','{$this->pass}')";
			$res=DB::sql($sql);
			return mysql_insert_id();
		}

		function modifier(){
			return;
			$sql="UPDATE Membres SET login='{$this->login}',nom='{$this->nom}',prenom='{$this->prenom}',mail='{$this->mail}',pass='{$this->pass}')";

			$res=DB::sql($sql);
			
			}		


			
}

?>
<?php
class Gestionnaire extends Table{
		public $numGestionnaire;
		public $pseudoGestionnaire;
		public $mdpGestionnaire;
		public $telGestionnaire;
		public $emailGestionnaire;
		public $nomGestionnaire;
		public $prenomGestionnaire;
		
		
		//fonctions publiques---------------------------------------------------------------		
		public function __construct($nomGestionnaire,$prenomGestionnaire, $pseudoGestionnaire, $mdpGestionnaire, $telGestionnaire, $emailGestionnaire, $numGestionnaire=-1) {
			$this->numGestionnaire = $numGestionnaire;
			$this->nomGestionnaire = $nomGestionnaire;
			$this->prenomGestionnaire = $prenomGestionnaire;
			$this->pseudoGestionnaire = $pseudoGestionnaire;
			$this->mdpGestionnaire = $mdpGestionnaire;
			$this->telGestionnaire = $telGestionnaire;
			$this->emailestionnaire = $emailGestionnaire;

			return $this;
		}

	function enregistrer(){
			if($this->numGestionnaire==-1)
				$this->numGestionnaire=$this->inserer();			
			else
				$this->modifier();
		}


		public function supprimer(){
			return;
			$sql="DELETE FROM gestionnaire WHERE numGestionnaire='{$this->numGestionnaire}'";
			$this->db->exec($sql);
			$this->numGestionnaire=-1;
		}
		
		public static function chercherParId($numGenre){
			$sql="SELECT * from gestionnaire WHERE numGestionnaire=?";
			$res=$this->db->prepare($sql);
			$r=$res->execute(array($numGestionnaire));
			//gérer les erreurs éventuelles

			$gest= $r->fetch();			
			return new Gestionnaire($gest[1],$gest[2],$gest[3],$gest[4],$gest[5],$gest[6],$gest[0]);			
		}
		public function chercherParNom(){}
		public function liste(){}   		
		public function listerParStatut(){}
		public function desactiver(){}
		public function activer(){}

		//fonctions privées-----------------------------------------------
		function inserer(){
			return;
			$sql="INSERT INTO genre VALUES('','{$this->pseudoGestionnaire}','{$this->mdpGestionnaire}','{$this->telGestionnaire}','{$this->emailGestionnaire}','{$this->nomGestionnaire}','{$this->prenomGestionnaire}')";
			$res=DB::sql($sql);
			return mysql_insert_id();
		}

		function modifier(){
			return;
			$sql="UPDATE Membres SET pseudoGestionnaire='{$this->pseudoGestionnaire}',mdpGestionnaire='{$this->mdpGestionnaire}',telGGestionnaire='{$this->telGestionnaire}',emailGestionnaire='{$this->emailGestionnaire}',nomGestionnaire='{$this->nomGestionnaire}',prenomGestionnaire='{$this->prenomGestionnaire}')";

			$res=DB::sql($sql);
			
			}		


			
}

?>
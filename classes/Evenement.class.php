<?php
class Evenement extends Table{
		public $numEvenement;
		public $nomEvenement;
		public $themeEvenement;
		public $lieuEvenement;
		public $dateEvenement;
		public $heureEvenement;
		public $numGestionnaire;

		
		//fonctions publiques---------------------------------------------------------------		
		public function __construct($nomEvenement,$themeEvenement, $lieuEvenement, $dateEvenement, $heireEvenement, $numGestionnaire, $numEvenement=-1) {
			$this->numEvenement = $numEvenement;
			$this->nomEvenement = $nomEvenement;
			$this->themeEvenement = $themeEvenement;
			$this->lieuEvenement = $lieuEvenement;
			$this->dateEvenement = $dateEvenement;
			$this->heureEvenement = $heureEvenement;
			$this->numGestionnaire = $numGestionnaire;


			return $this;
		}


		function enregistrer(){
			if($this->numEvenement==-1)
				$this->numEvenement=$this->inserer();			
			else
				$this->modifier();
		}


		public function supprimer(){
			return;
			$sql="DELETE FROM evenement WHERE numEvenement'{$this->numEvenement}'";
			$this->db->exec($sql);
			$this->numEvenement=-1;
		}
		
		public static function chercherParId($id){
			$sql="SELECT * from evenement WHERE numEvenement=?";
			$res=$this->db->prepare($sql);
			$r=$res->execute(array($numEvenement));
			//gérer les erreurs éventuelles

			$e= $r->fetch();			
			return new Evenement($e[1],$e[2],$e[3],$e[4],$e[5],$e[6],$e[0]);			
		}
		public function chercherParNom(){}
		public function liste(){}   		
		public function listerParStatut(){}
		public function desactiver(){}
		public function activer(){}

		//fonctions privées-----------------------------------------------
		function inserer(){
			return;
			$sql="INSERT INTO evenement VALUES('','{$this->nomEvenement}','{$this->themeEvenement}','{$this->lieuEvenement}','{$this->dateEvenement}','{$this->heureEvenement}','{$this->numGestionnaire}')";
			$res=DB::sql($sql);
			return mysql_insert_id();
		}

		function modifier(){
			return;
			$sql="UPDATE evenement SET nomEvenement='{$this->nomEvenement}',themeEvenement='{$this->themeEvenement}',lieuEvenement='{$this->lieuEvenement}',dateEvenement='{$this->dateEvenement}',heureEvenement='{$this->heureEvenement}',numGestionnaire='{$this->numGestionnaire}')";

			$res=DB::sql($sql);
			
			}		


			
}

?>
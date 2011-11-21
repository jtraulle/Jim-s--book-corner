<?php
class Editeur extends Table{
		public $numEditeur;
		public $editeur;

		//etc.

		
		//fonctions publiques---------------------------------------------------------------		
		public function __construct($editeur,$numEditeur=-1) {
			$this->numEditeur = $numEditeur;
			$this->editeur = $editeur;

			return $this;
		}


		function enregistrer(){
			if($this->numEditeur==-1)
				$this->numEditeur=$this->inserer();			
			else
				$this->modifier();
		}


		public function supprimer(){
			return;
			$sql="DELETE FROM editeur WHERE numEditeur='{$this->numEditeur}'";
			$this->db->exec($sql);
			$this->numEditeur=-1;
		}
		
		public static function chercherParId($id){
			$sql="SELECT * from editeur WHERE numEditeur=?";
			$res=$this->db->prepare($sql);
			$r=$res->execute(array($numEditeur));
			//gérer les erreurs éventuelles

			$e= $r->fetch();			
			return new Editeur($e[1],$e[0]);			
		}
		public function chercherParNom(){}
		public function liste(){}   		
		public function listerParStatut(){}
		public function desactiver(){}
		public function activer(){}

		//fonctions privées-----------------------------------------------
		function inserer(){
			return;
			$sql="INSERT INTO editeur VALUES('','{$this->numEditeur}','{$this->editeur}')";
			$res=DB::sql($sql);
			return mysql_insert_id();
		}

		function modifier(){
			return;
			$sql="UPDATE editeur SET numEditeur='{$this->numEditeur}',editeur='{$this->editeur}'";

			$res=DB::sql($sql);
			
			}		


			
}

?>
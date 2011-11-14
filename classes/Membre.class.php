<?php
class Membre extends Table{
	
	
		public $id;
		public $mail;
		public $nom;
		public $prenom;
		public $login;
		//etc.

		
		//fonctions publiques---------------------------------------------------------------		
		public function __construct($login,$nom,$prenom,$mail,$pass,$id=-1){
			$this->mail=$mail;
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->pass=$pass;
			$this->login=$login;
			$this->id=$id;
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
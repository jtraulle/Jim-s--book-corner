<?php
class Genre extends Table{
	public $numGenre;
	public $genre;

	
	//fonctions publiques---------------------------------------------------------------		
	public function __construct($genre, $numGenre=-1) {
		$this->numGenre = $numGenre;
		$this->genre = $genre;

		return $this;
	}


	function enregistrer(){
		if($this->numGenre==-1)
			$this->numGenre=$this->inserer();			
		else
			$this->modifier();
	}


	public function supprimer(){
		return;
		$sql="DELETE FROM genre WHERE numGenre='{$this->numGenre}'";
		$this->db->exec($sql);
		$this->numGenre=-1;
	}
	
	public static function chercherParId($numGenre){
		$sql="SELECT * from genre WHERE numGenre=?";
		$res=$this->db->prepare($sql);
		$r=$res->execute(array($numGenre));
		//gérer les erreurs éventuelles

		$g= $r->fetch();			
		return new Genre($g[1],$g[0]);			
	}
	public function chercherParNom(){}
	public function liste(){}   		
	public function listerParStatut(){}
	public function desactiver(){}
	public function activer(){}

	function inserer(){
		
		//la requête préparée nettoie les champs avant insertion
		$sql="INSERT INTO genre VALUES('',?)";
		
		$res=$this->db->prepare($sql);
		
		$res->execute(array(
			$this->genre
		));			
		
		return $this->db->lastInsertId();
	}

	function modifier(){
		$sql="UPDATE genre SET genre=?";
		$res=$this->db->prepare($sql);
		$res->execute(array(
			$this->genre
		));		
	}		
}

?>
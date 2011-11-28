<?php

class Editeur extends Table{
	public $numEditeur;
	public $editeur;

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

	//fonctions privées-----------------------------------------------
	function inserer(){
		
		$sql="INSERT INTO editeur VALUES('',?)";
		
		$res=$this->db->prepare($sql);
		
		$res->execute(array(
			$this->editeur
		));			
		
		return $this->db->lastInsertId();
	}

	function modifier(){
		$sql="UPDATE editeur SET editeur=?";
		$res=$this->db->prepare($sql);
		$res->execute(array(
			$this->editeur
		));		
	}		
}

?>
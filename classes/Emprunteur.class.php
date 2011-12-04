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
	public $emailEmprunteur;

	//etc.

	
	//fonctions publiques---------------------------------------------------------------		
	public function __construct($nomEmprunteur, $prenomEmprunteur, $numRueEmprunteur, $nomRueEmprunteur, $villeEmprunteur, $codePostalEmprunteur, $identifiantEmprunteur, $mdpEmprunteur, $telFixeEmprunteur, $telPortableEmprunteur, $emailEmprunteur, $numEmprunteur=-1) {
		
		parent::__construct();

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
		if($this->numEmprunteur==-1) {
			$this->numEmprunteur=$this->inserer();	
			return $this->numEmprunteur;
		}	
		else
			return $this->modifier();
	}


	public function supprimer(){
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
	
	public function liste(){
	    $sql="SELECT * FROM emprunteur";
	    $reponse = $this->db->query($sql);
	    while($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)){
	        echo '<pre>';
	        print_r($enregistrement);
	        echo '</pre>';
	    }
	}

	public function chercherParNom(){}  		
	public function listerParStatut(){}
	public function desactiver(){}
	public function activer(){}

	//fonctions privées-----------------------------------------------
	function inserer(){
		
		$sql="INSERT INTO emprunteur VALUES('',?,?,?,?,?,?,?,?,?,?,?)";
		
		$res=$this->db->prepare($sql);
		
		$res->execute(array(
			$this->nomEmprunteur,
			$this->prenomEmprunteur,
			$this->numRueEmprunteur,
			$this->nomRueEmprunteur,
			$this->villeEmprunteur,
			$this->codePostalEmprunteur,
			$this->identifiantEmprunteur,
			$this->mdpEmprunteur,
			$this->telFixeEmprunteur,
			$this->telPortableEmprunteur,
			$this->emailEmprunteur
		));			
		
		return $this->db->lastInsertId();
	}

	function modifier(){
		$sql="UPDATE emprunteur SET nomEmprunteur=?,prenomEmprunteur=?,numRueEmprunteur=?,nomRueEmprunteur=?,villeEmprunteur=?,codePostalEmprunteur=?,identifiantEmprunteur=?,mdpEmprunteur=?,telFixeEmprunteur=?,telPortableEmprunteur=?,emailEmprunteur=? where numEmprunteur=?";
		$res=$this->db->prepare($sql);
		$res->execute(array(
			$this->nomEmprunteur,
			$this->prenomEmprunteur,
			$this->numRueEmprunteur,
			$this->nomRueEmprunteur,
			$this->villeEmprunteur,
			$this->codePostalEmprunteur,
			$this->identifiantEmprunteur,
			$this->mdpEmprunteur,
			$this->telFixeEmprunteur,
			$this->telPortableEmprunteur,
			$this->emailEmprunteur
		));		
	}			
}

?>
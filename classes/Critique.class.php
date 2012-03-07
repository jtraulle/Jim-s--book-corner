<?php

class Critique extends Table{
		public $numEmprunteur;
		public $numLivre;
		public $noteCritique;
		public $commentaireCritique;

	public function __construct($numEmprunteur, $numLivre, $noteCritique, $commentaireCritique) {
        
        parent::__construct();
        
        $this->numEmprunteur = $numEmprunteur;
        $this->numLivre = $numLivre;
        $this->noteCritique = $noteCritique;
        $this->commentaireCritique = $commentaireCritique;

        return $this;
    }        

    function ajouterCritique(){
        
        $sql="INSERT INTO critiquer VALUES(?,?,?,?)";
        
        $res=$this->db->prepare($sql);
        
        $res->execute(array(
            $this->numEmprunteur,
            $this->numLivre,
            $this->noteCritique,
            $this->commentaireCritique
        ));         
        
        return $this->db->lastInsertId();
    }

    function modifierCritique(){
		$sql="UPDATE critiquer SET noteCritique=?,commentaireCritique=? WHERE numEmprunteur=? AND numLivre=?";
		$res=$this->db->prepare($sql);
		$res->execute(array(
			$this->noteCritique,
            $this->commentaireCritique,
            $this->numEmprunteur,
            $this->numLivre
		));		
	}
}

?>
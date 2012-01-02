<?php
class Livre extends Table{
		public $numLivre;
		public $titreLivre;
		public $numAuteur;
		public $prenomAuteur;
		public $nomAuteur;
		public $resumeLivre;
		public $langueLivre;
		public $nbExemplaireLivre;
        public $nbEmprunte;
		
    //fonctions publiques---------------------------------------------------------------	
    	
    public function __construct($titreLivre, $numAuteur, $prenomAuteur, $nomAuteur, $resumeLivre, $langueLivre, $nbExemplaireLivre, $nbEmprunte, $numLivre=-1) {
        
        parent::__construct();
        
        $this->numLivre = $numLivre;
        $this->titreLivre = $titreLivre;
        $this->numAuteur = $numAuteur;
        $this->prenomAuteur = $prenomAuteur;
        $this->nomAuteur = $nomAuteur;
        $this->resumeLivre = $resumeLivre;
        $this->langueLivre = $langueLivre;
        $this->nbExemplaireLivre = $nbExemplaireLivre;
        $this->nbEmprunte = $nbEmprunte;

        return $this;
    }
    
    public static function chercherParId($id){
        $sql="SELECT numlivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre FROM livre,auteur WHERE auteur.numAuteur = livre.numAuteur AND numLivre=?";
        $db=DB::get_instance();
        $res=$db->prepare($sql);
        $res->execute(array($id));

        $l= $res->fetch();			
        return new Livre($l[1],$l[2],$l[3],$l[4],$l[5],$l[6],$l[7],null,$l[0]);			
    }
    
    public static function liste($pageCourante=null, $nbEnregistrementsParPage=null){

    	if(!isset($pageCourante) && !isset($nbEnregistrementsParPage))
    		$sql="SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre, COUNT(numEmprunteur) AS nbEmprunte FROM livre LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur LEFT JOIN emprunter ON emprunter.numLivre = livre.numLivre WHERE dateEmprunt IS NULL OR dateRetour IS NULL GROUP BY numLivre";
    	else
    		//On définit notre requête (on récupère l'ensemble des enregistrements)
        	$sql="SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre, COUNT(numEmprunteur) AS nbEmprunte FROM livre LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur LEFT JOIN emprunter ON emprunter.numLivre = livre.numLivre WHERE dateEmprunt IS NULL OR dateRetour IS NULL GROUP BY numLivre LIMIT ".(($pageCourante-1)*$nbEnregistrementsParPage).",".$nbEnregistrementsParPage;

        //Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db=DB::get_instance();
        $reponse = $db->query($sql);
        
        while($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)){
            $livre = new Livre(
                $enregistrement['titreLivre'],
                $enregistrement['numAuteur'],
                $enregistrement['prenomAuteur'],
                $enregistrement['nomAuteur'],
                $enregistrement['resumeLivre'],
                $enregistrement['langueLivre'],
                $enregistrement['nbExemplaireLivre'],
                $enregistrement['nbEmprunte'],
                $enregistrement['numLivre']
            );

            $liste[]=$livre;
            
        }
        
        if(isset($liste))
            return $liste;
        else
            return null;
    }

    public static function cinqDerniersLivres(){

        //On définit notre requête (on récupère l'ensemble des enregistrements)
        $sql="SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre, COUNT(numEmprunteur) AS nbEmprunte FROM livre LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur LEFT JOIN emprunter ON emprunter.numLivre = livre.numLivre WHERE dateEmprunt IS NULL OR dateRetour IS NULL GROUP BY numLivre ORDER BY numLivre DESC LIMIT 0,5";

        //Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db=DB::get_instance();
        $reponse = $db->query($sql);
        
        while($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)){
            $livre = new Livre(
                $enregistrement['titreLivre'],
                $enregistrement['numAuteur'],
                $enregistrement['prenomAuteur'],
                $enregistrement['nomAuteur'],
                $enregistrement['resumeLivre'],
                $enregistrement['langueLivre'],
                $enregistrement['nbExemplaireLivre'],
                $enregistrement['nbEmprunte'],
                $enregistrement['numLivre']
            );

            $liste[]=$livre;
            
        }
        
        if(isset($liste))
            return $liste;
        else
            return null;
    }
    
    public static function listeParAuteur($pageCourante=null, $nbEnregistrementsParPage=null, $idAuteur){
    
        	if(!isset($pageCourante) && !isset($nbEnregistrementsParPage))
        		$sql="SELECT numlivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre FROM livre,auteur WHERE auteur.numAuteur = livre.numAuteur AND livre.numAuteur=?";
        	else
        		//On définit notre requête (on récupère l'ensemble des enregistrements)
            	$sql="SELECT numlivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre FROM livre,auteur WHERE auteur.numAuteur = livre.numAuteur AND livre.numAuteur=? LIMIT ".(($pageCourante-1)*$nbEnregistrementsParPage).",".$nbEnregistrementsParPage;
    
            //Comme on est dans un contexte statique, on récupère l'instance de la BDD
            $db=DB::get_instance();
            $reponse = $db->prepare($sql);
            $reponse->execute(array(
            	$idAuteur
            ));	
            
            while($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)){
                $livre = new Livre(
                    $enregistrement['titreLivre'],
                    $enregistrement['numAuteur'],
                    $enregistrement['prenomAuteur'],
                    $enregistrement['nomAuteur'],
                    $enregistrement['resumeLivre'],
                    $enregistrement['langueLivre'],
                    $enregistrement['nbExemplaireLivre'],
                    $enregistrement['numlivre']
                );
    
                $liste[]=$livre;
                
            }
            
            if(isset($liste))
                return $liste;
            else
                return null;
        }

	//fonctions privées-----------------------------------------------
    function enregistrer(){
        if($this->numLivre==-1) {
            $this->numLivre=$this->inserer();
            return $this->numLivre;
        }
        else
            return $this->modifier();
    }
    
	function inserer(){
		
		$sql="INSERT INTO livre VALUES('',?,?,?,?,?)";
		
		$res=$this->db->prepare($sql);
		
		$res->execute(array(
			$this->titreLivre,
			$this->resumeLivre,
			$this->langueLivre,
			$this->nbExemplaireLivre
		));			
		
		return $this->db->lastInsertId();
	}

	function modifier(){
		$sql="UPDATE livre SET titreLivre=?,numAuteur=?,resumeLivre=?,langueLivre=?,nbExemplaireLivre=? WHERE numLivre=?";
		$res=$this->db->prepare($sql);
		$res->execute(array(
			$this->titreLivre,
			$this->numAuteur,
			$this->resumeLivre,
			$this->langueLivre,
			$this->nbExemplaireLivre,
			$this->numLivre
		));		
	}
    
    function supprimer(){
        $sql="DELETE FROM livre WHERE numLivre='{$this->numLivre}'";
        $this->db->exec($sql);
        $this->numLivre=-1;
    }	
}

?>
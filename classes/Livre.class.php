<?php
class Livre extends Table{
		public $numLivre;
		public $titreLivre;
		public $resumeLivre;
		public $langueLivre;
		public $nbExemplaireLivre;
		
    //fonctions publiques---------------------------------------------------------------	
    	
    public function __construct($titreLivre,$resumeLivre, $langueLivre, $nbExemplaireLivre, $numLivre=-1) {
        
        parent::__construct();
        
        $this->numLivre = $numLivre;
        $this->titreLivre = $titreLivre;
        $this->resumeLivre = $resumeLivre;
        $this->langueLivre = $langueLivre;
        $this->nbExemplaireLivre = $nbExemplaireLivre;

        return $this;
    }
    
    public static function chercherParId($id){
        $sql="SELECT * from livre WHERE numLivre=?";
        $db=DB::get_instance();
        $res=$db->prepare($sql);
        $res->execute(array($id));

        $l= $res->fetch();			
        return new Livre($l[1],$l[2],$l[3],$l[4],$l[0]);			
    }
    
    public static function liste($pageCourante=null, $nbEnregistrementsParPage=null){

    	if(!isset($pageCourante) && !isset($nbEnregistrementsParPage))
    		$sql="SELECT * FROM livre";
    	else
    		//On définit notre requête (on récupère l'ensemble des enregistrements)
        	$sql="SELECT * FROM livre LIMIT ".(($pageCourante-1)*$nbEnregistrementsParPage).",".$nbEnregistrementsParPage;

        //Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db=DB::get_instance();
        $reponse = $db->query($sql);

        while($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)){
            $livre = new Livre(
                $enregistrement['titreLivre'],
                $enregistrement['resumeLivre'],
                $enregistrement['langueLivre'],
                $enregistrement['nbExemplaireLivre'],
                $enregistrement['numLivre']
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
		
		$sql="INSERT INTO livre VALUES('',?,?,?,?)";
		
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
		$sql="UPDATE livre SET titreLivre=?,resumeLivre=?,langueLivre=?,nbExemplaireLivre=?";
		$res=$this->db->prepare($sql);
		$res->execute(array(
			$this->titreLivre,
			$this->resumeLivre,
			$this->langueLivre,
			$this->nbExemplaireLivre
		));		
	}
    
    function supprimer(){
        $sql="DELETE FROM livre WHERE numLivre='{$this->numLivre}'";
        $this->db->exec($sql);
        $this->numLivre=-1;
    }	
}

?>
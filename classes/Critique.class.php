<?php

class Critique extends Table{
		public $numEmprunteur;
		public $numLivre;
		public $noteCritique;
		public $commentaireCritique;
                public $identifiantEmprunteur;

	public function __construct($numEmprunteur, $numLivre, $noteCritique, $commentaireCritique) {
        
        parent::__construct();
        
        $this->numEmprunteur = $numEmprunteur;
        $this->numLivre = $numLivre;
        $this->noteCritique = $noteCritique;
        $this->commentaireCritique = $commentaireCritique;

        return $this;
    }       
    
    public static function isCritiqueDejaRedigee($numEmprunteur, $numLivre){
        $sql="SELECT COUNT(*) FROM critiquer WHERE numEmprunteur=? AND numLivre=?";
        $db=DB::get_instance();
        $res=$db->prepare($sql);
        $res->execute(array($numEmprunteur, $numLivre));

        $c= $res->fetch();
        
        if($c[0] == 0){
            return false;
        } else {
            return true;
        }		
    }
    
    public static function recupererNotes($numLivre){
        $db=DB::get_instance();
        
        $sql="SELECT COUNT(*) FROM critiquer WHERE numLivre=? AND noteCritique=1";
        $res=$db->prepare($sql);
        $res->execute(array($numLivre));
        $n1= $res->fetch();
        
        $notes[1] = $n1[0];
        
        $sql2="SELECT COUNT(*) FROM critiquer WHERE numLivre=? AND noteCritique=2";
        $res2=$db->prepare($sql2);
        $res2->execute(array($numLivre));
        $n2= $res2->fetch();
        
        $notes[2] = $n2[0];
        
        $sql3="SELECT COUNT(*) FROM critiquer WHERE numLivre=? AND noteCritique=3";
        $res3=$db->prepare($sql3);
        $res3->execute(array($numLivre));
        $n3= $res3->fetch();
        
        $notes[3] = $n3[0];
        
        $sql4="SELECT COUNT(*) FROM critiquer WHERE numLivre=? AND noteCritique=4";
        $res4=$db->prepare($sql4);
        $res4->execute(array($numLivre));
        $n4= $res4->fetch();
        
        $notes[4] = $n4[0];
        
        $sql5="SELECT COUNT(*) FROM critiquer WHERE numLivre=? AND noteCritique=5";
        $res5=$db->prepare($sql5);
        $res5->execute(array($numLivre));
        $n5= $res5->fetch();
        
        $notes[5] = $n5[0];
        
        return $notes;
    }
    
    public static function chercherParId($numEmprunteur, $numLivre){
        $sql="SELECT * FROM critiquer WHERE numEmprunteur=? AND numLivre=?";
        $db=DB::get_instance();
        $res=$db->prepare($sql);
        $res->execute(array($numEmprunteur, $numLivre));

        $c= $res->fetch();			
        return new Critique($c[0],$c[1],$c[2],$c[3]);			
    }
    
    public static function troisPremieresCritiques($numLivre){

        //On définit notre requête (on récupère l'ensemble des enregistrements)
        $sql="SELECT * FROM critiquer WHERE numLivre =? LIMIT 0,3";

        //Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db=DB::get_instance();
        $reponse=$db->prepare($sql);
        $reponse->execute(array($numLivre));
        
        while($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)){
            $critique = new Critique(
                $enregistrement['numEmprunteur'],
                $enregistrement['numLivre'],
                $enregistrement['noteCritique'],
                $enregistrement['commentaireCritique']
            );
            
            $emprunteur = Emprunteur::chercherParId($enregistrement['numEmprunteur']);
            $critique->identifiantEmprunteur=$emprunteur->identifiantEmprunteur;

            $liste[]=$critique;
            
        }
        
        if(isset($liste))
            return $liste;
        else
            return null;
    }
       
    public static function CritiquesParEmprunteur($numEmprunteur, $pageCourante, $nbEnregistrementsParPage){

        //On définit notre requête (on récupère l'ensemble des enregistrements)
        $sql="SELECT * FROM critiquer WHERE numEmprunteur =? LIMIT ".(($pageCourante-1)*$nbEnregistrementsParPage).",".$nbEnregistrementsParPage;

        //Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db=DB::get_instance();
        $reponse=$db->prepare($sql);
        $reponse->execute(array($numEmprunteur));
        
        while($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)){
            $critique = new Critique(
                $enregistrement['numEmprunteur'],
                $enregistrement['numLivre'],
                $enregistrement['noteCritique'],
                $enregistrement['commentaireCritique']
            );
            
            $critique->infosLivre = Livre::chercherParId($enregistrement['numLivre']);

            $liste[]=$critique;
        }
            
            if(isset($liste))
                return $liste;
            else
                return null;
    }
    
    public static function liste($numLivre, $pageCourante, $nbEnregistrementsParPage){

        //On définit notre requête (on récupère l'ensemble des enregistrements)
        $sql="SELECT * FROM critiquer WHERE numLivre =? LIMIT ".(($pageCourante-1)*$nbEnregistrementsParPage).",".$nbEnregistrementsParPage;

        //Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db=DB::get_instance();
        $reponse=$db->prepare($sql);
        $reponse->execute(array($numLivre));
        
        while($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)){
            $critique = new Critique(
                $enregistrement['numEmprunteur'],
                $enregistrement['numLivre'],
                $enregistrement['noteCritique'],
                $enregistrement['commentaireCritique']
            );
            
            $emprunteur = Emprunteur::chercherParId($enregistrement['numEmprunteur']);
            $critique->identifiantEmprunteur=$emprunteur->identifiantEmprunteur;

            $liste[]=$critique;
            
        }
        
        if(isset($liste))
            return $liste;
        else
            return null;
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
    
    function supprimerCritique(){
        $sql="DELETE FROM critiquer WHERE numLivre='{$this->numLivre}' AND numEmprunteur='{$this->numEmprunteur}'";
		$this->db->exec($sql);	
	}
}

?>
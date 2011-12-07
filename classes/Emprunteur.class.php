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
        $db=DB::get_instance();
        $db->exec($sql);
        $this->numEmprunteur=-1;
    }

    public static function chercherParId($id){
        $sql="SELECT * from emprunteur WHERE numEmprunteur=?";
        $db=DB::get_instance();
        $res=$db->prepare($sql);
        $res->execute(array($id));
        //gérer les erreurs éventuelles

        $e= $res->fetch();
        return new Emprunteur($e[1],$e[2],$e[3],$e[4],$e[5],$e[6],$e[7],$e[8],$e[9],$e[10],$e[11],$e[0]);
    }

    public static function liste(){

        //On définit notre requête (on récupère l'ensemble des enregistrements)
        $sql="SELECT * FROM emprunteur";

        //Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db=DB::get_instance();
        $reponse = $db->query($sql);

        while($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)){
            $emprunteur = new Emprunteur(
                $enregistrement['nomEmprunteur'],
                $enregistrement['prenomEmprunteur'],
                $enregistrement['numRueEmprunteur'],
                $enregistrement['nomRueEmprunteur'],
                $enregistrement['villeEmprunteur'],
                $enregistrement['CodePostalEmprunteur'],
                $enregistrement['identifiantEmprunteur'],
                $enregistrement['mdpEmprunteur'],
                $enregistrement['telFixeEmprunteur'],
                $enregistrement['telPortableEmprunteur'],
                $enregistrement['emailEmprunteur'],
                $enregistrement['numEmprunteur']
            );

            $liste[]=$emprunteur;
        }

        return $liste;
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
        $sql="UPDATE emprunteur SET nomEmprunteur=?,prenomEmprunteur=?,numRueEmprunteur=?,nomRueEmprunteur=?,villeEmprunteur=?,codePostalEmprunteur=?,telFixeEmprunteur=?,telPortableEmprunteur=?,emailEmprunteur=? WHERE numEmprunteur=?";
        $res=$this->db->prepare($sql);
        $res->execute(array(
            $this->nomEmprunteur,
            $this->prenomEmprunteur,
            $this->numRueEmprunteur,
            $this->nomRueEmprunteur,
            $this->villeEmprunteur,
            $this->codePostalEmprunteur,
            $this->telFixeEmprunteur,
            $this->telPortableEmprunteur,
            $this->emailEmprunteur,
            $this->numEmprunteur
        ));
    }
}

?>

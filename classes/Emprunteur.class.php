<?php

class Emprunteur extends Table {
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
    public $nbLivresDonnes;
    // fonctions publiques---------------------------------------------------------------
    public function __construct($nomEmprunteur, $prenomEmprunteur, $numRueEmprunteur, $nomRueEmprunteur, $villeEmprunteur, $codePostalEmprunteur, $identifiantEmprunteur, $mdpEmprunteur, $telFixeEmprunteur, $telPortableEmprunteur, $emailEmprunteur, $nbLivresDonnes = 0, $numEmprunteur = - 1)
    {
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
        $this->nbLivresDonnes = $nbLivresDonnes;

        return $this;
    }

    public static function chercherParId($id)
    {
        $sql = "SELECT * from emprunteur WHERE numEmprunteur=?";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($id));

        $e = $res->fetch();
        return new Emprunteur($e[1], $e[2], $e[3], $e[4], $e[5], $e[6], $e[7], $e[8], $e[9], $e[10], $e[11], $e[12], $e[0]);
    }

    public static function listeDonateurs(){
        // On définit notre requête (on récupère l'ensemble des enregistrements)
        $sql = "SELECT * FROM emprunteur WHERE nbLivresDonnes > 0 ORDER BY nbLivresDonnes DESC";
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $emprunteur = new Emprunteur($enregistrement['nomEmprunteur'],
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
                $enregistrement['nbLivresDonnes'],
                $enregistrement['numEmprunteur']
            );

            $liste[] = $emprunteur;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    public static function liste($pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT * FROM emprunteur";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT * FROM emprunteur LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $emprunteur = new Emprunteur($enregistrement['nomEmprunteur'],
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
                $enregistrement['nbLivresDonnes'],
                $enregistrement['numEmprunteur']
                );

            $liste[] = $emprunteur;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    public static function chercherParIdentifiant($id)
    {
        $sql = "SELECT * from emprunteur WHERE identifiantEmprunteur=?";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($id));

        $a = $res->fetch();

        if (isset($a)) {
            return new Emprunteur($a[1], $a[2], $a[3], $a[4], $a[5], $a[6], $a[7], $a[8], $a[9], $a[10], $a[11], $a[12], $a[0]);
        } else {
            return null;
        }
    }

    public static function modifierMotDePasse($nouveauPass, $numEmprunteur)
    {
        $db = DB::get_instance();
        $sql = "UPDATE emprunteur SET mdpEmprunteur=? WHERE numEmprunteur=?";
        $res = $db->prepare($sql);
        $res->execute(array($nouveauPass,
                $numEmprunteur
                ));
    }
    // Cette fonction permet de savoir si l'identifiant spécifié est disponible où non.
    public static function isIdentifiantDispo($identifiant)
    {
        $sql = "SELECT COUNT(identifiantEmprunteur) FROM emprunteur WHERE identifiantEmprunteur=?";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($identifiant));

        $l = $res->fetch();

        if ($l[0] > 0)
            return 0;
        else
            return 1;
    }
    // Permet de modifier l'identifiant d'un emprunteur
    public static function modifierIdentifiant($nouvelIdentifiant, $numEmprunteur)
    {
        $db = DB::get_instance();
        $sql = "UPDATE emprunteur SET identifiantEmprunteur=? WHERE numEmprunteur=?";
        $res = $db->prepare($sql);
        $res->execute(array($nouvelIdentifiant,
                $numEmprunteur
                ));
    }
    // fonctions privées-----------------------------------------------
    function enregistrer()
    {
        if ($this->numEmprunteur == - 1) {
            $this->numEmprunteur = $this->inserer();
            return $this->numEmprunteur;
        }else
            return $this->modifier();
    }

    function inserer()
    {
        $this->db = DB::get_instance();

        $sql = "INSERT INTO emprunteur VALUES('',?,?,?,?,?,?,?,?,?,?,?,?)";

        $res = $this->db->prepare($sql);

        $res->execute(array($this->nomEmprunteur,
                $this->prenomEmprunteur,
                $this->numRueEmprunteur,
                $this->nomRueEmprunteur,
                $this->villeEmprunteur,
                $this->codePostalEmprunteur,
                $this->identifiantEmprunteur,
                sha1($this->mdpEmprunteur),
                $this->telFixeEmprunteur,
                $this->telPortableEmprunteur,
                $this->emailEmprunteur,
                $this->nbLivresDonnes
                ));

        return $this->db->lastInsertId();
    }

    function modifier()
    {
        $this->db = DB::get_instance();
        $sql = "UPDATE emprunteur SET nomEmprunteur=?,prenomEmprunteur=?,numRueEmprunteur=?,nomRueEmprunteur=?,villeEmprunteur=?,codePostalEmprunteur=?,telFixeEmprunteur=?,telPortableEmprunteur=?,emailEmprunteur=?,nbLivresDonnes=? WHERE numEmprunteur=?";
        $res = $this->db->prepare($sql);
        $res->execute(array($this->nomEmprunteur,
                $this->prenomEmprunteur,
                $this->numRueEmprunteur,
                $this->nomRueEmprunteur,
                $this->villeEmprunteur,
                $this->codePostalEmprunteur,
                $this->telFixeEmprunteur,
                $this->telPortableEmprunteur,
                $this->emailEmprunteur,
                $this->nbLivresDonnes,
                $this->numEmprunteur
                ));
    }

    function supprimer()
    {
        $this->db = DB::get_instance();
        $sql = "DELETE FROM emprunteur WHERE numEmprunteur='{$this->numEmprunteur}'";
        $this->db->exec($sql);
        $this->numEmprunteur = - 1;
    }
}

?>

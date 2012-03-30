<?php
class Gestionnaire extends Table {
    public $numGestionnaire;
    public $pseudoGestionnaire;
    public $mdpGestionnaire;
    public $telGestionnaire;
    public $emailGestionnaire;
    public $nomGestionnaire;
    public $prenomGestionnaire;
    // fonctions publiques---------------------------------------------------------------
    public function __construct($nomGestionnaire, $prenomGestionnaire, $pseudoGestionnaire, $mdpGestionnaire, $telGestionnaire, $emailGestionnaire, $numGestionnaire = - 1)
    {
        $this->numGestionnaire = $numGestionnaire;
        $this->nomGestionnaire = $nomGestionnaire;
        $this->prenomGestionnaire = $prenomGestionnaire;
        $this->pseudoGestionnaire = $pseudoGestionnaire;
        $this->mdpGestionnaire = $mdpGestionnaire;
        $this->telGestionnaire = $telGestionnaire;
        $this->emailGestionnaire = $emailGestionnaire;

        return $this;
    }

    /**
     * Retourne le nombre de gestionnaires.
     *
     * @return Integer Nombre de gestionnaires dans la base de données.
     */
    public static function compter()
    {
        $sql = "SELECT COUNT(*) FROM gestionnaire";
        $db = DB::get_instance();
        $res = $db->query($sql);
        $res = $res->fetch();

        return $res[0];
    }

    /**
     * Permet d'obtenir les informations associées à un gestionnaire à partir de son identifiant.
     *
     * @param Integer $numGest L'identifiant unique du gestionnaire à rechercher.
     * @return Gestionnaire Un objet de type gestionnaire.
     */
    public static function chercherParId($numGest)
    {
        $sql = "SELECT * from gestionnaire WHERE numGestionnaire=?";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($numGest));

        $gest = $res->fetch();
        return new Gestionnaire($gest['nomGestionnaire'], $gest['prenomGestionnaire'], $gest['pseudoGestionnaire'], $gest['mdpGestionnaire'], $gest['telGestionnaire'], $gest['emailGestionnaire'], $gest[0]);
    }

    /**
     * Permet d'obtenir les informations associées à un gestionnaire à partir de son pseudo.
     *
     * @param String $id Le pseudo unique du gestionnaire à rechercher.
     * @return Gestionnaire Un objet de type gestionnaire.
     */
    public static function chercherParIdentifiant($id)
    {
        $sql = "SELECT * from gestionnaire WHERE pseudoGestionnaire=?";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($id));

        $gest = $res->fetch();
        if (isset($gest)) {
            return new Gestionnaire($gest['nomGestionnaire'], $gest['prenomGestionnaire'], $gest['pseudoGestionnaire'], $gest['mdpGestionnaire'], $gest['telGestionnaire'], $gest['emailGestionnaire'], $gest[0]);
        } else {
            return null;
        }
    }

    /**
     * Gestionnaire::liste()
     *
     * @param mixed $pageCourante
     * @param mixed $nbEnregistrementsParPage
     * @return
     */
    public static function liste($pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT * FROM gestionnaire";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT * FROM gestionnaire LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $gestionnaire = new Gestionnaire($enregistrement['nomGestionnaire'],
                $enregistrement['prenomGestionnaire'],
                $enregistrement['pseudoGestionnaire'],
                $enregistrement['mdpGestionnaire'],
                $enregistrement['telGestionnaire'],
                $enregistrement['emailGestionnaire'],
                $enregistrement['numGestionnaire']
                );

            $liste[] = $gestionnaire;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
     * Gestionnaire::modifierMotDePasse()
     *
     * @param mixed $nouveauPass
     * @param mixed $numEmprunteur
     * @return
     */
    public static function modifierMotDePasse($nouveauPass, $numEmprunteur)
    {
        $db = DB::get_instance();
        $sql = "UPDATE gestionnaire SET mdpGestionnaire=? WHERE numGestionnaire=?";
        $res = $db->prepare($sql);
        $res->execute(array($nouveauPass,
                $numEmprunteur
                ));
    }
    // Cette fonction permet de savoir si l'identifiant spécifié est disponible où non.
    /**
     * Gestionnaire::isIdentifiantDispo()
     *
     * @param mixed $identifiant
     * @return
     */
    public static function isIdentifiantDispo($identifiant)
    {
        $sql = "SELECT COUNT(pseudoGestionnaire) FROM gestionnaire WHERE pseudoGestionnaire=?";
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
    /**
     * Gestionnaire::modifierIdentifiant()
     *
     * @param mixed $nouvelIdentifiant
     * @param mixed $numEmprunteur
     * @return
     */
    public static function modifierIdentifiant($nouvelIdentifiant, $numEmprunteur)
    {
        $db = DB::get_instance();
        $sql = "UPDATE gestionnaire SET pseudoGestionnaire=? WHERE numGestionnaire=?";
        $res = $db->prepare($sql);
        $res->execute(array($nouvelIdentifiant,
                $numEmprunteur
                ));
    }
    // fonctions privées-----------------------------------------------
    /**
     * Gestionnaire::enregistrer()
     *
     * @return
     */
    function enregistrer()
    {
        if ($this->numGestionnaire == - 1) {
            $this->numGestionnaire = $this->inserer();
            return $this->numGestionnaire;
        }else
            return $this->modifier();
    }

    /**
     * Gestionnaire::inserer()
     *
     * @return
     */
    function inserer()
    {
        $db = DB::get_instance();
        $sql = "INSERT INTO gestionnaire VALUES('',?,?,?,?,?,?)";

        $res = $db->prepare($sql);

        $res->execute(array($this->pseudoGestionnaire,
                $this->mdpGestionnaire,
                $this->telGestionnaire,
                $this->emailGestionnaire,
                $this->nomGestionnaire,
                $this->prenomGestionnaire
                ));

        return $db->lastInsertId();
    }

    /**
     * Gestionnaire::modifier()
     *
     * @return
     */
    function modifier()
    {
        $db = DB::get_instance();
        $sql = "UPDATE gestionnaire SET nomGestionnaire=?,prenomGestionnaire=?,telGestionnaire=?,emailGestionnaire=? WHERE numGestionnaire=?";
        $res = $db->prepare($sql);
        $res->execute(array($this->nomGestionnaire,
                $this->prenomGestionnaire,
                $this->telGestionnaire,
                $this->emailGestionnaire,
                $this->numGestionnaire
                ));
    }

    /**
     * Gestionnaire::supprimer()
     *
     * @return
     */
    public function supprimer()
    {
        $this->db = DB::get_instance();
        $sql = "DELETE FROM gestionnaire WHERE numGestionnaire='{$this->numGestionnaire}'";
        $this->db->exec($sql);
        $this->numGestionnaire = - 1;
    }
}

?>
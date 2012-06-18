<?php
class Auteur extends Table {
    public $numAuteur;
    public $prenomAuteur;
    public $nomAuteur;

    /**
    * Auteur::__construct()
    *
    * @param String $prenomAuteur Le prénom de l'auteur
    * @param String $nomAuteur Le nom de l'auteur
    * @param Integer $numAuteur Le numéro unique identifiant l'auteur
    */
    public function __construct($prenomAuteur, $nomAuteur, $numAuteur = - 1)
    {
        parent::__construct();

        $this->numAuteur = $numAuteur;
        $this->prenomAuteur = $prenomAuteur;
        $this->nomAuteur = $nomAuteur;

        return $this;
    }

    /**
    * Permet de récupérer les informations d'un auteur à partir de son identifiant.
    *
    * @param Integer $id L'identifiant de l'auteur à rechercher
    * @return Auteur Un objet de type auteur
    */
    public static function chercherParId($id)
    {
        $sql = "SELECT * from auteur WHERE numAuteur=?";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($id));

        $a = $res->fetch();

        return new Auteur($a[1], $a[2], $a[0]);
    }

    /**
    * Permet d'obtenir un tableau indicé constitué d'un ensemble d'objet Auteur.
    *
    * @param integer $pageCourante Permet d'indiquer à quelle page nous nous trouvons.
    * @param integer $nbEnregistrementsParPage Défini le nombre d'enregistrement figurant sur une page.
    * @return array Un tableau d'objets Auteur
    */
    public static function liste($pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT * FROM auteur ORDER BY nomAuteur, prenomAuteur";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT * FROM auteur ORDER BY nomAuteur, prenomAuteur LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $auteur = new Auteur($enregistrement['prenomAuteur'],
                $enregistrement['nomAuteur'],
                $enregistrement['numAuteur']
                );

            $liste[] = $auteur;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Permet d'ajouter un nouvel auteur dans la base de données.
    *
    * @return integer L'identifiant du nouvel enregistrement
    */
    function inserer()
    {
        $sql = "INSERT INTO auteur VALUES('',?,?)";

        $res = $this->db->prepare($sql);

        $res->execute(array($this->prenomAuteur,
                $this->nomAuteur
                ));

        return $this->db->lastInsertId();
    }

    /**
    * Permet de modifier un auteur existant dans la base de données.
    *
    * @return void
    */
    function modifier()
    {
        $sql = "UPDATE auteur SET prenomAuteur=?,nomAuteur=? WHERE numAuteur=?";
        $res = $this->db->prepare($sql);
        $res->execute(array($this->prenomAuteur,
                $this->nomAuteur,
                $this->numAuteur
                ));
    }

    /**
    * Permet d'enregistrer un objet de type Auteur dans la base de donnée.
    * C'est cette méthode qu'il faut appeler et non inserer() ou modifier().
    *
    * @return void
    */
    function enregistrer()
    {
        if ($this->numAuteur == - 1)
            $this->numAuteur = $this->inserer();
        else
            $this->modifier();
    }

    /**
    * Permet de supprimer un auteur de la base de données.
    *
    * @return void
    */
    function supprimer()
    {
        $sql = "DELETE FROM auteur WHERE numAuteur='{$this->numAuteur}'";
        $this->db->exec($sql);
        $this->numAuteur = - 1;
    }
}

?>
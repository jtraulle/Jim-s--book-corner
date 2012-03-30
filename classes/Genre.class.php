<?php
class Genre extends Table {
    public $numGenre;
    public $genre;
    // fonctions publiques---------------------------------------------------------------
    public function __construct($genre, $numGenre = - 1)
    {
        parent::__construct();
        $this->numGenre = $numGenre;
        $this->genre = $genre;

        return $this;
    }

    public static function liste($pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT * FROM genre";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT * FROM genre LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $genre = new Genre($enregistrement['genre'],
                $enregistrement['numGenre']
                );

            $liste[] = $genre;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    public static function associerGenreLivre($numGenre, $numLivre)
    {
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        // la requête préparée nettoie les champs avant insertion
        $sql = "INSERT INTO genre_livre VALUES(?,?)";

        $res = $db->prepare($sql);

        $res->execute(array($numGenre,
                $numLivre
                ));

        return $db->lastInsertId();
    }

    public static function recupererGenreLivre($numLivre)
    {
        // la requête préparée nettoie les champs avant insertion
        $sql = "SELECT numGenre FROM genre_livre WHERE numLivre = ?";
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->prepare($sql);
        $reponse->execute(array($numLivre
                ));

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $tabvalues[] = $enregistrement['numGenre'];
        }

        if (isset($tabvalues))
            return $tabvalues;
        else
            return null;
    }

    public static function recupererGenreLivreComplet($numLivre)
    {
        // la requête préparée nettoie les champs avant insertion
        $sql = "SELECT genre.numGenre, genre FROM genre_livre, genre WHERE genre.numGenre = genre_livre.numGenre AND numLivre = ?";
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->prepare($sql);
        $reponse->execute(array($numLivre
                ));

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $tabvalues[$enregistrement['numGenre']] = $enregistrement['genre'];
        }

        if (isset($tabvalues))
            return $tabvalues;
        else
            return null;
    }

    function enregistrer()
    {
        if ($this->numGenre == - 1)
            $this->numGenre = $this->inserer();
        else
            $this->modifier();
    }

    public function supprimer()
    {
        $sql = "DELETE FROM genre WHERE numGenre='{$this->numGenre}'";
        $this->db->exec($sql);
        $this->numGenre = - 1;
    }

    public static function supprimerGenreLivre($numLivre)
    {
        $sql = "DELETE FROM genre_livre WHERE numLivre='{$numLivre}'";
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $db->exec($sql);
    }

    public static function chercherParId($numGenre)
    {
        $sql = "SELECT * from genre WHERE numGenre=?";
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($numGenre));
        // gérer les erreurs éventuelles
        $g = $res->fetch();
        return new Genre($g[1], $g[0]);
    }

    function inserer()
    {
        // la requête préparée nettoie les champs avant insertion
        $sql = "INSERT INTO genre VALUES('',?)";

        $res = $this->db->prepare($sql);

        $res->execute(array($this->genre
                ));

        return $this->db->lastInsertId();
    }

    function modifier()
    {
        $sql = "UPDATE genre SET genre=? WHERE numGenre=?";
        $res = $this->db->prepare($sql);
        $res->execute(array($this->genre,
                $this->numGenre
                ));
    }
}

?>
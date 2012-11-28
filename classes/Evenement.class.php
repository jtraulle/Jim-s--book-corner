<?php
class Evenement extends Table {
    public $numEvenement;
    public $nomEvenement;
    public $themeEvenement;
    public $lieuEvenement;
    public $dateEvenement;
    public $desEvenement;
    public $numGestionnaire;
    // fonctions publiques---------------------------------------------------------------
    public function __construct($nomEvenement, $themeEvenement, $lieuEvenement, $dateEvenement, $desEvenement, $numGestionnaire, $numEvenement = - 1)
    {
        $this->numEvenement = $numEvenement;
        $this->nomEvenement = $nomEvenement;
        $this->themeEvenement = $themeEvenement;
        $this->lieuEvenement = $lieuEvenement;
        $this->dateEvenement = $dateEvenement;
        $this->desEvenement = $desEvenement;
        $this->numGestionnaire = $numGestionnaire;

        return $this;
    }

    public static function liste($pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT * FROM evenement";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT * FROM evenement ORDER BY dateEvenement DESC, numEvenement DESC LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime($enregistrement['dateEvenement']);
            $evenement = new Evenement($enregistrement['nomEvenement'],
                $enregistrement['themeEvenement'],
                $enregistrement['lieuEvenement'],
                'le ' . $date->format('d/m/Y') . ' à ' . $date->format('H:i'),
                $enregistrement['desEvenement'],
                $enregistrement['numGestionnaire'],
                $enregistrement['numEvenement']
                );

            $liste[] = $evenement;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    public static function dernierEvenement()
    {
        // On définit notre requête (on récupère l'ensemble des enregistrements)
        $sql = "SELECT * FROM evenement ORDER BY dateEvenement DESC LIMIT 0,1";
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime($enregistrement['dateEvenement']);
            $evenement = new Evenement($enregistrement['nomEvenement'],
                $enregistrement['themeEvenement'],
                $enregistrement['lieuEvenement'],
                'le ' . $date->format('d/m/Y') . ' à ' . $date->format('H:i'),
                $enregistrement['desEvenement'],
                $enregistrement['numGestionnaire'],
                $enregistrement['numEvenement']
                );

            $liste[] = $evenement;
        }

        if (isset($liste))
            return $liste[0];
        else
            return null;
    }

    function enregistrer()
    {
        if ($this->numEvenement == - 1)
            $this->numEvenement = $this->inserer();
        else
            $this->modifier();
    }

    public function supprimer()
    {
        $db = DB::get_instance();
        $sql = "DELETE FROM evenement WHERE numEvenement='{$this->numEvenement}'";
        $db->exec($sql);
        $this->numEvenement = - 1;
    }

    public static function chercherParId($numEvenement)
    {
        $db = DB::get_instance();
        $sql = "SELECT * from evenement WHERE numEvenement=?";
        $res = $db->prepare($sql);
        $res->execute(array($numEvenement));
        // gérer les erreurs éventuelles
        $e = $res->fetch();
        return new Evenement($e[1], $e[2], $e[3], $e[4], $e[5], $e[6], $e[0]);
    }

    function inserer()
    {
        // la requête préparée nettoie les champs avant insertion
        $sql = "INSERT INTO evenement VALUES('',?,?,?,?,?,?)";

        $db = DB::get_instance();
        $res = $db->prepare($sql);

        $res->execute(array($this->nomEvenement,
                $this->themeEvenement,
                $this->lieuEvenement,
                $this->dateEvenement,
                $this->desEvenement,
                $this->numGestionnaire
                ));

        return $db->lastInsertId();
    }

    function modifier()
    {
        $db = DB::get_instance();
        $sql = "UPDATE evenement SET nomEvenement=?,themeEvenement=?,lieuEvenement=?,dateEvenement=?,desEvenement=?,numGestionnaire=? WHERE numEvenement=?";
        $res = $db->prepare($sql);
        $res->execute(array($this->nomEvenement,
                $this->themeEvenement,
                $this->lieuEvenement,
                $this->dateEvenement,
                $this->desEvenement,
                $this->numGestionnaire,
                $this->numEvenement
                ));
    }
}

?>
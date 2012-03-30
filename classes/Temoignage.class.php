<?php

class Temoignage extends Table {
    public $numTemoignage;
    public $temoignage;
    public $dateTemoignage;
    public $numEmprunteur;
    // fonctions publiques---------------------------------------------------------------
    public function __construct($temoignage, $dateTemoignage, $numEmprunteur, $numTemoignage = - 1)
    {
        $this->numTemoignage = $numTemoignage;
        $this->temoignage = $temoignage;
        $this->dateTemoignage = $dateTemoignage;
        $this->numEmprunteur = $numEmprunteur;

        return $this;
    }

    public static function liste($pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT * FROM temoignage";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT * FROM temoignage ORDER BY dateTemoignage DESC LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime($enregistrement['dateTemoignage']);
            $temoignage = new Temoignage($enregistrement['temoignage'],
                'le ' . $date->format('d/m/Y') . ' à ' . $date->format('H:i'),
                $enregistrement['numEmprunteur'],
                $enregistrement['numTemoignage']
                );

            $temoignage->Emprunteur = Emprunteur::chercherParId($temoignage->numEmprunteur);

            $liste[] = $temoignage;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    function enregistrer()
    {
        if ($this->numTemoignage == - 1)
            $this->numTemoignage = $this->inserer();
        else
            $this->modifier();
    }

    public function supprimer()
    {
        $db = DB::get_instance();
        $sql = "DELETE FROM temoignage WHERE numTemoignage='{$this->numTemoignage}'";
        $db->exec($sql);
        $this->numTemoignage = - 1;
    }

    public static function chercherParId($numTemoignage)
    {
        $db = DB::get_instance();
        $sql = "SELECT * from temoignage WHERE numTemoignage=?";
        $res = $db->prepare($sql);
        $res->execute(array($numTemoignage));
        // gérer les erreurs éventuelles
        $e = $res->fetch();
        return new Temoignage($e[1], $e[2], $e[3], $e[0]);
    }

    public static function chercherParNumEmprunteur($numEmprunteur)
    {
        $db = DB::get_instance();
        $sql = "SELECT * from temoignage WHERE numEmprunteur=?";
        $res = $db->prepare($sql);
        $res->execute(array($numEmprunteur));
        // gérer les erreurs éventuelles
        $e = $res->fetch();
        return new Temoignage($e[1], $e[2], $e[3], $e[0]);
    }

    public static function isTemoignageDejaRedigee($numEmprunteur)
    {
        $sql = "SELECT COUNT(*) FROM temoignage WHERE numEmprunteur=?";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($numEmprunteur));

        $c = $res->fetch();

        if ($c[0] == 0) {
            return false;
        } else {
            return true;
        }
    }

    function inserer()
    {
        // la requête préparée nettoie les champs avant insertion
        $sql = "INSERT INTO temoignage (temoignage, numEmprunteur) VALUES(?,?)";

        $db = DB::get_instance();
        $res = $db->prepare($sql);

        $res->execute(array($this->temoignage,
                $this->numEmprunteur
                ));

        return $db->lastInsertId();
    }

    function modifier()
    {
        $db = DB::get_instance();
        $sql = "UPDATE temoignage SET temoignage=? WHERE numTemoignage=?";
        $res = $db->prepare($sql);
        $res->execute(array($this->temoignage,
                $this->numTemoignage
                ));
    }
}

?>
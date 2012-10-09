<?php
class Livre extends Table {
    public $numLivre;
    public $titreLivre;
    public $numAuteur;
    public $prenomAuteur;
    public $nomAuteur;
    public $resumeLivre;
    public $langueLivre;
    public $nbExemplaireLivre;

    /**
    * Livre::__construct()
    *
    * @param String $titreLivre
    * @param Int $numAuteur
    * @param String $prenomAuteur
    * @param String $nomAuteur
    * @param String $resumeLivre
    * @param String $langueLivre
    * @param Int $nbExemplaireLivre
    * @param Int $numLivre
    */
    public function __construct($titreLivre, $numAuteur, $prenomAuteur, $nomAuteur, $resumeLivre, $langueLivre, $nbExemplaireLivre, $numLivre = - 1)
    {
        parent::__construct();

        $this->numLivre = $numLivre;
        $this->titreLivre = $titreLivre;
        $this->numAuteur = $numAuteur;
        $this->prenomAuteur = $prenomAuteur;
        $this->nomAuteur = $nomAuteur;
        $this->resumeLivre = $resumeLivre;
        $this->langueLivre = $langueLivre;
        $this->nbExemplaireLivre = $nbExemplaireLivre;

        return $this;
    }

    /**
    * Chercher par identifiant
    *
    * Permet de récupérer les informations d'un livre à partir de son identifiant.
    *
    * @param Int $id L'identifiant du livre à rechercher
    * @return Livre Un objet de type livre
    */
    public static function chercherParId($id)
    {
        $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre
FROM livre LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur WHERE livre.numLivre = ? GROUP BY numLivre";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($id));

        $l = $res->fetch();
        return new Livre($l[1], $l[2], $l[3], $l[4], $l[5], $l[6], $l[7], $l[0]);
    }
    // Cette fonction permet de savoir si le livre a déjà été emprunté par l'emprunteur
    // Cela permet de savoir s'il peut rédiger une critique ou non ...
    /**
    * Livre::isOuvrageEmprunte()
    *
    * @param mixed $numEmprunteur
    * @param mixed $numLivre
    * @return
    */
    public static function isOuvrageEmprunte($numEmprunteur, $numLivre)
    {
        $sql = "SELECT COUNT(numEmprunt) FROM emprunter WHERE numEmprunteur=? AND numLivre=? AND dateEmprunt IS NOT NULL";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($numEmprunteur, $numLivre));

        $l = $res->fetch();

        if ($l[0] == 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
    * Livre::isPretEnCours()
    *
    * @param mixed $numEmprunteur
    * @param mixed $numLivre
    * @return
    */
    public static function isPretEnCours($numEmprunteur, $numLivre)
    {
        $sql = "SELECT COUNT(numEmprunt) FROM emprunter WHERE numEmprunteur=? AND numLivre=? AND dateRetour IS NULL";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($numEmprunteur, $numLivre));

        $l = $res->fetch();

        return($l[0]);
    }
    // Cette méthode retourne vrai si le livre passé en paramètre est actuellement réservé. Faux sinon.
    /**
    * Livre::isReserve()
    *
    * @param mixed $numLivre
    * @return
    */
    public static function isReserve($numLivre)
    {
        $sql = "SELECT COUNT(numReservation) FROM reserver WHERE numLivre=? AND retireReservation=0";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($numLivre));

        $l = $res->fetch();

        if ($l[0] > 0)
            return 1;
        else
            return 0;
    }
    // Cette méthode retourne vrai s'il existe une réservation disponible pour le livre et l'emprunteur spécifiés.
    /**
    * Livre::isReservationDisponible()
    *
    * @param mixed $numLivre
    * @param mixed $numEmprunteur
    * @return
    */
    public static function isReservationDisponible($numLivre, $numEmprunteur)
    {
        $sql = "SELECT COUNT(numReservation) FROM reserver WHERE numLivre=? AND numEmprunteur=? AND retireReservation=1";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($numLivre, $numEmprunteur));

        $l = $res->fetch();

        if ($l[0] > 0)
            return 1;
        else
            return 0;
    }
    // Cette méthode permet de savoir quelle réservation est à mettre à jour lors de la restitution d'un ouvrage déjà emprunté.
    /**
    * Livre::reservationAValider()
    *
    * @param mixed $numLivre
    * @return
    */
    public static function reservationAValider($numLivre)
    {
        $sql = "SELECT numReservation FROM reserver WHERE numLivre=? AND retireReservation=0 ORDER BY dateReservation ASC LIMIT 0,1";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($numLivre));

        $l = $res->fetch();

        return $l[0];
    }
    // Cette méthode permet de savoir quel est l'emprunteur qui dispose de la réservation lors de la restitution d'un ouvrage déjà emprunté.
    /**
    * Livre::quelEmprunteurReservation()
    *
    * @param mixed $numLivre
    * @return
    */
    public static function quelEmprunteurReservation($numLivre)
    {
        $sql = "SELECT numEmprunteur FROM reserver WHERE numLivre=? AND retireReservation=0 ORDER BY dateReservation ASC LIMIT 0,1";
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($numLivre));

        $l = $res->fetch();

        return $l[0];
    }

    /**
    * Livre::dispoReelle()
    *
    * @param mixed $idLivre
    * @return
    */
    public static function dispoReelle($idLivre)
    {
        // On définit notre requête (on récupère l'ensemble des enregistrements)
        $sql = "SELECT nbExemplaireLivre, COUNT(numEmprunt)  AS nbEmprunte
FROM emprunter,livre WHERE livre.numLivre = emprunter.numLivre AND emprunter.numLivre = ? AND (dateEmprunt IS NOT NULL AND dateRetour IS NULL)";
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($idLivre));

        $l = $res->fetch();
        return($l[0] - $l[1]);
    }

    /**
    * Livre::nbEmprunte()
    *
    * @return
    */
    public function nbEmprunte()
    {
        // On définit notre requête (on récupère l'ensemble des enregistrements)
        $sql = "SELECT nbExemplaireLivre, COUNT(livre.numLivre) AS nbEmprunte
                FROM emprunter,livre WHERE livre.numLivre = emprunter.numLivre
                AND emprunter.numLivre = '{$this->numLivre}'
                AND ((dateDemande IS NOT NULL OR dateEmprunt IS NOT NULL) AND dateRetour IS NULL )
                GROUP BY livre.numLivre";
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $res = $db->query($sql);

        $l = $res->fetch();
        return($l[1]);
    }

    /**
    * Livre::liste()
    *
    * @param mixed $pageCourante
    * @param mixed $nbEnregistrementsParPage
    * @return
    */
    public static function liste($pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre
                FROM livre
                LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur
                ORDER BY titreLivre";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre
                FROM livre
                LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur
                ORDER BY nomAuteur, prenomAuteur, titreLivre
                LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $livre = new Livre($enregistrement['titreLivre'],
                $enregistrement['numAuteur'],
                $enregistrement['prenomAuteur'],
                $enregistrement['nomAuteur'],
                $enregistrement['resumeLivre'],
                $enregistrement['langueLivre'],
                $enregistrement['nbExemplaireLivre'],
                $enregistrement['numLivre']
                );

            $livre->nbCritique = Critique::nbCritiqueOuvrage($enregistrement['numLivre']);

            $liste[] = $livre;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }
    
    /**
    * Livre::listeAlphabet()
    *
    * @param mixed $pageCourante
    * @param mixed $nbEnregistrementsParPage
    * @return
    */
    public static function listeAlphabet($lettre, $pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre
                FROM livre
                LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur
                WHERE nomAuteur LIKE '".$lettre."%'
                ORDER BY nomAuteur, prenomAuteur, titreLivre";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre
                FROM livre
                LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur
                WHERE nomAuteur LIKE '".$lettre."%' 
                ORDER BY nomAuteur, prenomAuteur, titreLivre
                LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $livre = new Livre($enregistrement['titreLivre'],
                $enregistrement['numAuteur'],
                $enregistrement['prenomAuteur'],
                $enregistrement['nomAuteur'],
                $enregistrement['resumeLivre'],
                $enregistrement['langueLivre'],
                $enregistrement['nbExemplaireLivre'],
                $enregistrement['numLivre']
                );

            $livre->nbCritique = Critique::nbCritiqueOuvrage($enregistrement['numLivre']);

            $liste[] = $livre;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Livre::listeGenre()
    *
    * @param mixed $idgenre
    * @param mixed $pageCourante
    * @param mixed $nbEnregistrementsParPage
    * @return
    */
    public static function listeGenre($idgenre, $pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT livre.numLivre, livre.titreLivre, auteur.numAuteur, auteur.prenomAuteur, auteur.nomAuteur, genre.numGenre, genre.genre, livre.resumeLivre, livre.langueLivre, livre.nbExemplaireLivre FROM genre_livre LEFT JOIN livre ON livre.numLivre = genre_livre.numLivre LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur LEFT JOIN genre ON genre.numGenre = genre_livre.numGenre WHERE genre.numGenre = " . $idgenre . " ORDER BY auteur.nomAuteur, auteur.prenomAuteur, livre.titrelivre";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT livre.numLivre, livre.titreLivre, auteur.numAuteur, auteur.prenomAuteur, auteur.nomAuteur, genre.numGenre, genre.genre, livre.resumeLivre, livre.langueLivre, livre.nbExemplaireLivre FROM genre_livre LEFT JOIN livre ON livre.numLivre = genre_livre.numLivre LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur LEFT JOIN genre ON genre.numGenre = genre_livre.numGenre WHERE genre.numGenre = " . $idgenre . " ORDER BY auteur.nomAuteur, auteur.prenomAuteur, livre.titrelivre
                LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $livre = new Livre($enregistrement['titreLivre'],
                $enregistrement['numAuteur'],
                $enregistrement['prenomAuteur'],
                $enregistrement['nomAuteur'],
                $enregistrement['resumeLivre'],
                $enregistrement['langueLivre'],
                $enregistrement['nbExemplaireLivre'],
                $enregistrement['numLivre']
                );

            $liste[] = $livre;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Livre::livresEmpruntes()
    *
    * @param mixed $pageCourante
    * @param mixed $nbEnregistrementsParPage
    * @return
    */
    public static function livresEmpruntes($pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, emprunteur.numEmprunteur, prenomEmprunteur, nomEmprunteur, dateEmprunt
                FROM livre
                LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur
                LEFT JOIN emprunter ON emprunter.numLivre = livre.numLivre
                LEFT JOIN emprunteur ON emprunter.numEmprunteur = emprunteur.numEmprunteur
                WHERE dateEmprunt IS NOT NULL
                AND dateRetour IS NULL
                ORDER BY dateEmprunt DESC";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, emprunteur.numEmprunteur, prenomEmprunteur, nomEmprunteur, dateEmprunt
                FROM livre
                LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur
                LEFT JOIN emprunter ON emprunter.numLivre = livre.numLivre
                LEFT JOIN emprunteur ON emprunter.numEmprunteur = emprunteur.numEmprunteur
                WHERE dateEmprunt IS NOT NULL
                AND dateRetour IS NULL
                ORDER BY dateEmprunt DESC
                LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime($enregistrement['dateEmprunt']);
            $livreEmprunte = array(
                'numLivre' => $enregistrement['numLivre'],
                'titreLivre' => $enregistrement['titreLivre'],
                'numAuteur' => $enregistrement['numAuteur'],
                'prenomAuteur' => $enregistrement['prenomAuteur'],
                'nomAuteur' => $enregistrement['nomAuteur'],
                'resumeLivre' => $enregistrement['resumeLivre'],
                'langueLivre' => $enregistrement['langueLivre'],
                'numEmprunteur' => $enregistrement['numEmprunteur'],
                'prenomEmprunteur' => $enregistrement['prenomEmprunteur'],
                'nomEmprunteur' => $enregistrement['nomEmprunteur'],
                'dateH' => Outils::formatDateDiff($date),
                'dateEmprunt' => 'le ' . $date->format('d/m/Y') . ' à ' . $date->format('H:i')
                );

            $liste[] = $livreEmprunte;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Livre::livresEmpruntesLecteur()
    *
    * @param mixed $pageCourante
    * @param mixed $nbEnregistrementsParPage
    * @param mixed $id
    * @return
    */
    public static function livresEmpruntesLecteur($pageCourante = null, $nbEnregistrementsParPage = null, $id)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, emprunteur.numEmprunteur, prenomEmprunteur, nomEmprunteur, dateEmprunt
                FROM livre
                LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur
                LEFT JOIN emprunter ON emprunter.numLivre = livre.numLivre
                LEFT JOIN emprunteur ON emprunter.numEmprunteur = emprunteur.numEmprunteur
                WHERE dateEmprunt IS NOT NULL
                AND dateRetour IS NULL
                AND emprunteur.numEmprunteur =" . $id . " ORDER BY dateEmprunt DESC";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, emprunteur.numEmprunteur, prenomEmprunteur, nomEmprunteur, dateEmprunt
                FROM livre
                LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur
                LEFT JOIN emprunter ON emprunter.numLivre = livre.numLivre
                LEFT JOIN emprunteur ON emprunter.numEmprunteur = emprunteur.numEmprunteur
                WHERE dateEmprunt IS NOT NULL
                AND emprunteur.numEmprunteur =" . $id . " ORDER BY dateEmprunt DESC
                LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime($enregistrement['dateEmprunt']);
            $livreEmprunte = array(
                'numLivre' => $enregistrement['numLivre'],
                'titreLivre' => $enregistrement['titreLivre'],
                'numAuteur' => $enregistrement['numAuteur'],
                'prenomAuteur' => $enregistrement['prenomAuteur'],
                'nomAuteur' => $enregistrement['nomAuteur'],
                'resumeLivre' => $enregistrement['resumeLivre'],
                'langueLivre' => $enregistrement['langueLivre'],
                'numEmprunteur' => $enregistrement['numEmprunteur'],
                'prenomEmprunteur' => $enregistrement['prenomEmprunteur'],
                'nomEmprunteur' => $enregistrement['nomEmprunteur'],
                'dateH' => Outils::formatDateDiff($date),
                'dateEmprunt' => 'le ' . $date->format('d/m/Y') . ' à ' . $date->format('H:i')
                );

            $liste[] = $livreEmprunte;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Livre::livresEnAttente()
    *
    * @param mixed $pageCourante
    * @param mixed $nbEnregistrementsParPage
    * @return
    */
    public static function livresEnAttente($pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, emprunteur.numEmprunteur, prenomEmprunteur, nomEmprunteur, dateDemande, numEmprunt
                FROM livre
                LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur
                LEFT JOIN emprunter ON emprunter.numLivre = livre.numLivre
                LEFT JOIN emprunteur ON emprunter.numEmprunteur = emprunteur.numEmprunteur
                WHERE dateDemande IS NOT NULL
                AND dateEmprunt IS NULL";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, emprunteur.numEmprunteur, prenomEmprunteur, nomEmprunteur, dateDemande, numEmprunt
                FROM livre
                LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur
                LEFT JOIN emprunter ON emprunter.numLivre = livre.numLivre
                LEFT JOIN emprunteur ON emprunter.numEmprunteur = emprunteur.numEmprunteur
                WHERE dateDemande IS NOT NULL
                AND dateEmprunt IS NULL
                LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime($enregistrement['dateDemande']);
            $livreEnAttente = array(
                'numLivre' => $enregistrement['numLivre'],
                'titreLivre' => $enregistrement['titreLivre'],
                'numAuteur' => $enregistrement['numAuteur'],
                'prenomAuteur' => $enregistrement['prenomAuteur'],
                'nomAuteur' => $enregistrement['nomAuteur'],
                'resumeLivre' => $enregistrement['resumeLivre'],
                'langueLivre' => $enregistrement['langueLivre'],
                'numEmprunt' => $enregistrement['numEmprunt'],
                'numEmprunteur' => $enregistrement['numEmprunteur'],
                'prenomEmprunteur' => $enregistrement['prenomEmprunteur'],
                'nomEmprunteur' => $enregistrement['nomEmprunteur'],
                'dateDemande' => 'le ' . $date->format('d/m/Y') . ' à ' . $date->format('H:i')
                );

            $liste[] = $livreEnAttente;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Livre::livresEnAttenteLecteur()
    *
    * @param mixed $pageCourante
    * @param mixed $nbEnregistrementsParPage
    * @param mixed $id
    * @return
    */
    public static function livresEnAttenteLecteur($pageCourante = null, $nbEnregistrementsParPage = null, $id)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, emprunteur.numEmprunteur, prenomEmprunteur, nomEmprunteur, dateDemande, numEmprunt
                FROM livre
                LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur
                LEFT JOIN emprunter ON emprunter.numLivre = livre.numLivre
                LEFT JOIN emprunteur ON emprunter.numEmprunteur = emprunteur.numEmprunteur
                WHERE dateDemande IS NOT NULL
                AND dateEmprunt IS NULL
                AND emprunteur.numEmprunteur=" . $id;
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, emprunteur.numEmprunteur, prenomEmprunteur, nomEmprunteur, dateDemande, numEmprunt
                FROM livre
                LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur
                LEFT JOIN emprunter ON emprunter.numLivre = livre.numLivre
                LEFT JOIN emprunteur ON emprunter.numEmprunteur = emprunteur.numEmprunteur
                WHERE dateDemande IS NOT NULL
                AND dateEmprunt IS NULL
                AND emprunteur.numEmprunteur=" . $id .
            "LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime($enregistrement['dateDemande']);
            $livreEnAttente = array(
                'numLivre' => $enregistrement['numLivre'],
                'titreLivre' => $enregistrement['titreLivre'],
                'numAuteur' => $enregistrement['numAuteur'],
                'prenomAuteur' => $enregistrement['prenomAuteur'],
                'nomAuteur' => $enregistrement['nomAuteur'],
                'resumeLivre' => $enregistrement['resumeLivre'],
                'langueLivre' => $enregistrement['langueLivre'],
                'numEmprunt' => $enregistrement['numEmprunt'],
                'numEmprunteur' => $enregistrement['numEmprunteur'],
                'prenomEmprunteur' => $enregistrement['prenomEmprunteur'],
                'nomEmprunteur' => $enregistrement['nomEmprunteur'],
                'dateDemande' => 'le ' . $date->format('d/m/Y') . ' à ' . $date->format('H:i')
                );

            $liste[] = $livreEnAttente;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Livre::reservationEnAttente()
    *
    * @param mixed $pageCourante
    * @param mixed $nbEnregistrementsParPage
    * @return
    */
    public static function reservationEnAttente($pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT numReservation, reserver.numEmprunteur, prenomEmprunteur, nomEmprunteur, reserver.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, dateReservation, retireReservation FROM reserver, emprunteur, livre, auteur
                WHERE livre.numAuteur = auteur.numAuteur
                AND reserver.numLivre = livre.numLivre
                AND reserver.numEmprunteur = emprunteur.numEmprunteur
                AND retireReservation = 0
                ORDER BY dateReservation DESC";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT numReservation, reserver.numEmprunteur, prenomEmprunteur, nomEmprunteur, reserver.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, dateReservation FROM reserver, emprunteur, livre, auteur
                WHERE livre.numAuteur = auteur.numAuteur
                AND reserver.numLivre = livre.numLivre
                AND reserver.numEmprunteur = emprunteur.numEmprunteur
                AND retireReservation = 0
                ORDER BY dateReservation DESC
                LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime($enregistrement['dateReservation']);
            $livreEnAttente = array(
                'numReservation' => $enregistrement['numReservation'],
                'numEmprunteur' => $enregistrement['numEmprunteur'],
                'prenomEmprunteur' => $enregistrement['prenomEmprunteur'],
                'nomEmprunteur' => $enregistrement['nomEmprunteur'],
                'numLivre' => $enregistrement['numLivre'],
                'titreLivre' => $enregistrement['titreLivre'],
                'numAuteur' => $enregistrement['numAuteur'],
                'prenomAuteur' => $enregistrement['prenomAuteur'],
                'nomAuteur' => $enregistrement['nomAuteur'],
                'dateReservation' => 'le ' . $date->format('d/m/Y') . ' à ' . $date->format('H:i')
                );

            $liste[] = $livreEnAttente;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Livre::reservationEnAttenteLecteur()
    *
    * @param mixed $pageCourante
    * @param mixed $nbEnregistrementsParPage
    * @param mixed $id
    * @return
    */
    public static function reservationEnAttenteLecteur($pageCourante = null, $nbEnregistrementsParPage = null, $id)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT numReservation, reserver.numEmprunteur, prenomEmprunteur, nomEmprunteur, reserver.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, dateReservation, retireReservation FROM reserver, emprunteur, livre, auteur
                WHERE livre.numAuteur = auteur.numAuteur
                AND reserver.numLivre = livre.numLivre
                AND reserver.numEmprunteur = emprunteur.numEmprunteur
                AND retireReservation = 0
                AND reserver.numEmprunteur =" . $id . " ORDER BY dateReservation DESC";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT numReservation, reserver.numEmprunteur, prenomEmprunteur, nomEmprunteur, reserver.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, dateReservation FROM reserver, emprunteur, livre, auteur
                WHERE livre.numAuteur = auteur.numAuteur
                AND reserver.numLivre = livre.numLivre
                AND reserver.numEmprunteur = emprunteur.numEmprunteur
                AND retireReservation = 0
                AND reserver.numEmprunteur =" . $id . " ORDER BY dateReservation DESC
                LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime($enregistrement['dateReservation']);
            $livreEnAttente = array(
                'numReservation' => $enregistrement['numReservation'],
                'numEmprunteur' => $enregistrement['numEmprunteur'],
                'prenomEmprunteur' => $enregistrement['prenomEmprunteur'],
                'nomEmprunteur' => $enregistrement['nomEmprunteur'],
                'numLivre' => $enregistrement['numLivre'],
                'titreLivre' => $enregistrement['titreLivre'],
                'numAuteur' => $enregistrement['numAuteur'],
                'prenomAuteur' => $enregistrement['prenomAuteur'],
                'nomAuteur' => $enregistrement['nomAuteur'],
                'dateReservation' => 'le ' . $date->format('d/m/Y') . ' à ' . $date->format('H:i')
                );

            $liste[] = $livreEnAttente;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Livre::reservationDispo()
    *
    * @param mixed $pageCourante
    * @param mixed $nbEnregistrementsParPage
    * @return
    */
    public static function reservationDispo($pageCourante = null, $nbEnregistrementsParPage = null)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT numReservation, reserver.numEmprunteur, prenomEmprunteur, nomEmprunteur, reserver.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, dateReservation, retireReservation FROM reserver, emprunteur, livre, auteur
                WHERE livre.numAuteur = auteur.numAuteur
                AND reserver.numLivre = livre.numLivre
                AND reserver.numEmprunteur = emprunteur.numEmprunteur
                AND retireReservation = 1
                ORDER BY dateReservation ASC";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT numReservation, reserver.numEmprunteur, prenomEmprunteur, nomEmprunteur, reserver.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, dateReservation FROM reserver, emprunteur, livre, auteur
                WHERE livre.numAuteur = auteur.numAuteur
                AND reserver.numLivre = livre.numLivre
                AND reserver.numEmprunteur = emprunteur.numEmprunteur
                AND retireReservation = 1
                ORDER BY dateReservation ASC
                LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime($enregistrement['dateReservation']);
            $livreEnAttente = array(
                'numReservation' => $enregistrement['numReservation'],
                'numEmprunteur' => $enregistrement['numEmprunteur'],
                'prenomEmprunteur' => $enregistrement['prenomEmprunteur'],
                'nomEmprunteur' => $enregistrement['nomEmprunteur'],
                'numLivre' => $enregistrement['numLivre'],
                'titreLivre' => $enregistrement['titreLivre'],
                'numAuteur' => $enregistrement['numAuteur'],
                'prenomAuteur' => $enregistrement['prenomAuteur'],
                'nomAuteur' => $enregistrement['nomAuteur'],
                'dateReservation' => 'le ' . $date->format('d/m/Y') . ' à ' . $date->format('H:i')
                );

            $liste[] = $livreEnAttente;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Livre::reservationDispoLecteur()
    *
    * @param mixed $pageCourante
    * @param mixed $nbEnregistrementsParPage
    * @param mixed $id
    * @return
    */
    public static function reservationDispoLecteur($pageCourante = null, $nbEnregistrementsParPage = null, $id)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT numReservation, reserver.numEmprunteur, prenomEmprunteur, nomEmprunteur, reserver.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, dateReservation, retireReservation FROM reserver, emprunteur, livre, auteur
                WHERE livre.numAuteur = auteur.numAuteur
                AND reserver.numLivre = livre.numLivre
                AND reserver.numEmprunteur = emprunteur.numEmprunteur
                AND retireReservation = 1
                AND reserver.numEmprunteur = " . $id . " ORDER BY dateReservation ASC";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT numReservation, reserver.numEmprunteur, prenomEmprunteur, nomEmprunteur, reserver.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, dateReservation FROM reserver, emprunteur, livre, auteur
                WHERE livre.numAuteur = auteur.numAuteur
                AND reserver.numLivre = livre.numLivre
                AND reserver.numEmprunteur = emprunteur.numEmprunteur
                AND retireReservation = 1
                AND reserver.numEmprunteur = " . $id . " ORDER BY dateReservation ASC
                LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime($enregistrement['dateReservation']);
            $livreEnAttente = array(
                'numReservation' => $enregistrement['numReservation'],
                'numEmprunteur' => $enregistrement['numEmprunteur'],
                'prenomEmprunteur' => $enregistrement['prenomEmprunteur'],
                'nomEmprunteur' => $enregistrement['nomEmprunteur'],
                'numLivre' => $enregistrement['numLivre'],
                'titreLivre' => $enregistrement['titreLivre'],
                'numAuteur' => $enregistrement['numAuteur'],
                'prenomAuteur' => $enregistrement['prenomAuteur'],
                'nomAuteur' => $enregistrement['nomAuteur'],
                'dateReservation' => 'le ' . $date->format('d/m/Y') . ' à ' . $date->format('H:i')
                );

            $liste[] = $livreEnAttente;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Livre::cinqDerniersLivres()
    *
    * @return
    */
    public static function cinqDerniersLivres()
    {
        // On définit notre requête (on récupère l'ensemble des enregistrements)
        $sql = "SELECT livre.numLivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre FROM livre LEFT JOIN auteur ON livre.numAuteur = auteur.numAuteur ORDER BY numLivre DESC LIMIT 0,8";
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->query($sql);

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $livre = new Livre($enregistrement['titreLivre'],
                $enregistrement['numAuteur'],
                $enregistrement['prenomAuteur'],
                $enregistrement['nomAuteur'],
                $enregistrement['resumeLivre'],
                $enregistrement['langueLivre'],
                $enregistrement['nbExemplaireLivre'],
                $enregistrement['numLivre']
                );

            $liste[] = $livre;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Livre::listeParAuteur()
    *
    * @param mixed $pageCourante
    * @param mixed $nbEnregistrementsParPage
    * @param mixed $idAuteur
    * @return
    */
    public static function listeParAuteur($pageCourante = null, $nbEnregistrementsParPage = null, $idAuteur)
    {
        if (!isset($pageCourante) && !isset($nbEnregistrementsParPage))
            $sql = "SELECT numlivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre FROM livre,auteur WHERE auteur.numAuteur = livre.numAuteur AND livre.numAuteur=?";
        else
            // On définit notre requête (on récupère l'ensemble des enregistrements)
            $sql = "SELECT numlivre, titreLivre, livre.numAuteur, prenomAuteur, nomAuteur, resumeLivre, langueLivre, nbExemplaireLivre FROM livre,auteur WHERE auteur.numAuteur = livre.numAuteur AND livre.numAuteur=? LIMIT " . (($pageCourante - 1) * $nbEnregistrementsParPage) . "," . $nbEnregistrementsParPage;
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $reponse = $db->prepare($sql);
        $reponse->execute(array($idAuteur
                ));

        while ($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $livre = new Livre($enregistrement['titreLivre'],
                $enregistrement['numAuteur'],
                $enregistrement['prenomAuteur'],
                $enregistrement['nomAuteur'],
                $enregistrement['resumeLivre'],
                $enregistrement['langueLivre'],
                $enregistrement['nbExemplaireLivre'],
                $enregistrement['numlivre']
                );

            $liste[] = $livre;
        }

        if (isset($liste))
            return $liste;
        else
            return null;
    }

    /**
    * Livre::enregistrerPret()
    *
    * @param mixed $numEmprunteur
    * @param mixed $numLivre
    * @return
    */
    public static function enregistrerPret($numEmprunteur, $numLivre)
    {
        $sql = "INSERT INTO emprunter VALUES('',?,?,null,Now(),null,0)";

        $db = DB::get_instance();
        $res = $db->prepare($sql);

        $res->execute(array($numEmprunteur,
                $numLivre
                ));

        return $db->lastInsertId();
    }

    /**
    * Livre::enregistrerDemande()
    *
    * @param mixed $numEmprunteur
    * @param mixed $numLivre
    * @return
    */
    public static function enregistrerDemande($numEmprunteur, $numLivre)
    {
        $sql = "INSERT INTO emprunter VALUES('',?,?,Now(),null,null,0)";

        $db = DB::get_instance();
        $res = $db->prepare($sql);

        $res->execute(array($numEmprunteur,
                $numLivre
                ));

        return $db->lastInsertId();
    }

    /**
    * Livre::reserver()
    *
    * @param mixed $numEmprunteur
    * @param mixed $numLivre
    * @return
    */
    public static function reserver($numEmprunteur, $numLivre)
    {
        $sql = "INSERT INTO reserver VALUES('',?,?,Now(),0)";

        $db = DB::get_instance();
        $res = $db->prepare($sql);

        $res->execute(array($numEmprunteur,
                $numLivre
                ));

        return $db->lastInsertId();
    }

    /**
    * Livre::validerPret()
    *
    * @param mixed $numEmprunt
    * @return
    */
    public static function validerPret($numEmprunt)
    {
        $sql = "UPDATE emprunter SET dateEmprunt=Now() WHERE numEmprunt=?";

        $db = DB::get_instance();
        $res = $db->prepare($sql);

        $res->execute(array($numEmprunt,
                ));
    }
    // Permet de mettre à jour une réservation pour indiquer à l'emprunteur que le livre est disponible.
    /**
    * Livre::majReservationDispo()
    *
    * @param mixed $numReservation
    * @return
    */
    public static function majReservationDispo($numReservation)
    {
        $sql = "UPDATE reserver SET retireReservation=1 WHERE numReservation=?";

        $db = DB::get_instance();
        $res = $db->prepare($sql);

        $res->execute(array($numReservation,
                ));
    }
    // Permet de mettre à jour une réservation pour indiquer qu'elle est terminée.
    /**
    * Livre::majReservationTerminee()
    *
    * @param mixed $numLivre
    * @param mixed $numEmprunteur
    * @return
    */
    public static function majReservationTerminee($numLivre, $numEmprunteur)
    {
        $sql = "UPDATE reserver SET retireReservation=2 WHERE numLivre=? AND numEmprunteur=? AND retireReservation=1";

        $db = DB::get_instance();
        $res = $db->prepare($sql);

        $res->execute(array($numLivre,
                $numEmprunteur
                ));
    }

    /**
    * Livre::rendre()
    *
    * @param mixed $numEmprunteur
    * @param mixed $numLivre
    * @return
    */
    public static function rendre($numEmprunteur, $numLivre)
    {
        $sql = "UPDATE emprunter SET dateRetour=Now() WHERE numEmprunteur=? AND numLivre=? AND dateRetour IS NULL";

        $db = DB::get_instance();
        $res = $db->prepare($sql);

        $res->execute(array($numEmprunteur,
                $numLivre
                ));
    }

    /**
    * Livre::supprimerDemande()
    *
    * @param mixed $id
    * @return
    */
    function supprimerDemande($id)
    {
        $sql = "DELETE FROM emprunter WHERE numEmprunt=" . $id;
        $this->db->exec($sql);
        $this->numLivre = - 1;
    }

    /**
    * Livre::supprimerReservation()
    *
    * @param mixed $id
    * @return
    */
    function supprimerReservation($id)
    {
        $sql = "DELETE FROM reserver WHERE numReservation=" . $id;
        $this->db->exec($sql);
        $this->numLivre = - 1;
    }

    /**
    * Livre::dejaEmprunte()
    *
    * @param mixed $numEmprunteur
    * @param mixed $numLivre
    * @return
    */
    public static function dejaEmprunte($numEmprunteur, $numLivre)
    {
        $sql = "SELECT COUNT(numEmprunt) AS dejaEmprunte FROM emprunter WHERE numEmprunteur = ? AND numLivre = ? AND (dateDemande IS NOT NULL OR dateEmprunt IS NOT NULL) AND dateRetour IS NULL";

        $db = DB::get_instance();
        $res = $db->prepare($sql);

        $res->execute(array($numEmprunteur,
                $numLivre
                ));

        $l = $res->fetch();
        return($l[0]);
    }

    /**
    * Livre::dejaReserve()
    *
    * @param mixed $numEmprunteur
    * @param mixed $numLivre
    * @return
    */
    public static function dejaReserve($numEmprunteur, $numLivre)
    {
        $sql = "SELECT COUNT(numReservation) AS dejaReserve FROM reserver WHERE numEmprunteur = ? AND numLivre = ? AND retireReservation = 0";

        $db = DB::get_instance();
        $res = $db->prepare($sql);

        $res->execute(array($numEmprunteur,
                $numLivre
                ));

        $l = $res->fetch();
        return($l[0]);
    }
    // fonctions privées-----------------------------------------------
    /**
    * Livre::enregistrer()
    *
    * @return
    */
    function enregistrer()
    {
        if ($this->numLivre == - 1) {
            $this->numLivre = $this->inserer();
            return $this->numLivre;
        } else
            return $this->modifier();
    }

    /**
    * Livre::inserer()
    *
    * @return
    */
    function inserer()
    {
        $sql = "INSERT INTO livre VALUES('',?,?,?,?,?)";

        $res = $this->db->prepare($sql);

        $res->execute(array($this->titreLivre,
                $this->numAuteur,
                $this->resumeLivre,
                $this->langueLivre,
                $this->nbExemplaireLivre
                ));

        return $this->db->lastInsertId();
    }

    /**
    * Livre::modifier()
    *
    * @return
    */
    function modifier()
    {
        $sql = "UPDATE livre SET titreLivre=?,numAuteur=?,resumeLivre=?,langueLivre=?,nbExemplaireLivre=? WHERE numLivre=?";
        $res = $this->db->prepare($sql);
        $res->execute(array($this->titreLivre,
                $this->numAuteur,
                $this->resumeLivre,
                $this->langueLivre,
                $this->nbExemplaireLivre,
                $this->numLivre
                ));
    }

    /**
    * Livre::supprimer()
    *
    * @return
    */
    function supprimer()
    {
        $sql = "DELETE FROM livre WHERE numLivre='{$this->numLivre}'";
        $this->db->exec($sql);
        $this->numLivre = - 1;
    }
}

?>
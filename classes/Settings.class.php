<?php

class Settings extends Table {
    public $idSetting;
    public $cleSetting;
    public $valSetting;

    public function __construct($cleSetting, $valSetting, $idSetting = - 1)
    {
        parent::__construct();

        $this->idSetting = $idSetting;
        $this->cleSetting = $cleSetting;
        $this->valSetting = $valSetting;

        return $this;
    }

    function enregistrer()
    {
        $sql = "UPDATE config SET valeur=? WHERE identifiant=?";
        $res = $this->db->prepare($sql);
        $res->execute(array($this->valSetting,
                $this->cleSetting
                ));
    }

    public static function chercherParCleSetting($cleSetting)
    {
        $sql = "SELECT * from config WHERE identifiant=?";
        // Comme on est dans un contexte statique, on récupère l'instance de la BDD
        $db = DB::get_instance();
        $res = $db->prepare($sql);
        $res->execute(array($cleSetting));
        // gérer les erreurs éventuelles
        $s = $res->fetch();
        return new Settings($s[1], $s[2], $s[0]);
    }
}

?>
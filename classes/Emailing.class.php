<?php

class Emailing extends Table {
    public $id;
    public $to;
    public $subject;
    public $body;

    /**
     * Emailing::__construct()
     *
     * @param String $to Adresse à laquelle doit-être envoyé le courriel.
     * @param String $subject Sujet du courriel.
     * @param String $body Corps du message du courriel.
     * @param Integer $id Identifiant unique d'un courriel dans la file d'envoi.
     */
    public function __construct($to, $subject, $body, $id = - 1)
    {
        parent::__construct();

        $this->id = $id;
        $this->to = $to;
        $this->subject = $subject;
        $this->body = $body;

        return $this;
    }

    /**
     * Permet d'ajouter un courriel à la file d'envoi.
     *
     * @return void
     */
    public function ajouter()
    {
        $sql = "INSERT INTO emailing VALUES('',?,?,?)";
        $res = $this->db->prepare($sql);
        $res->execute(array($this->to,
                $this->subject,
                $this->body
                ));
    }

    /**
     * Permet de supprimer un courriel de la file d'envoi.
     *
     * @return void
     */
    public function supprimer()
    {
        $sql = "DELETE FROM emailing WHERE idMail='{$this->id}'";
        $this->db->exec($sql);
        $this->id = - 1;
    }
}

?>
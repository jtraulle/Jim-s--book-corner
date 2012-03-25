<?php

class Emailing extends Table {
	public $id;
	public $to;
	public $subject;
	public $body;

	public function __construct($to, $subject, $body, $id = - 1)
	{
		parent::__construct();

		$this->id = $id;
		$this->to = $to;
		$this->subject = $subject;
		$this->body = $body;

		return $this;
	}

	public function ajouter()
	{
		$sql="INSERT INTO emailing VALUES('',?,?,?)";
		$res=$this->db->prepare($sql);
		$res->execute(array(
			$this->to,
			$this->subject,
			$this->body
		));
	}

	public function supprimer(){

		$sql="DELETE FROM emailing WHERE idMail='{$this->id}'";
		$this->db->exec($sql);
		$this->id=-1;
	}
}

?>
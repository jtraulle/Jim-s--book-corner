<?php
class gestemprunteur extends Module{

	public function init(){}

	public function action_index(){
		$this->set_title("IND/IND");
		$this->tpl->assign("listeEmprunteurs",Emprunteur::liste());
	}

}
?>
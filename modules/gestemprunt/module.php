<?php
class gestemprunt extends Module{

	public function action_index(){
		$this->site->redirect('gestemprunt','dashboard');
    }

	public function action_dashboard(){
		$this->set_title("Gérer les emprunts | Jim's book corner library");
		$this->tpl->assign("listeEmprunts",Livre::livresEmpruntes());
		$this->tpl->assign("listeEnAttente",Livre::livresEnAttente());
    }
}

?>
<?php
class gestemprunt extends Module{

	public function action_index(){
		$this->site->redirect('gestemprunt','dashboard');
    }

	public function action_dashboard(){
		$this->set_title("Gérer les emprunts | Jim's book corner library");
    }
}

?>
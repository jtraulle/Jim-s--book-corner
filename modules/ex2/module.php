<?php
class ex2 extends Module{

	public function action_index(){
		//dort 2"
		sleep(2);
		$this->site->ajouter_message("traitement fictif effectué pendant 2sec");
		$this->site->redirect('index');
		
	}
	
}	
?>
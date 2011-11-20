<?php
class Login extends Module{
		
	public function init(){
		if($this->session->ouverte())
			$this->tpl->assign('login',$this->session->user->login);
	}

	public function action_login(){
		
		// A FAIRE
		// vérifier les donnés de connexion
		//charger le membre
		//$user=Membre::chercherParId(/*mettre l'id*/);
		//$this->session->ouvrir($user);
		
		
		
		//code de demo
		$m=new Membre("Hector","Hector");
		var_dump($m);
		$this->session->ouvrir($m);		
		
		$this->tpl->assign('login',$m->login);
		$this->site->ajouter_message("Vous êtes connecté en tant que ".$m->login);
		Site::redirect("index");
	}

	public function action_deconnect(){		
		$this->site->ajouter_message('Vous êtes déconnecté');							
		$this->session->fermer(); 			
		$this->site->redirect("index");
	}

}
?>
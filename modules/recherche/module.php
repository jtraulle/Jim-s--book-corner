<?php
class Recherche extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("Recherche d'un livre");		
		$f=new Form("?module=recherche&action=valide","form1");
		$f->add_text("titre recherché","titre recherché","titre :");
		$f->add_text("auteur recherché","aureur recherché","auteur :");
		$f->add_select("statut","statut","statut",array("Disponible","Non Disponible"))->set_value("Disponible");
		$f->add_submit("Valider","sub")->set_value('Valider');		

		$this->tpl->assign("form",$f);	
		$this->session->form = $f;		
		
	}
	public function action_valide(){

		$this->set_title("Recherche d'un livre");

		if($this->req->text1 != 'ok'){
			$this->site->ajouter_message('la recherche fonctionne correctement');			
			$form=$this->session->form;
			$form->populate();
			$this->tpl->assign("form",$form);
		}
		else{
			$this->site->ajouter_message('tout s\'est bien passé dans le formulaire précédent');			
			$this->site->redirect('index');
		}
			
	}
}
?>
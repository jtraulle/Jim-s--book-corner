<?php
class Recherche extends Module{

	public function action_index(){

		$this->set_title("Recherche d'un livre");		
		$f=new Form("?module=recherche&action=valide","form1");
		$f->add_text("titre","titre","Titre recherché");
		$f->add_text("auteur","auteur","Auteur recherché");
		$f->add_select("statut","statut","Statut",array("Disponible","Indifférent"))->set_value("Disponible");
		$f->add_submit("Valider","sub")->set_value('Chercher','actions','btn primary');		

		$this->tpl->assign("form",$f);	
		$this->session->form = $f;
		
	}
	public function action_valide(){
			
	}
}
?>
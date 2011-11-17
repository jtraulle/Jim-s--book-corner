<?php
class inscription extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("IND/IND");		
		$f=new Form("?module=inscription&action=valide","form1");
		$f->add_text("nom","nom","Nom");
		$f->add_text("prenom","prenom","Prénom");
		$f->add_text("numrue","numrue","Numéro de rue");
		$f->add_text("nomrue","nomrue","Nom de rue");
		$f->add_text("ville","ville","Ville");
		$f->add_text("codepostal","codepostal","Code postal");
		$f->add_text("identifiant","identifiant","Identifiant");
		$f->add_password("mdp","mdp","Mot de passe");
		$f->add_text("telfixe","telfixe","Téléphone fixe");	
		$f->add_text("telportable","telportable","Téléphone portable");
		$f->add_text("email","email","Email");	
		
		$f->add_submit("Valider","sub")->set_value('Valider');		

		$this->tpl->assign("form",$f);	
		$this->session->form = $f;		
		
	}

	public function action_valide(){

		$this->set_title("IND/VAL");

		if($this->req->text1 != 'ok'){
			$this->site->ajouter_message('il faut taper ok dans la zone de texte');			
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
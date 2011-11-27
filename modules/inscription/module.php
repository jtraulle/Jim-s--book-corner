<?php
class inscription extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("IND/IND");		
		$f=new Form("?module=inscription&action=valide","form1");
		$f->add_text("nomEmprunteur","nomEmprunteur","Nom");
		$f->add_text("prenomEmprunteur","prenomEmprunteur","Prénom");
		$f->add_text("numRueEmprunteur","numRueEmprunteur","Numéro de rue");
		$f->add_text("nomRueEmprunteur","nomRueEmprunteur","Nom de rue");
		$f->add_text("villeEmprunteur","villeEmprunteur","Ville");
		$f->add_text("codePostalEmprunteur","codePostalEmprunteur","Code postal");
		$f->add_text("identifiantEmprunteur","identifiantEmprunteur","Identifiant");
		$f->add_password("mdpEmprunteur","mdpEmprunteur","Mot de passe");
		$f->add_text("telFixeEmprunteur","telFixeEmprunteur","Téléphone fixe");	
		$f->add_text("telPortableEmprunteur","telPortableEmprunteur","Téléphone portable");
		$f->add_text("emailEmprunteur","emailEmprunteur","Email");	
		
		$f->add_submit("Valider","sub")->set_value('Valider');		

		$this->tpl->assign("form",$f);	
		$this->session->form = $f;		
		
	}

	public function action_valide(){

		$this->set_title("Ajouter un emprunteur");

		if($this->req->nomEmprunteur != 'ok'){
			$this->site->ajouter_message('Il faut taper ok dans la zone de texte Nom pour passer la validation !',1);		
			$form=$this->session->form;
			$form->populate();
			$this->tpl->assign("form",$form);
		}
		else{
			$nouvelEmprunteur = new Emprunteur(
				$this->req->nomEmprunteur,
				$this->req->prenomEmprunteur, 
				$this->req->numRueEmprunteur, 
				$this->req->nomRueEmprunteur, 
				$this->req->villeEmprunteur, 
				$this->req->codePostalEmprunteur, 
				$this->req->identifiantEmprunteur, 
				$this->req->mdpEmprunteur, 
				$this->req->telFixeEmprunteur, 
				$this->req->telPortableEmprunteur,
				$this->req->emailEmprunteur
			);

			$nouvelEmprunteur->enregistrer();

			$this->site->ajouter_message('Le nouvel emprunteur a été ajouté avec succès =)',4);			
			$this->site->redirect('index');	
		}
	}
}
?>
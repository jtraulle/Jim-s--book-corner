<?php
class inscription extends Module{

	public function init(){}

	public function action_index(){
		$this->set_title("IND/IND");		
		$f=new Form("?module=inscription&action=valide","form1");
                $f->add_legend("leg1", "Ma belle légende");
		$f->add_select("civilite","civilite","Civilité",array("Monsieur","Madame","Mademoiselle"));			
		$f->add_text(
                        "nomEmprunteur",
                        "nomEmprunteur",
                        "Nom",
                        true,
                        "alphaNumAccentue",
                        "Vous devez saisir une chaîne alphanumérique (accents autorisés)."
                );
		$f->add_text(
                        "prenomEmprunteur",
                        "prenomEmprunteur",
                        "Prénom",
                        true,
                        "alphaNumAccentue",
                        "Vous devez saisir une chaîne alphanumérique (accents autorisés)."
                );
		$f->add_text(
                        "numRueEmprunteur",
                        "numRueEmprunteur",
                        "Numéro de rue",
                        true,
                        "numeric",
                        "Vous devez saisir une nombre."
                );
		$f->add_text(
                        "nomRueEmprunteur",
                        "nomRueEmprunteur",
                        "Nom de rue",
                        true,
                        "alphaNumAccentue",
                        "Vous devez saisir une chaîne alphanumérique (accents autorisés)"
                );
		$f->add_text(
                        "villeEmprunteur",
                        "villeEmprunteur",
                        "Ville",
                        true,
                        "alphaNumAccentue",
                        "Vous devez saisir une chaîne alphanumérique (accents autorisés)"
                );
		$f->add_text(
                        "codePostalEmprunteur",
                        "codePostalEmprunteur",
                        "Code postal",
                        true,
                        "codePostal",
                        "Vous devez saisir un code postal valide"
                );
                $f->add_endfieldset("endfieldset");
                $f->add_text(
                        "identifiantEmprunteur",
                        "identifiantEmprunteur",
                        "Identifiant",
                        true,
                        "identifiant",
                        "Vous devez saisir une chaîne alphanumérique (les accents et caractères spéciaux sont interdits, longueur minimale de 6 caractères)"
                );
		$f->add_password(
                        "mdpEmprunteur",
                        "mdpEmprunteur",
                        "Mot de passe",
                        true,
                        "motdepasse",
                        "Vous devez saisir une chaîne alphanumérique (au moins une lettre et un chiffre, longueur minimale de 6 caractères)"
                );
		$f->add_text(
                        "telFixeEmprunteur",
                        "telFixeEmprunteur",
                        "Téléphone fixe",
                        false,
                        "telfixe",
                        "Saisissez un numéro de téléphone fixe valide"
                );	
		$f->add_text(
                        "telPortableEmprunteur",
                        "telPortableEmprunteur",
                        "Téléphone portable",
                        false,
                        "telmobile",
                        "Saisissez un numéro de téléphone portable valide"
                );
		$f->add_text(
                        "emailEmprunteur",
                        "emailEmprunteur",
                        "Email",
                        false,
                        "email",
                        "Saisissez un email valide"
                );	
		
		$f->add_submit("sub","sub")->set_value('S\'enregister');		

		$this->tpl->assign("form",$f);	
		$this->session->form = $f;		
	}

	public function action_valide(){
                
                $this->set_title("Ajouter un emprunteur");
            
                $form=$this->session->form;
                $form->validate();
                $form->populate();
                $this->tpl->assign("form",$form);

		/*
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
		*/
	}
}
?>
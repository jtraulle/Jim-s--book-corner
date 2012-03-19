<?php
class gestgestionnaire extends Module{

    public function action_connect(){
        $this->set_title("Se connecter | Jim's book corner library");

        $f=new Form("?module=gestgestionnaire&action=valide_connect","form1");
        $f->add_text(
            "identifiantGestionnaire",
            "identifiantGestionnaire",
            "Identifiant",
            true,
            "",
            ""
        );
        $f->add_password(
            "mdpGestionnaire",
            "mdpGestionnaire",
            "Mot de passe",
            true,
            "",
            ""
        );
        $f->add_endfieldset("endfieldset");
        $f->add_submit("sub","sub")->set_value('Se connecter','actions','btn btn-primary');

        $this->tpl->assign("form",$f);
        $this->session->form = $f;
    }

    public function action_valide_connect(){
        $this->set_title("Se connecter | Jim's book corner library");

        $form=$this->session->form;

        $gestionnaire = Gestionnaire::chercherParIdentifiant($_POST['identifiantGestionnaire']);

        if($gestionnaire->mdpGestionnaire == sha1($_POST['mdpGestionnaire'])) { 
            $this->session->ouvrir($gestionnaire);
            $this->tpl->assign('login',$this->session->user->pseudoGestionnaire);
            $this->session->user->statut = 'gestionnaire';
            $this->tpl->assign('statut',$this->session->user->statut);
            $this->site->ajouter_message('Vous êtes maintenant identifié sur le site =)',4);
            $this->site->redirect('gestlivre');
        } else {
            $this->site->ajouter_message('Les identifiants saisis sont incorrects, mais comme nous sommes sympa, vous avez le droit à une deuxième chance ;)',1);
            $this->site->redirect('gestgestionnaire','connect');
        }        
    }

    public function action_deco(){     
        $this->session->fermer();
        $this->site->ajouter_message('Vous êtes maintenant déconnecté',4);       
        $this->site->redirect("index");
    }

	public function action_index(){

		$this->set_title("Gérer les gestionnaires | Jim's book corner library");

		$nbEnregistrementsParPage = 10;
		$totalPages = Outils::nbPagesTotales('gestionnaire',$nbEnregistrementsParPage);

		if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPages){
			$pageCourante = $_GET['page'];
		}else{
			$pageCourante = 1;
		}

		$this->tpl->assign("totalPages",$totalPages);
		$this->tpl->assign("pageCourante",$pageCourante);
		$this->tpl->assign("nbenregistrementsParPage",$nbEnregistrementsParPage);

		$listeGestionnaires = Gestionnaire::liste();

        if(isset($listeGestionnaires)){
            foreach($listeGestionnaires as $gestionnaire){
                $tab[$gestionnaire->numGestionnaire]=$gestionnaire->nomGestionnaire.' '.$gestionnaire->prenomGestionnaire;
            }
                
            $f=new Form("?module=gestgestionnaire&action=modifier","rech");
            $f->add_select("id","id","Recherche rapide",$tab);
            $f->add_submit("sub","sub")->set_value('Consulter/Modifier','inline','btn');

            $this->tpl->assign("champ_recherche",$f);
        }
        
		$this->tpl->assign("listeGestionnaires",Gestionnaire::liste($pageCourante, 10));
	}

    public function action_ajouter(){
        $this->set_title("Ajouter un gestionnaire | Jim's book corner library");

        $f=new Form("?module=gestgestionnaire&action=ajouter_valide","form1");
        
        $f->add_text(
            "nomGestionnaire",
            "nomGestionnaire",
            "Nom",
            true,
            "alphaNumAccentue",
            "Vous devez saisir une chaîne alphabétique (accents autorisés)."
        );
        $f->add_text(
            "prenomGestionnaire",
            "prenomGestionnaire",
            "Prénom",
            true,
            "alphaNumAccentue",
            "Vous devez saisir une chaîne alphabétique (accents autorisés)."
        );
        $f->add_text(
            "telGestionnaire",
            "telGestionnaire",
            "Téléphone fixe",
            false,
            "telportable",
            "Saisissez un numéro de téléphone portable valide"
        );
        $f->add_text(
            "emailGestionnaire",
            "emailGestionnaire",
            "Email",
            false,
            "email",
            "Saisissez un email valide"
        );
        $f->add_text(
            "pseudoGestionnaire",
            "pseudoGestionnaire",
            "Identifiant",
            true,
            "identifiant",
            "Vous devez saisir une chaîne alphanumérique (les accents et caractères spéciaux sont interdits, longueur minimale de 6 caractères)"
        );
        $f->add_password(
            "mdpGestionnaire",
            "mdpGestionnaire",
            "Mot de passe",
            true,
            "motdepasse",
            "Vous devez saisir une chaîne alphanumérique (au moins une lettre et un chiffre, longueur minimale de 6 caractères)"
        );
        
        $f->add_submit("sub","sub")->set_value('Ajouter un gestionnaire','actions','btn btn-primary');

        $this->tpl->assign("form",$f);
        $this->session->form = $f;
    }

    public function action_ajouter_valide(){

        $this->set_title("Ajouter un nouveau gestionnaire | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action ajouter ;)
        if($this->req->sub != 'Ajouter un gestionnaire')
            $this->site->redirect('gestgestionnaire', 'ajouter');

        if($form->validate())
        {
            $nouveauGestionnaire = new Gestionnaire(
                $this->req->nomGestionnaire,
                $this->req->prenomGestionnaire,
                $this->req->pseudoGestionnaire,
                sha1($this->req->mdpGestionnaire),
                $this->req->telGestionnaire,
                $this->req->emailGestionnaire
            );

            $nouveauGestionnaire->enregistrer();

            $this->site->ajouter_message('Le nouveau gestionnaire a été ajouté avec succès =)',4);
            $this->site->redirect('gestgestionnaire');
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
    }

	public function action_supprimer(){
	    $gestionnaireAsuppr = Gestionnaire::chercherParId($_REQUEST['id']);
	    if(empty($gestionnaireAsuppr->numGestionnaire)){
	        $this->site->ajouter_message('Impossible de supprimer ce gestionnaire, il est inexistant !',1);
	        $this->site->redirect('gestgestionnaire','index');
	    }

        if(Gestionnaire::compter() != 1){
            $gestionnaireAsuppr->supprimer();
            $this->site->ajouter_message('Le gestionnaire "'.$gestionnaireAsuppr->prenomGestionnaire.' '.$gestionnaireAsuppr->nomGestionnaire.'" a été supprimé avec succès =)',4);
            $this->site->redirect('gestgestionnaire','index');
        }else{
            $this->site->ajouter_message('Impossible de supprimer "'.$gestionnaireAsuppr->prenomGestionnaire.' '.$gestionnaireAsuppr->nomGestionnaire.'". Vous devez conserver au moins un gestionnaire pour administrer le site !',1);
            $this->site->redirect('gestgestionnaire','index');
        }   
	}

	public function action_modifier(){
		    $gestionnaireAmodif = Gestionnaire::chercherParId($_REQUEST['id']);
		    if(empty($gestionnaireAmodif->numGestionnaire)){
		        $this->site->ajouter_message('Impossible de modifier ce gestionnaire, il est inexistant !',1);
		        $this->site->redirect('gestgestionnaire','index');
		    }

		    $f=new Form("?module=gestgestionnaire&action=valide_modif","form1");
            $f->add_text(
                "nomGestionnaire",
                "nomGestionnaire",
                "Nom",
                true,
                "alphaNumAccentue",
                "Vous devez saisir une chaîne alphabétique (accents autorisés).",
                $gestionnaireAmodif->nomGestionnaire
            );
            $f->add_text(
                "prenomGestionnaire",
                "prenomGestionnaire",
                "Prénom",
                true,
                "alphaNumAccentue",
                "Vous devez saisir une chaîne alphabétique (accents autorisés).",
                $gestionnaireAmodif->prenomGestionnaire
            );
            $f->add_text(
                "telGestionnaire",
                "telGestionnaire",
                "Téléphone fixe",
                false,
                "telportable",
                "Saisissez un numéro de téléphone portable valide",
                $gestionnaireAmodif->telGestionnaire
            );
            $f->add_text(
                "emailGestionnaire",
                "emailGestionnaire",
                "Email",
                false,
                "email",
                "Saisissez un email valide",
                $gestionnaireAmodif->emailGestionnaire
            );
            $f->add_endfieldset("endfieldset");
            $f->add_submit("sub","sub")->set_value('Enregistrer les modifications','actions','btn btn-primary');
            
            $this->tpl->assign("numGestionnaire",$gestionnaireAmodif->numGestionnaire);
            $this->tpl->assign("form",$f);
            $this->session->idGestionnaireAmodif = $gestionnaireAmodif->numGestionnaire;
            $this->session->form = $f;
	}

	public function action_valide_modif(){
	    $this->set_title("S'inscrire | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action index ;)
        if($this->req->sub != 'Enregistrer les modifications')
            $this->site->redirect('gestgestionnaire', 'index');

        if($form->validate()){
            $gestionnaireAmodif = new Gestionnaire(
                $this->req->nomGestionnaire,
                $this->req->prenomGestionnaire,
                $this->req->pseudoGestionnaire,
                $this->req->mdpGestionnaire,
                $this->req->telGestionnaire,
                $this->req->emailGestionnaire,
                $this->session->idGestionnaireAmodif
            );

            $gestionnaireAmodif->enregistrer();

            $this->site->ajouter_message('Le gestionnaire "'.$gestionnaireAmodif->prenomGestionnaire.' '.$gestionnaireAmodif->nomGestionnaire.'" a été modifié avec succès =)',4);
            $this->site->redirect('gestgestionnaire','index');
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
	}
    
    public function action_modifier_pass(){
        $this->set_title("Modifier le mot de passe | Jim's book corner library");

        $f=new Form("?module=gestgestionnaire&action=valide_modifier_pass","form1");
            $f->add_password(
                "mdpNouveau1",
                "mdpNouveau1",
                "Nouveau mot de passe",
                true,
                "motdepasse",
                "Longueur minimale de 7 caractères (dont une majuscule et un chiffre)"
            );
            $f->add_password(
                "mdpNouveau2",
                "mdpNouveau2",
                "Retapez le nouveau mot de passe",
                true,
                "motdepasse",
                "Longueur minimale de 7 caractères (dont une majuscule et un chiffre)"
            );
            $f->add_submit("sub","sub")->set_value('Changer de mot de passe','actions','btn btn-primary');

            $this->tpl->assign("form",$f);
            $this->session->idGestionnaire = $_REQUEST['id'];
            $this->session->form = $f;
    }

    public function action_valide_modifier_pass(){
        $this->set_title("Modifier mon mot de passe | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action modifier_pass ;)
        if($this->req->sub != 'Changer de mot de passe')
            $this->site->redirect('gestemprunteur', 'modifier_pass');

        if($form->validate()){   
            $GestionnaireAconsulter = Gestionnaire::chercherParId($this->session->idGestionnaire);
            if($this->req->mdpNouveau1 == $this->req->mdpNouveau2){
                Gestionnaire::modifierMotDePasse(sha1($this->req->mdpNouveau2), $this->session->idGestionnaire);
                $this->site->ajouter_message('Le mot de passe a bien été modifié !',4);
                $this->site->redirect('gestgestionnaire');
            } else {
                $this->site->ajouter_message('Le nouveau mot de passe n\'est pas identique !',1);
                $this->site->redirect('gestgestionnaire','modifier_pass&id='.$this->session->idGestionnaire);
            }
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
    }

    public function action_modifier_identifiant(){
        $this->set_title("Modifier l'identifiant | Jim's book corner library");
        
        $this->session->idGestionnaire = $_REQUEST['id'];

        $f=new Form("?module=gestgestionnaire&action=valide_modifier_identifiant","form1");
            $f->add_text(
                "pseudoGestionnaire",
                "pseudoGestionnaire",
                "Nouvel identifiant",
                true,
                "identifiant",
                "Accents et caractères spéciaux interdits"
            );
            $f->add_submit("sub","sub")->set_value('Changer identifiant','actions','btn btn-primary');

            $this->tpl->assign("form",$f);
            
            $this->session->form = $f;
    }

    public function action_valide_modifier_identifiant(){
        $this->set_title("Modifier mon identifiant | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action modifier_pass ;)
        if($this->req->sub != 'Changer identifiant')
            $this->site->redirect('gestgestionnaire', 'modifier_identifiant');

        if($form->validate()){   
            $GestionnaireAconsulter = Gestionnaire::chercherParId($this->session->idGestionnaire);
            if(Gestionnaire::isIdentifiantDispo($this->req->pseudoGestionnaire)){
                Gestionnaire::modifierIdentifiant($this->req->pseudoGestionnaire, $this->session->idGestionnaire);
                $this->session->user->pseudoGestionnaire = $this->req->pseudoGestionnaire;
                $this->site->ajouter_message('L\'identifiant a bien été modifié !',4);
                $this->site->redirect('gestgestionnaire');
            } else {
                $this->site->ajouter_message('L\'identifiant que vous avez choisi n\'est pas disponible !',1);
                $this->site->redirect('gestgestionnaire','modifier_identifiant&id='.$this->session->idGestionnaire);
            }
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
    }
}
?>

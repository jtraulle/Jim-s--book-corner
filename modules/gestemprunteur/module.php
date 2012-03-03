<?php
class gestemprunteur extends Module{

    public function action_connect(){
        $this->set_title("Se connecter | Jim's book corner library");

        $f=new Form("?module=gestemprunteur&action=valide_connect","form1");
        $f->add_text(
            "identifiantEmprunteur",
            "identifiantEmprunteur",
            "Identifiant",
            true,
            "",
            ""
        );
        $f->add_password(
            "mdpEmprunteur",
            "mdpEmprunteur",
            "Mot de passe",
            true,
            "",
            ""
        );
        $f->add_endfieldset("endfieldset");
        $f->add_submit("sub","sub")->set_value('Se connecter','actions','btn primary');

        $this->tpl->assign("form",$f);
        $this->session->form = $f;
    }

    public function action_valide_connect(){
        $this->set_title("Se connecter | Jim's book corner library");

        $form=$this->session->form;

        $emprunteur = Emprunteur::chercherParIdentifiant($_POST['identifiantEmprunteur']);

        if($emprunteur->mdpEmprunteur == sha1($_POST['mdpEmprunteur'])) { 
            $this->session->ouvrir($emprunteur);
            $this->tpl->assign('login',$this->session->user->identifiantEmprunteur);
            $this->session->user->statut = 'emprunteur';
            $this->tpl->assign('statut',$this->session->user->statut);
            $this->site->ajouter_message('Vous êtes maintenant identifié sur le site =)',4);
            $this->site->redirect('gestlivre');
        } else {
            $this->site->ajouter_message('Les identifiants saisis sont incorrects, mais comme nous sommes sympa , vous avez le droit à une deuxième chance ;)',1);
            $this->site->redirect('gestemprunteur','connect');
        }        
    }

    public function action_deco(){     
        $this->session->fermer();
        $this->site->ajouter_message('Vous êtes maintenant déconnecté',4);       
        $this->site->redirect("index");
    }

	public function action_index(){
		$this->set_title("Gérer les emprunteurs | Jim's book corner library");

		$nbEnregistrementsParPage = 10;
		$totalPages = Outils::nbPagesTotales('emprunteur',$nbEnregistrementsParPage);

		if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPages){
			$pageCourante = $_GET['page'];
		}else{
			$pageCourante = 1;
		}

		$this->tpl->assign("totalPages",$totalPages);
		$this->tpl->assign("pageCourante",$pageCourante);
		$this->tpl->assign("nbenregistrementsParPage",$nbEnregistrementsParPage);

		$listeEmprunteurs = Emprunteur::liste();

        if(isset($listeEmprunteurs)){
            foreach($listeEmprunteurs as $emprunteur){
                $tab[$emprunteur->numEmprunteur]=$emprunteur->nomEmprunteur.' '.$emprunteur->prenomEmprunteur;
            }
                
            $f=new Form("?module=gestemprunteur&action=modifier","rech");
            $f->add_select("id","id","Recherche rapide",$tab)->set_value(null,'chzn-select');
            $f->add_submit("sub","sub")->set_value('Consulter/Modifier','inline','btn');

            $this->tpl->assign("champ_recherche",$f);
        }
        
		$this->tpl->assign("listeEmprunteurs",Emprunteur::liste($pageCourante, 10));
	}

    public function action_voir(){

        $this->set_title("Consulter une fiche lecteur | Jim's book corner library");

        $emprunteurAconsulter = Emprunteur::chercherParId($_REQUEST['id']);
        if(empty($emprunteurAconsulter->numEmprunteur)){
            $this->site->ajouter_message('Impossible de visualiser cet emprunteur, il est inexistant !',1);
            $this->site->redirect('gestemprunteur','index');
        }

        $this->tpl->assign("emprunteurAconsulter",$emprunteurAconsulter);

        $this->tpl->assign("listeEmprunts",Livre::livresEmpruntesLecteur(null,null,$emprunteurAconsulter->numEmprunteur));
        $this->tpl->assign("listeEnAttente",Livre::livresEnAttenteLecteur(null,null,$emprunteurAconsulter->numEmprunteur));
        $this->tpl->assign("listeReservationsEnAttente",Livre::reservationEnAttenteLecteur(null,null,$emprunteurAconsulter->numEmprunteur)); 
        $this->tpl->assign("listeReservationsDispo",Livre::reservationDispoLecteur(null,null,$emprunteurAconsulter->numEmprunteur)); 
    }

	public function action_supprimer(){
	    $emprunteurAsuppr = Emprunteur::chercherParId($_REQUEST['id']);
	    if(empty($emprunteurAsuppr->numEmprunteur)){
	        $this->site->ajouter_message('Impossible de supprimer cet emprunteur, il est inexistant !',1);
	        $this->site->redirect('gestemprunteur','index');
	    }

	    $emprunteurAsuppr->supprimer();
	    $this->site->ajouter_message('L\'emprunteur "'.$emprunteurAsuppr->prenomEmprunteur.' '.$emprunteurAsuppr->nomEmprunteur.'" a été supprimé avec succès =)',4);
	    $this->site->redirect('gestemprunteur','index');
	}

	public function action_modifier(){
		    $emprunteurAmodif = Emprunteur::chercherParId($_REQUEST['id']);
		    if(empty($emprunteurAmodif->numEmprunteur)){
		        $this->site->ajouter_message('Impossible de modifier cet emprunteur, il est inexistant !',1);
		        $this->site->redirect('gestemprunteur','index');
		    }

		    $f=new Form("?module=gestemprunteur&action=valide_modif","form1");
            $f->add_legend("leg1", "Informations personnelles");
            $f->add_select("civilite","civilite","Civilité",array("Monsieur","Madame","Mademoiselle"));
            $f->add_text(
                "nomEmprunteur",
                "nomEmprunteur",
                "Nom",
                true,
                "alphaNumAccentue",
                "Vous devez saisir une chaîne alphabétique (accents autorisés).",
                $emprunteurAmodif->nomEmprunteur
            );
            $f->add_text(
                "prenomEmprunteur",
                "prenomEmprunteur",
                "Prénom",
                true,
                "alphaNumAccentue",
                "Vous devez saisir une chaîne alphabétique (accents autorisés).",
                $emprunteurAmodif->prenomEmprunteur
            );
            $f->add_text(
                "numRueEmprunteur",
                "numRueEmprunteur",
                "Numéro de rue",
                true,
                "numeric",
                "Vous devez saisir une nombre.",
                $emprunteurAmodif->numRueEmprunteur
            );
            $f->add_text(
                "nomRueEmprunteur",
                "nomRueEmprunteur",
                "Nom de rue",
                true,
                "alphaNumAccentue",
                "Vous devez saisir une chaîne alphanumérique (accents autorisés)",
                $emprunteurAmodif->nomRueEmprunteur
            );
            $f->add_text(
                "villeEmprunteur",
                "villeEmprunteur",
                "Ville",
                true,
                "alphaNumAccentue",
                "Vous devez saisir une chaîne alphanumérique (accents autorisés)",
                $emprunteurAmodif->villeEmprunteur

            );
            $f->add_text(
                "codePostalEmprunteur",
                "codePostalEmprunteur",
                "Code postal",
                true,
                "codepostal",
                "Vous devez saisir un code postal valide",
                $emprunteurAmodif->codePostalEmprunteur
            );
            $f->add_endfieldset("endfieldset");
            $f->add_legend("leg3", "Informations de contact");
            $f->add_text(
                "telFixeEmprunteur",
                "telFixeEmprunteur",
                "Téléphone fixe",
                false,
                "telfixe",
                "Saisissez un numéro de téléphone fixe valide",
                $emprunteurAmodif->telFixeEmprunteur
            );
            $f->add_text(
                "telPortableEmprunteur",
                "telPortableEmprunteur",
                "Téléphone portable",
                false,
                "telportable",
                "Saisissez un numéro de téléphone portable valide",
                $emprunteurAmodif->telPortableEmprunteur
            );
            $f->add_text(
                "emailEmprunteur",
                "emailEmprunteur",
                "Email",
                false,
                "email",
                "Saisissez un email valide",
                $emprunteurAmodif->emailEmprunteur
            );
            $f->add_endfieldset("endfieldset");
            $f->add_submit("sub","sub")->set_value('Enregistrer les modifications','actions','btn primary');

            $this->tpl->assign("form",$f);
            $this->session->idEmprunteurAmodif = $emprunteurAmodif->numEmprunteur;
            $this->session->form = $f;
	}

	public function action_valide_modif(){
	    $this->set_title("S'inscrire | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action index ;)
        if($this->req->sub != 'Enregistrer les modifications')
            $this->site->redirect('gestemprunteur', 'index');

        if($form->validate()){
            $emprunteurAmodif = new Emprunteur(
                $this->req->nomEmprunteur,
                $this->req->prenomEmprunteur,
                $this->req->numRueEmprunteur,
                $this->req->nomRueEmprunteur,
                $this->req->villeEmprunteur,
                $this->req->codePostalEmprunteur,
                '',
                '',
                $this->req->telFixeEmprunteur,
                $this->req->telPortableEmprunteur,
                $this->req->emailEmprunteur,
                $this->session->idEmprunteurAmodif
            );

            $emprunteurAmodif->enregistrer();

            $this->site->ajouter_message('L\'emprunteur "'.$emprunteurAmodif->prenomEmprunteur.' '.$emprunteurAmodif->nomEmprunteur.'" a été modifié avec succès =)',4);
            $this->site->redirect('gestemprunteur','index');
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
	}

    public function action_moncompte(){
        $this->set_title("Mon compte lecteur | Jim's book corner library");

        $emprunteurAconsulter = Emprunteur::chercherParId($this->session->user->numEmprunteur);
        if(empty($emprunteurAconsulter->numEmprunteur)){
            $this->site->ajouter_message('Impossible de visualiser cet emprunteur, il est inexistant !',1);
            $this->site->redirect('gestemprunteur','index');
        }

        $this->tpl->assign("emprunteurAconsulter",$emprunteurAconsulter);

        $this->tpl->assign("listeEmprunts",Livre::livresEmpruntesLecteur(null,null,$emprunteurAconsulter->numEmprunteur));
        $this->tpl->assign("listeEnAttente",Livre::livresEnAttenteLecteur(null,null,$emprunteurAconsulter->numEmprunteur));
        $this->tpl->assign("listeReservationsEnAttente",Livre::reservationEnAttenteLecteur(null,null,$emprunteurAconsulter->numEmprunteur)); 
        $this->tpl->assign("listeReservationsDispo",Livre::reservationDispoLecteur(null,null,$emprunteurAconsulter->numEmprunteur));
    }

    public function action_modifier_pass(){
        $this->set_title("Modifier mon mot de passe | Jim's book corner library");

        $f=new Form("?module=gestemprunteur&action=valide_modifier_pass","form1");
            $f->add_password(
                "mdpActuel",
                "mdpActuel",
                "Mot de passe actuel",
                true,
                null,
                "Saisissez le mot de passe actuel du compte"
            );
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
            $f->add_submit("sub","sub")->set_value('Changer de mot de passe','actions','btn primary');

            $this->tpl->assign("form",$f);
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
            $emprunteurAconsulter = Emprunteur::chercherParId($this->session->user->numEmprunteur);

            if(sha1($this->req->mdpActuel) == $emprunteurAconsulter->mdpEmprunteur){
                if($this->req->mdpNouveau1 == $this->req->mdpNouveau2){
                    Emprunteur::modifierMotDePasse(sha1($this->req->mdpNouveau2), $this->session->user->numEmprunteur);
                    $this->site->ajouter_message('Votre mot de passe a bien été modifié !',4);
                    $this->site->redirect('gestemprunteur','moncompte');
                } else {
                    $this->site->ajouter_message('Le nouveau mot de passe n\'est pas identique !',1);
                    $this->site->redirect('gestemprunteur','modifier_pass');
                }
            } else {
                $this->site->ajouter_message('Le mot de passe actuel que vous avez saisi ne correspond pas !',1);
                $this->site->redirect('gestemprunteur','modifier_pass');
            }
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
    }

    public function action_modifier_identifiant(){
        $this->set_title("Modifier mon identifiant | Jim's book corner library");

        $f=new Form("?module=gestemprunteur&action=valide_modifier_identifiant","form1");
            $f->add_password(
                "mdpActuel",
                "mdpActuel",
                "Mot de passe actuel",
                true,
                null,
                "Saisissez le mot de passe actuel du compte"
            );
            $f->add_text(
                "identifiantEmprunteur",
                "identifiantEmprunteur",
                "Nouvel identifiant",
                true,
                "identifiant",
                "Accents et caractères spéciaux interdits"
            );
            $f->add_submit("sub","sub")->set_value('Changer mon identifiant','actions','btn primary');

            $this->tpl->assign("form",$f);
            $this->session->form = $f;
    }

    public function action_valide_modifier_identifiant(){
        $this->set_title("Modifier mon identifiant | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action modifier_pass ;)
        if($this->req->sub != 'Changer mon identifiant')
            $this->site->redirect('gestemprunteur', 'modifier_identifiant');

        if($form->validate()){   
            $emprunteurAconsulter = Emprunteur::chercherParId($this->session->user->numEmprunteur);

            if(sha1($this->req->mdpActuel) == $emprunteurAconsulter->mdpEmprunteur){
                if(Emprunteur::isIdentifiantDispo($this->req->identifiantEmprunteur)){
                    Emprunteur::modifierIdentifiant($this->req->identifiantEmprunteur, $this->session->user->numEmprunteur);
                    $this->session->user->identifiantEmprunteur = $this->req->identifiantEmprunteur;
                    $this->site->ajouter_message('Votre identifiant a bien été modifié !',4);
                    $this->site->redirect('gestemprunteur','moncompte');
                } else {
                    $this->site->ajouter_message('L\'identifiant que vous avez choisi n\'est pas disponible. !',1);
                    $this->site->redirect('gestemprunteur','modifier_identifiant');
                }
            } else {
                $this->site->ajouter_message('Le mot de passe actuel que vous avez saisi ne correspond pas !',1);
                $this->site->redirect('gestemprunteur','modifier_identifiant');
            }
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
    }

}
?>

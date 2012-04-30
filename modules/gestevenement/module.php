<?php

class gestevenement extends Module{

	public function action_index(){
        $this->set_title("Événements | Jim's book corner library");

        $nbEnregistrementsParPage = 10;
		$totalPages = Outils::nbPagesTotales('evenement',$nbEnregistrementsParPage);

		if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPages){
			$pageCourante = $_GET['page'];
		}else{
			$pageCourante = 1;
		}

		$this->tpl->assign("totalPages",$totalPages);
		$this->tpl->assign("pageCourante",$pageCourante);
		$this->tpl->assign("nbenregistrementsParPage",$nbEnregistrementsParPage);

		$listeEvenements = Evenement::liste();

		$this->tpl->assign("listeEvenements",Evenement::liste($pageCourante, 10));
    }

    public function action_ajouter(){
        $this->set_title("Ajouter un nouvel événement | Jim's book corner library");

        $f=new Form("?module=gestevenement&action=valide","form1");
        $f->add_text(
            "nomEvenement",
            "nomEvenement",
            "Nom de l'événement",
            true,
            "titreLivre",
            "Vous devez saisir une chaîne alphabétique (accents autorisés)."
        );
        $f->add_text(
            "themeEvenement",
            "themeEvenement",
            "Thème de l'événement",
            true,
            "titreLivre",
            "Vous devez saisir une chaîne alphabétique (accents autorisés)."
        );
        $f->add_text(
            "lieuEvenement",
            "lieuEvenement",
            "Lieu de l'événement",
            true,
            "titreLivre",
            "Vous devez saisir une chaîne alphabétique (accents autorisés)."
        );
        $f->add_text(
            "dateEvenement",
            "dateEvenement",
            "Date de l'événement",
            true,
            "datetime",
            "Vous devez saisir une date au format aaaa-mm-jj hh:mm:ss."
        );
        $f->add_textarea(
            "desEvenement",
            "desEvenement",
            "Détail de l'événement",
            true
        );

        $f->add_submit("sub","sub")->set_value('Ajouter le nouvel événement','actions','btn btn-primary');

        $this->tpl->assign("form",$f);
        $this->session->form = $f;
    }

    public function action_valide(){

        $this->set_title("Ajouter un nouvel événement | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action index ;)
        if($_REQUEST['sub'] != 'Ajouter le nouvel événement')
            $this->site->redirect('gestevenement', 'ajouter');

        if($form->validate())
        {
            $nouvelEvenement = new Evenement(
                $this->req->nomEvenement,
                $this->req->themeEvenement,
                $this->req->lieuEvenement,
                $this->req->dateEvenement,
                Outils::sanitize($this->req->desEvenement),
                $this->session->user->numGestionnaire
            );

            $nouvelEvenement->enregistrer();

            $this->site->ajouter_message('Le nouvel événement a été ajouté avec succès =)',4);
            $this->site->redirect('gestevenement');
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
    }

    public function action_modifier(){
		    $evenementAmodif = Evenement::chercherParId($_REQUEST['id']);

		    if(empty($evenementAmodif->numEvenement)){
		        $this->site->ajouter_message('Impossible de modifier cet événement, il est inexistant !',1);
		        $this->site->redirect('gestevenement');
		    }

		    $f=new Form("?module=gestevenement&action=valide_modif","form1");
            $f->add_text(
            "nomEvenement",
            "nomEvenement",
            "Nom de l'événement",
            true,
            "titreLivre",
            "Vous devez saisir une chaîne alphabétique (accents autorisés).",
            $evenementAmodif->nomEvenement
        );
        $f->add_text(
            "themeEvenement",
            "themeEvenement",
            "Thème de l'événement",
            true,
            "titreLivre",
            "Vous devez saisir une chaîne alphabétique (accents autorisés).",
            $evenementAmodif->themeEvenement
        );
        $f->add_text(
            "lieuEvenement",
            "lieuEvenement",
            "Lieu de l'événement",
            true,
            "titreLivre",
            "Vous devez saisir une chaîne alphabétique (accents autorisés).",
            $evenementAmodif->lieuEvenement
        );
        $f->add_text(
            "dateEvenement",
            "dateEvenement",
            "Date de l'événement",
            true,
            "datetime",
            "Vous devez saisir une date au format aaaa-mm-jj hh:mm:ss.",
            $evenementAmodif->dateEvenement
        );
        $f->add_textarea(
            "desEvenement",
            "desEvenement",
            "Détail de l'événement",
            true,
            null,
            null,
            Outils::unsanitize($evenementAmodif->desEvenement)
        );
            $f->add_submit("sub","sub")->set_value('Enregistrer les modifications','actions','btn btn-primary');

            $this->tpl->assign("form",$f);
            $this->session->idEvenementAmodif = $evenementAmodif->numEvenement;
            $this->session->form = $f;
	}

	public function action_valide_modif(){
	    $this->set_title("Modifier un événement | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action index ;)
        if($this->req->sub != 'Enregistrer les modifications')
            $this->site->redirect('gestevenement', 'index');

        if($form->validate()){
            $evenementAmodif = new Evenement(
                $this->req->nomEvenement,
                $this->req->themeEvenement,
                $this->req->lieuEvenement,
                $this->req->dateEvenement,
                Outils::sanitize($this->req->desEvenement),
                $this->session->user->numGestionnaire,
                $this->session->idEvenementAmodif
            );

            $evenementAmodif->enregistrer();

            $this->site->ajouter_message('L\'événement a été modifié avec succès =)',4);
            $this->site->redirect('gestevenement','index');
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
	}

	public function action_supprimer(){
	    $evenementAsuppr = Evenement::chercherParId($_REQUEST['id']);
	    if(empty($evenementAsuppr->numEvenement)){
	        $this->site->ajouter_message('Impossible de supprimer cet événement, il est inexistant !',1);
	        $this->site->redirect('gestevenement','index');
	    }

	    $evenementAsuppr->supprimer();
	    $this->site->ajouter_message('L\'événement a été supprimé avec succès =)',4);
	    $this->site->redirect('gestevenement','index');
	}
}

?>
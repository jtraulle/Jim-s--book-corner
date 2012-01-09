<?php
class gestauteur extends Module{

	public function action_index(){
		$this->set_title("Gérer les auteurs | Jim's book corner library");
		
		$nbEnregistrementsParPage = 10;
		$totalPages = Outils::nbPagesTotales('auteur',$nbEnregistrementsParPage);

		if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPages){
			$pageCourante = $_GET['page'];
		}else{
			$pageCourante = 1;
		}

		$this->tpl->assign("totalPages",$totalPages);
		$this->tpl->assign("pageCourante",$pageCourante);
		$this->tpl->assign("nbenregistrementsParPage",$nbEnregistrementsParPage);

		$listeAuteurs = Auteur::liste();

        if(isset($listeAuteurs)){
            foreach($listeAuteurs as $auteur){
                $tab[$auteur->numAuteur]=$auteur->nomAuteur.' '.$auteur->prenomAuteur;
            }
                
            $f=new Form("?module=gestauteur&action=modifier","rech");
            $f->add_select("id","id","Recherche rapide",$tab)->set_value(null,'chzn-select');
            $f->add_submit("sub","sub")->set_value('Consulter/Modifier','inline','btn');

            $this->tpl->assign("champ_recherche",$f);
        }
        
		$this->tpl->assign("listeAuteurs",Auteur::liste($pageCourante, 10));
	}
	
	 public function action_ajouter(){
        $this->set_title("Ajouter un nouvel auteur | Jim's book corner library");

        $f=new Form("?module=gestauteur&action=valide","form1");
        $f->add_text(
            "nomAuteur",
            "nomAuteur",
            "Nom de l'auteur",
            true,
            "alphaNumAccentue",
            "Vous devez saisir une chaîne alphabétique (accents autorisés)."
        );
        $f->add_textarea(
            "prenomAuteur",
            "prenomAuteur",
            "Prénom de l'auteur",
            true
        );
       
        $f->add_submit("sub","sub")->set_value('Ajouter le nouvel auteur','actions','btn primary');

        $this->tpl->assign("form",$f);
        $this->session->form = $f;
    }
    

	public function action_supprimer(){
	    $auteurAsuppr = Auteur::chercherParId($_REQUEST['id']);
	    if(empty($auteurAsuppr->numAuteur)){
	        $this->site->ajouter_message('Impossible de supprimer cet auteur, il est inexistant !',1);
	        $this->site->redirect('gestauteur','index');
	    }

	    $auteurAsuppr->supprimer();
	    $this->site->ajouter_message('L\'auteur "'.$auteurAsuppr->prenomAuteur.' '.$auteurAsuppr->nomAuteur.'" a été supprimé avec succès =)',4);
	    $this->site->redirect('gestauteur','index');
	}
	
	public function action_voir(){
	    $auteurAvoir = Auteur::chercherParId($_REQUEST['id']);
	    if(empty($auteurAvoir->numAuteur)){
	        $this->site->ajouter_message('Impossible de consulter cet auteur, il est inexistant !',1);
	        $this->site->redirect('gestauteur','index');
	    }
	    
	    $this->tpl->assign("nomPrenomAuteur",$auteurAvoir->prenomAuteur."_".ucwords(strtolower($auteurAvoir->nomAuteur)));
        $this->tpl->assign("numAuteur",$auteurAvoir->numAuteur);
        $this->tpl->assign("nomAuteur",$auteurAvoir->nomAuteur);
        $this->tpl->assign("prenomAuteur",$auteurAvoir->prenomAuteur);
        
        $this->tpl->assign("listeParAuteur",Livre::listeParAuteur(null, null, $auteurAvoir->numAuteur));
        
        //$this->session->idAuteurAvoir = $auteurAvoir->numAuteur;

	}

	public function action_modifier(){
		    $auteurAmodif = Auteur::chercherParId($_REQUEST['id']);
		    if(empty($auteurAmodif->numAuteur)){
		        $this->site->ajouter_message('Impossible de modifier cet auteur, il est inexistant !',1);
		        $this->site->redirect('gestauteur','index');
		    }

		    $f=new Form("?module=gestauteur&action=valide_modif","form1");
            $f->add_text(
                "nomAuteur",
                "nomAuteur",
                "Nom",
                true,
                "alphaNumAccentue",
                "Vous devez saisir une chaîne alphabétique (accents autorisés).",
                $auteurAmodif->nomAuteur
            );
            $f->add_text(
                "prenomAuteur",
                "prenomAuteur",
                "Prénom",
                true,
                "alphaNumAccentue",
                "Vous devez saisir une chaîne alphabétique (accents autorisés).",
                $auteurAmodif->prenomAuteur
            );
            $f->add_submit("sub","sub")->set_value('Enregistrer les modifications','actions','btn primary');

            $this->tpl->assign("form",$f);
            $this->session->idAuteurAmodif = $auteurAmodif->numAuteur;
            $this->session->form = $f;
	}

	public function action_valide_modif(){
	    $this->set_title("Consulter/Modifier un auteur | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action index ;)
        if($this->req->sub != 'Enregistrer les modifications')
            $this->site->redirect('gestauteur', 'index');

        if($form->validate()){
            $auteurAmodif = new Auteur(
                $this->req->prenomAuteur,
                $this->req->nomAuteur,
                $this->session->idAuteurAmodif
            );

            $auteurAmodif->enregistrer();

            $this->site->ajouter_message('L\'auteur "'.$auteurAmodif->prenomAuteur.' '.$auteurAmodif->nomAuteur.'" a été modifié avec succès =)',4);
            $this->site->redirect('gestauteur','index');
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
	}

}
?>

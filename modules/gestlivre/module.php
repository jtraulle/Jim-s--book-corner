<?php
class gestlivre extends Module{
   
    public function action_index(){
		$this->set_title("Gérer les livres | Jim's book corner library");

		$nbEnregistrementsParPage = 10;
		$totalPages = Outils::nbPagesTotales('livre',$nbEnregistrementsParPage);

		if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPages){
			$pageCourante = $_GET['page'];
		}else{
			$pageCourante = 1;
		}

		$this->tpl->assign("totalPages",$totalPages);
		$this->tpl->assign("pageCourante",$pageCourante);
		$this->tpl->assign("nbenregistrementsParPage",$nbEnregistrementsParPage);

		$listeLivres = Livre::liste();

        if(isset($listeLivres)){
            foreach($listeLivres as $livre){
                $tab[$livre->numLivre]=$livre->titreLivre;
            }
                
            $f=new Form("?module=gestlivre&action=modifier","rech");
            $f->add_select("id","id","Recherche rapide",$tab)->set_value(null,'chzn-select');
            $f->add_submit("sub","sub")->set_value('Consulter','inline','btn');

            $this->tpl->assign("champ_recherche",$f);
        }
        
		$this->tpl->assign("listeLivres",Livre::liste($pageCourante, 10));
	}
        
    public function action_voir(){
        
        $livreAConsulter = Livre::chercherParId($_REQUEST['id']);
        if(empty($livreAConsulter->numLivre)){
            $this->site->ajouter_message('Impossible de consulter ce livre, il est inexistant !',1);
            $this->site->redirect('gestlivre','index');
        }
        
        $this->tpl->assign("livre",$livreAConsulter);
        
        $notes = Critique::recupererNotes($livreAConsulter->numLivre);
        $this->tpl->assign("note1",$notes[5]);
        $this->tpl->assign("note2",$notes[4]);
        $this->tpl->assign("note3",$notes[3]);
        $this->tpl->assign("note4",$notes[2]);
        $this->tpl->assign("note5",$notes[1]);
        
        $this->tpl->assign("critiques",Critique::cinqPremieresCritiques($livreAConsulter->numLivre));                   
    }
    
    public function action_ajouter(){
        $this->set_title("Ajouter un nouveau livre | Jim's book corner library");

        $f=new Form("?module=gestlivre&action=valide","form1");
        $f->add_text(
            "titreLivre",
            "titreLivre",
            "Titre du livre",
            true,
            "titreLivre",
            "Vous devez saisir une chaîne alphabétique (accents autorisés)."
        );
        
        $listeAuteurs = Auteur::liste();
        
        if(isset($listeAuteurs)){
            foreach($listeAuteurs as $auteur){
                $tab[$auteur->numAuteur]=$auteur->nomAuteur." ".$auteur->prenomAuteur;
            }
        }
        
        $f->add_select("numAuteur","numAuteur","Auteur",$tab);
        
        $listeGenres = Genre::liste();
        
        if(isset($listeGenres)){
            foreach($listeGenres as $genre){
                $tabGenres[$genre->numGenre]=$genre->genre;
            }
        }
        
        $f->add_select_multiple("numGenre[]","numGenre[]","Genre",$tabGenres);
        
        $f->add_textarea(
            "resumeLivre",
            "resumeLivre",
            "Résumé du livre",
            true
        );
        $f->add_select("langueLivre","langueLivre","Langue",array("Français" => "Français","Anglais" => "Anglais"));
        $f->add_text(
            "nbExemplaireLivre",
            "nbExemplaireLivre",
            "Nombre d'exemplaires",
            true,
            "numeric",
            "Vous devez saisir le nombre d'exemplaires en stock."
        );
        $f->add_submit("sub","sub")->set_value('Ajouter le livre','actions','btn primary');

        $this->tpl->assign("form",$f);
        $this->session->form = $f;
    }
    
    public function action_modifier(){
        
        $livreAmodif = Livre::chercherParId($_REQUEST['id']);
        if(empty($livreAmodif->numLivre)){
            $this->site->ajouter_message('Impossible de modifier ce livre, il est inexistant !',1);
            $this->site->redirect('gestlivre','index');
        }
        
        $f=new Form("?module=gestlivre&action=valide_modif","form1");
        $f->add_text(
            "titreLivre",
            "titreLivre",
            "Titre du livre",
            true,
            "alphaNumAccentue",
            "Vous devez saisir une chaîne alphabétique (accents autorisés).",
            $livreAmodif->titreLivre
        );
        
        $listeAuteurs = Auteur::liste();
        
        if(isset($listeAuteurs)){
            foreach($listeAuteurs as $auteur){
                $tab[$auteur->numAuteur]=$auteur->nomAuteur." ".$auteur->prenomAuteur;
            }
        }
        
        $f->add_select("numAuteur","numAuteur","Auteur",$tab,$livreAmodif->numAuteur);
        
        $listeGenres = Genre::liste();
        
        if(isset($listeGenres)){
            foreach($listeGenres as $genre){
                $tabGenres[$genre->numGenre]=$genre->genre;
            }
        }
        
        $f->add_select_multiple("numGenre[]","numGenre[]","Genre",$tabGenres,Genre::recupererGenreLivre($livreAmodif->numLivre));

        $f->add_textarea(
            "resumeLivre",
            "resumeLivre",
            "Résumé du livre",
            true,
            null,
            null,
            $livreAmodif->resumeLivre
        );
        $f->add_select("langueLivre","langueLivre","Langue",array("Français" => "Français","Anglais" => "Anglais"),$livreAmodif->langueLivre);
        $f->add_text(
            "nbExemplaireLivre",
            "nbExemplaireLivre",
            "Nombre d'exemplaires",
            true,
            "numeric",
            "Vous devez saisir le nombre d'exemplaires en stock.",
            $livreAmodif->nbExemplaireLivre
        );
        $f->add_submit("sub","sub")->set_value('Enregistrer les modifications','actions','btn primary');

        $this->tpl->assign("form",$f);
        $this->session->idLivreAmodif = $livreAmodif->numLivre;
        $this->session->form = $f;
    }
    
    public function action_valide(){

        $this->set_title("Ajouter un livre | Jim's book corner library");

        $form=$this->session->form;
        
        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action index ;)
        if($this->req->sub != 'Ajouter le livre')
            $this->site->redirect('gestlivre', 'ajouter');

        if($form->validate())
        {
            $nouveauLivre = new Livre(
                $this->req->titreLivre,
                $this->req->numAuteur,
                null,
                null,
                $this->req->resumeLivre,
                $this->req->langueLivre,
                $this->req->nbExemplaireLivre
            );

            $numLivre = $nouveauLivre->enregistrer();
            
            //On enregistre maintenant les genre associés
            foreach($this->req->numGenre as $numGenre)
            {
                Genre::associerGenreLivre($numGenre, $numLivre);
            }

            $this->site->ajouter_message('Le nouveau livre a été ajouté avec succès =)',4);
            $this->site->redirect('gestlivre');
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
    }
    
    public function action_valide_modif(){
	    $this->set_title("Modifier un livre | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action index ;)
        if($this->req->sub != 'Enregistrer les modifications')
            $this->site->redirect('gestlivre', 'index');

        if($form->validate()){
            $livreAmodif = new Livre(
                $this->req->titreLivre,
                $this->req->numAuteur,
                null,
                null,
                $this->req->resumeLivre,
                $this->req->langueLivre,
                $this->req->nbExemplaireLivre,
                $this->session->idLivreAmodif
            );

            $livreAmodif->enregistrer();
            
            //On supprime les genres précédemment associés
            Genre::supprimerGenreLivre($this->session->idLivreAmodif);
            
            //On enregistre maintenant les genre associés
            foreach($this->req->numGenre as $numGenre)
            {
                Genre::associerGenreLivre($numGenre, $this->session->idLivreAmodif);
            }

            $this->site->ajouter_message('Le livre "'.$livreAmodif->titreLivre.'" a été modifié avec succès =)',4);
            $this->site->redirect('gestlivre','index');
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
	}

    public function action_supprimer(){
	    $livreAsuppr = Livre::chercherParId($_REQUEST['id']);
	    if(empty($livreAsuppr->numLivre)){
	        $this->site->ajouter_message('Impossible de supprimer ce livre, il est inexistant !',1);
	        $this->site->redirect('gestlivre');
	    }

	    $livreAsuppr->supprimer();
	    $this->site->ajouter_message('Le livre "'.$livreAsuppr->titreLivre.'" a été supprimé avec succès =)',4);
	    $this->site->redirect('gestlivre');
	}
}

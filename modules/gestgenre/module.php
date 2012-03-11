<?php
class gestgenre extends Module{
		
	public function action_index(){
		$this->set_title("Gérer les genres | Jim's book corner library");
		
		$nbEnregistrementsParPage = 10;
		$totalPages = Outils::nbPagesTotales('genre',$nbEnregistrementsParPage);

		if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPages){
			$pageCourante = $_GET['page'];
		}else{
			$pageCourante = 1;
		}

		$this->tpl->assign("totalPages",$totalPages);
		$this->tpl->assign("pageCourante",$pageCourante);
		$this->tpl->assign("nbenregistrementsParPage",$nbEnregistrementsParPage);

		$listeGenres = Genre::liste();

        if(isset($listeGenres)){
            foreach($listeGenres as $genre){
                $tab[$genre->numGenre]=$genre->genre;
            }
                
            $f=new Form("?module=gestgenre&action=voir","rech");
            $f->add_select("id","id","Recherche rapide",$tab)->set_value(null,'chzn-select');
            $f->add_submit("sub","sub")->set_value('Consulter','inline','btn');
			
            $this->tpl->assign("champ_recherche",$f);
        }
        
		$this->tpl->assign("listeGenres",Genre::liste($pageCourante, 10));
	}
	
	public function action_ajouter(){
		$this->set_title("Ajouter un nouveau genre | Jim's book corner library");

        $f=new Form("?module=gestgenre&action=valide","form1");
        $f->add_text(
            "genre",
            "genre",
            "Nom du genre",
            true,
            "alphaNumAccentue",
            "Vous devez saisir une chaîne alphabétique (accents autorisés)."
        );
       
        $f->add_submit("sub","sub")->set_value('Ajouter le nouveau genre','actions','btn btn-primary');

        $this->tpl->assign("form",$f);
        $this->session->form = $f;
    }
	
	public function action_valide(){
	    $this->set_title("Ajouter un genre | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action index ;)
        if($this->req->sub != 'Ajouter le nouveau genre')
            $this->site->redirect('gestgenre', 'index');

        if($form->validate()){
            $genreAajouter = new Genre(
                $this->req->genre
            );

            $genreAajouter->enregistrer();

            $this->site->ajouter_message('Le genre "'.$genreAajouter->genre.'" a été ajouté avec succès =)',4);
            $this->site->redirect('gestgenre','index');
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
	}    

	public function action_supprimer(){
	    $genreAsuppr = Genre::chercherParId($_REQUEST['id']);
	    if(empty($genreAsuppr->numGenre)){
	        $this->site->ajouter_message('Impossible de supprimer ce genre, il est inexistant !',1);
	        $this->site->redirect('gestgenre','index');
	    }

	    $genreAsuppr->supprimer();
	    $this->site->ajouter_message('Le genre "'.$genreAsuppr->genre.'" a été supprimé avec succès =)',4);
	    $this->site->redirect('gestgenre','index');
	}
	
	public function action_voir(){       
	    $genreAvoir = Genre::chercherParId($_REQUEST['id']);
	    if(empty($genreAvoir->numGenre)){
	        $this->site->ajouter_message('Impossible de consulter ce genre, il est inexistant !',1);
	        $this->site->redirect('gestgenre','index');
	    }
        
        $this->tpl->assign("genre",$genreAvoir->genre);
		
		$nbEnregistrementsParPage = 10;
		$totalPages = Outils::nbPagesTotales('genre',$nbEnregistrementsParPage);

		if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPages){
			$pageCourante = $_GET['page'];
		}else{
			$pageCourante = 1;
		}

		$this->tpl->assign("totalPages",$totalPages);
		$this->tpl->assign("pageCourante",$pageCourante);
		$this->tpl->assign("nbenregistrementsParPage",$nbEnregistrementsParPage);
        
		$this->tpl->assign("listeGenres",Livre::listeGenre($_REQUEST['id'], $pageCourante, 10));
	}

	public function action_modifier(){
		    $genreAmodif = Genre::chercherParId($_REQUEST['id']);
		    if(empty($genreAmodif->numGenre)){
		        $this->site->ajouter_message('Impossible de modifier ce genre, il est inexistant !',1);
		        $this->site->redirect('gestgenre','index');
		    }

		    $f=new Form("?module=gestgenre&action=valide_modif","form1");
            $f->add_text(
                "genre",
                "genre",
                "Nom",
                true,
                "alphaNumAccentue",
                "Vous devez saisir une chaîne alphabétique (accents autorisés).",
                $genreAmodif->genre
            );
            $f->add_submit("sub","sub")->set_value('Enregistrer les modifications','actions','btn btn-primary');
			
            $this->tpl->assign("form",$f);
            $this->session->idGenreAmodif = $genreAmodif->numGenre;
            $this->session->form = $f;
	}

	public function action_valide_modif(){
	    $this->set_title("Modifier un genre | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action index ;)
        if($this->req->sub != 'Enregistrer les modifications')
            $this->site->redirect('gestgenre', 'index');

        if($form->validate()){
            $genreAmodif = new Genre(
                $this->req->genre,
                $this->session->idGenreAmodif
            );

            $genreAmodif->enregistrer();

            $this->site->ajouter_message('Le genre "'.$genreAmodif->genre.'" a été modifié avec succès =)',4);
            $this->site->redirect('gestgenre','index');
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
	}

}
?>

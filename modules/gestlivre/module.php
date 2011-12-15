<?php
class gestlivre extends Module{

	public function init(){}
    
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
            $f->add_select("id","id","Recherche rapide",$tab);
            $f->add_submit("sub","sub")->set_value('Consulter/Modifier','inline','btn');

            $this->tpl->assign("champ_recherche",$f);
        }
        
		$this->tpl->assign("listeLivres",Livre::liste($pageCourante, 10));
	}
    
    public function action_ajouter(){
        $this->set_title("Ajouter un nouveau livre | Jim's book corner library");

        $f=new Form("?module=gestlivre&action=valide","form1");
        $f->add_text(
            "titreLivre",
            "titreLivre",
            "Titre du livre",
            true,
            "alphaNumAccentue",
            "Vous devez saisir une chaîne alphabétique (accents autorisés)."
        );
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
                $this->req->resumeLivre,
                $this->req->langueLivre,
                $this->req->nbExemplaireLivre
            );

            $nouveauLivre->enregistrer();

            $this->site->ajouter_message('Le nouveau livre a été ajouté avec succès =)',4);
            $this->site->redirect('gestlivre');
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

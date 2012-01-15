<?php
class gestemprunt extends Module{

	public function action_index(){
		$this->site->redirect('gestemprunt','dashboard');
    }

	public function action_dashboard(){
		$this->set_title("Gérer les emprunts | Jim's book corner library");
		$this->tpl->assign("listeEmprunts",Livre::livresEmpruntes());
		$this->tpl->assign("listeEnAttente",Livre::livresEnAttente());
    }

    public function action_pretsEnCours(){
		$this->set_title("Consulter les prêts en cours | Jim's book corner library");
		$this->tpl->assign("listeEmprunts",Livre::livresEmpruntes());
    }

    public function action_preter(){
		$this->set_title("Prêter un ouvrage | Jim's book corner library");
		$ouvrageAPreter = Livre::chercherParId($_REQUEST['id']);
	    if(empty($ouvrageAPreter->numLivre)){
	        $this->site->ajouter_message('Impossible de prêter cet ouvrage, il est inexistant !',1);
	        $this->site->redirect('gestlivre');
	    }

	    $this->tpl->assign("livre",$ouvrageAPreter);

	    $listeEmprunteurs = Emprunteur::liste();

        if(isset($listeEmprunteurs)){
            foreach($listeEmprunteurs as $emprunteur){
                $tab[$emprunteur->numEmprunteur]=$emprunteur->prenomEmprunteur.' '.$emprunteur->nomEmprunteur;
            }
                
            $f=new Form("?module=gestemprunt&action=valide_pret","pret");
            $f->add_select("numEmprunteur","numEmprunteur","Emprunteur",$tab)->set_value(null,'chzn-select');
            if(($ouvrageAPreter->nbExemplaireLivre - $ouvrageAPreter->nbEmprunte) < 1)
            	$f->add_submit("sub","sub")->set_value('Prêter','actions','btn primary showmodal');
            else
            	$f->add_submit("sub","sub")->set_value('Prêter','actions','btn primary');

            $this->session->idLivre = $ouvrageAPreter->numLivre;
            $this->tpl->assign("form",$f);
        }
    }

    public function action_valide_pret(){
		$this->set_title("Prêter un ouvrage | Jim's book corner library");
		$emprunteur = Emprunteur::chercherParId($this->req->numEmprunteur);
	    if(empty($emprunteur->numEmprunteur)){
	        $this->site->ajouter_message('Impossible de prêter cet ouvrage à cet emprunteur, il est inexistant !',1);
	        $this->site->redirect('gestlivre');
	    }else{
	    	$livre = Livre::chercherParId($this->session->idLivre);
	    	if(($livre->nbExemplaireLivre - $livre->nbEmprunte) < 1){
	    		$this->site->ajouter_message('Impossible de prêter cet ouvrage, plus aucun exemplaire en stock !',1);
	    		$this->site->redirect('gestlivre');
		    }else{
		    	if(Livre::dejaEmprunte($emprunteur->numEmprunteur,$livre->numLivre) == 1){
		    		$this->site->ajouter_message('Impossible de prêter cet ouvrage à cet emprunteur, il possède déjà un exemplaire de ce livre !',1);
	    			$this->site->redirect('gestemprunt','pretsEnCours');
		    	}else{
		    		Livre::enregistrerPret($emprunteur->numEmprunteur,$livre->numLivre);
		    		$this->site->ajouter_message('L\'ouvrage <em>'.$livre->titreLivre.'</em> a été prêté à '.$emprunteur->prenomEmprunteur.' '.$emprunteur->nomEmprunteur.'.<br /> Le lecteur peut désormais emporter le livre ;)',4);
	    			$this->site->redirect('gestemprunt','pretsEnCours');
		    	}
		    }
	    }
    }

    public function action_reserver(){

		$this->set_title("Réserver un ouvrage | Jim's book corner library");
		$livre = Livre::chercherParId($_REQUEST['id']);

	    if(empty($livre->numLivre)){
	        $this->site->ajouter_message('Impossible de réserver cet ouvrage, il est inexistant !',1);
	        $this->site->redirect('gestlivre');
	    }

	    $this->tpl->assign("livre",$livre);

	    $emprunteur = Emprunteur::chercherParId($this->session->user->numEmprunteur);
	    if(empty($emprunteur->numEmprunteur)){
	        $this->site->ajouter_message('Impossible de prêter cet ouvrage à cet emprunteur, il est inexistant !',1);
	        $this->site->redirect('gestlivre');
	    }
	    	
	    if(($livre->nbExemplaireLivre - $livre->nbEmprunte) > 0){
    		$this->site->ajouter_message('Impossible de réserver cet ouvrage, des exemplaire sont encore en stock !',1);
    		$this->site->redirect('gestlivre');
		}

		if(Livre::dejaEmprunte($emprunteur->numEmprunteur,$livre->numLivre) == 1){
			$this->site->ajouter_message('Impossible de réserver cet ouvrage à pour emprunteur, il possède déjà un exemplaire de ce livre !',1);
	    	$this->site->redirect('gestemprunt','pretsEnCours');
	    }

		if(Livre::dejaReserve($emprunteur->numEmprunteur,$livre->numLivre) == 1){
    		$this->site->ajouter_message('Impossible de réserver cet ouvrage pour cet emprunteur, il possède <strong>déjà</strong> une réservation pour cet ouvrage !',1);
			$this->site->redirect('gestlivre');
		}

		Livre::reserver($emprunteur->numEmprunteur,$livre->numLivre);
		$this->site->ajouter_message('L\'ouvrage <em>'.$livre->titreLivre.'</em> a été réservé pour '.$emprunteur->prenomEmprunteur.' '.$emprunteur->nomEmprunteur.'.',4);
		$this->site->redirect('gestlivre');	    
    }
}

?>
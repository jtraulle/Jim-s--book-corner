<?php
class gestreservation extends Module{

	public function action_index(){
		$this->set_title("Gérer les emprunts | Jim's book corner library");
		$this->tpl->assign("listeReservationsEnAttente",Livre::reservationEnAttente());	
		$this->tpl->assign("listeReservationsDispo",Livre::reservationDispo());		
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
	    	
	    if(($livre->nbExemplaireLivre - $livre->nbEmprunte()) > 0){
    		$this->site->ajouter_message('Impossible de réserver cet ouvrage, des exemplaire sont encore en stock !',1);
    		$this->site->redirect('gestlivre');
		}

		if(Livre::dejaEmprunte($emprunteur->numEmprunteur,$livre->numLivre) == 1){
			$this->site->ajouter_message('Impossible de réserver cet ouvrage à pour emprunteur, il possède déjà un exemplaire de ce livre !',1);
	    	$this->site->redirect('gestlivre');
	    }

		if(Livre::dejaReserve($emprunteur->numEmprunteur,$livre->numLivre) == 1){
    		$this->site->ajouter_message('Impossible de réserver cet ouvrage pour cet emprunteur, il possède <strong>déjà</strong> une réservation pour cet ouvrage !',1);
			$this->site->redirect('gestlivre');
		}

		Livre::reserver($emprunteur->numEmprunteur,$livre->numLivre);
		$this->site->ajouter_message('L\'ouvrage <em>'.$livre->titreLivre.'</em> a été réservé pour '.$emprunteur->prenomEmprunteur.' '.$emprunteur->nomEmprunteur.'.',4);
		$this->site->redirect('gestlivre');	    
    }

    public function action_reserver_pour(){
		$this->set_title("Réserver un ouvrage | Jim's book corner library");
		$ouvrageAReserver = Livre::chercherParId($_REQUEST['id']);
	    if(empty($ouvrageAReserver->numLivre)){
	        $this->site->ajouter_message('Impossible de réserver cet ouvrage, il est inexistant !',1);
	        $this->site->redirect('gestlivre');
	    }

	    $this->tpl->assign("livre",$ouvrageAReserver);

	    $listeEmprunteurs = Emprunteur::liste();

        if(isset($listeEmprunteurs)){
            foreach($listeEmprunteurs as $emprunteur){
                $tab[$emprunteur->numEmprunteur]=$emprunteur->prenomEmprunteur.' '.$emprunteur->nomEmprunteur;
            }
                
            $f=new Form("?module=gestreservation&action=valide_reservation","pret");
            $f->add_select("numEmprunteur","numEmprunteur","Emprunteur",$tab)->set_value(null,'chzn-select');
            $f->add_submit("sub","sub")->set_value('Réserver','actions','btn primary');

            $this->session->idLivre = $ouvrageAReserver->numLivre;
            $this->tpl->assign("form",$f);
        }
    }

    public function action_valide_reservation(){
		$this->set_title("Réserver un ouvrage | Jim's book corner library");
		$emprunteur = Emprunteur::chercherParId($this->req->numEmprunteur);
	    if(empty($emprunteur->numEmprunteur)){
	        $this->site->ajouter_message('Impossible de réserver cet ouvrage à cet emprunteur, il est inexistant !',1);
	        $this->site->redirect('gestlivre');
	    }else{
	    	$livre = Livre::chercherParId($this->session->idLivre);
	    	if(($livre->nbExemplaireLivre - $livre->nbEmprunte) < 1){
	    		if(Livre::dejaReserve($emprunteur->numEmprunteur,$livre->numLivre) == 1){
		    		$this->site->ajouter_message('Impossible de réserver cet ouvrage pour cet emprunteur, il possède déjà une réservation de ce livre !',1);
	    			$this->site->redirect('gestreservation');
		    	}else{
		    		Livre::reserver($emprunteur->numEmprunteur,$livre->numLivre);
		    		$this->site->ajouter_message('L\'ouvrage <em>'.$livre->titreLivre.'</em> a bien été réservé pour '.$emprunteur->prenomEmprunteur.' '.$emprunteur->nomEmprunteur.'.',4);
	    			$this->site->redirect('gestreservation');
		    	}
		    }else{
		    	$this->site->ajouter_message('Impossible de réserver cet ouvrage, des exemplaires sont disponibles !',1);
	    		$this->site->redirect('gestlivre');
		    }
	    }
    }

    public function action_suppr(){

    	// @TODO -- EFFECTUER UN CONTROLE POUR S'ASSURER QUE L'UTILISATEUR NE TENTE PAS
    	// DE SUPPRIMER UNE RESERVATION A RETIRER (statut 1)

		Livre::supprimerReservation($_GET['id']);
		$this->site->ajouter_message('La reservation a été supprimée avec succès.',4);
	    $this->site->redirect('gestreservation');
    }
}

?>
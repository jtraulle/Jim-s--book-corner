<?php
class gestreservation extends Module{

	public function action_index(){
		$this->set_title("Gérer les emprunts | Jim's book corner library");
		$this->tpl->assign("listeReservationsEnAttente",Livre::reservationEnAttente());	
		$this->tpl->assign("listeReservationsDispo",Livre::reservationDispo());		
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
<?php
class gestemprunteur extends Module{

	public function init(){}

	public function action_index(){
		$this->set_title("Gérer les emprunteurs | Jim's book corner library");
		$this->tpl->assign("listeEmprunteurs",Emprunteur::liste());
		
		echo "<h6>$"."_REQUEST"."</h6><pre>";
		print_r($_REQUEST);
		echo "</pre>";
	}
	
	public function action_supprimer(){
	    $emprunteurAsuppr = Emprunteur::chercherParId($_REQUEST['id']);
	    if(empty($emprunteurAsuppr->numEmprunteur)){
	        $this->site->ajouter_message('Impossible de supprimer cet utilisateur, il est inexistant !',1);
	        $this->site->redirect('gestemprunteur','index');
	    }

	    $emprunteurAsuppr->supprimer();
	    $this->site->ajouter_message('L\'emprunteur "'.$emprunteurAsuppr->prenomEmprunteur.' '.$emprunteurAsuppr->nomEmprunteur.'" a été supprimé avec succès =)',4);
	    $this->site->redirect('gestemprunteur','index');
	}

}
?>
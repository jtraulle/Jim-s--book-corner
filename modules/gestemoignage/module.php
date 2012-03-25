<?php
class gestemoignage extends Module{

	public function action_index(){

		$this->set_title("Temoignages | Jim's book corner library");

		$nbEnregistrementsParPage = 10;
		$totalPages = Outils::nbPagesTotales('temoignage',$nbEnregistrementsParPage);

		if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPages){
			$pageCourante = $_GET['page'];
		}else{
			$pageCourante = 1;
		}

		$this->tpl->assign("totalPages",$totalPages);
		$this->tpl->assign("pageCourante",$pageCourante);
		$this->tpl->assign("nbenregistrementsParPage",$nbEnregistrementsParPage);

		$listeTemoignages = Temoignage::liste();

		$this->tpl->assign("listeTemoignages",Temoignage::liste($pageCourante, 10));
		if(isset($this->session->user->numEmprunteur))
			$this->tpl->assign("isTemoignageDejaRedige",Temoignage::isTemoignageDejaRedigee($this->session->user->numEmprunteur));
	}

	public function action_ajouter(){
		if(Temoignage::isTemoignageDejaRedigee($this->session->user->numEmprunteur)) {
			$this->site->redirect('gestemoignage', 'modifier');
		} else {
			$this->set_title("Ajouter un nouveau témoignage | Jim's book corner library");

			$f=new Form("?module=gestemoignage&action=valide","form1");
			$f->add_textarea(
	            "temoignage",
	            "temoignage",
	            "Votre témoignage",
	            true
	        );

			$f->add_submit("sub","sub")->set_value('Ajouter mon témoignage','actions','btn btn-primary');

			$this->tpl->assign("form",$f);
			$this->session->form = $f;
		}
	}

	public function action_valide(){

		$this->set_title("Ajouter un nouveau témoignage | Jim's book corner library");

		$form=$this->session->form;

		//Si l'utilisateur essaie de passer la validation directement
		//en tapant l'URL, on le redirige vers l'action index ;)
		if($_REQUEST['sub'] != 'Ajouter mon témoignage')
			$this->site->redirect('gestemoignage');

		if($form->validate())
		{
			$nouveauTemoignage = new Temoignage(
				Outils::sanitize($this->req->temoignage),
				null,
				$this->session->user->numEmprunteur);

			$nouveauTemoignage->enregistrer();

			$this->site->ajouter_message('Le nouveau témoignage a été ajouté avec succès =)',4);
			$this->site->redirect('gestemoignage');
		}else{
			$this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
			$form->populate();
			$this->tpl->assign("form",$form);
		}
	}

	public function action_modifier(){
		$this->set_title("Modifier mon témoignage | Jim's book corner library");

		if(Temoignage::isTemoignageDejaRedigee($this->session->user->numEmprunteur)) {
			$temoignage = Temoignage::chercherParNumEmprunteur($this->session->user->numEmprunteur);
			$this->tpl->assign("temoignage",$temoignage);
			$this->session->numTemoignage = $temoignage->numTemoignage;

			$f=new Form("?module=gestemoignage&action=valide_modifier","form1");

			$f->add_textarea("temoignage", "temoignage", "Votre témoignage", true, null, null, Outils::unsanitize($temoignage->temoignage));

			$f->add_submit("sub","sub")->set_value('Modifier mon témoignage','actions','btn btn-primary');

			$this->tpl->assign("form",$f);

			$this->session->form = $f;
		} else {
			$this->site->redirect('gestemoignage', 'ajouter');
		}
	}

	public function action_valide_modifier(){
		$this->set_title("Modifier mon témoignage | Jim's book corner library");

		$form=$this->session->form;

		//Si l'utilisateur essaie de passer la validation directement
		//en tapant l'URL, on le redirige ;)
		if($this->req->sub != 'Modifier mon témoignage')
			$this->site->redirect('gestemoignage', 'modifier');

		if($form->validate()){

			$temoignage = new Temoignage(
				Outils::sanitize($this->req->temoignage),
				null,
			    $this->session->user->numEmprunteur,
			    $this->session->numTemoignage
			);

			$temoignage->enregistrer();

			$this->site->ajouter_message('Votre témoignage a été correctement modifié',4);
			$this->site->redirect('gestemoignage');
		}else{
			$this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
			$form->populate();
			$this->tpl->assign("form",$form);
		}
	}

	public function action_supprimer(){
		$temoignageASupprimer = Temoignage::chercherParNumEmprunteur($this->session->user->numEmprunteur);
		if(empty($temoignageASupprimer->numTemoignage)){
			$this->site->redirect('gestemoignage','mescritiques');
		}

		$temoignageASupprimer->supprimer();
		$this->site->ajouter_message('Témoignage correctement supprimée',4);
		$this->site->redirect('gestemoignage');
	}

	public function action_supprimer_gestionnaire(){
		$temoignageASupprimer = Temoignage::chercherParId($_REQUEST['id']);
		if(empty($temoignageASupprimer->numTemoignage)){
			$this->site->redirect('gestemoignage');
		}

		$temoignageASupprimer->supprimer();
		$this->site->ajouter_message('Témoignage correctement supprimée',4);
		$this->site->redirect('gestemoignage');
	}
}

?>
<?php

class gestsettings extends Module{

    public function action_index(){
		$this->set_title("Modifier les paramètres | Jim's book corner library");

        $f=new Form("?module=gestsettings&action=valide","form1");
		$f->add_textarea(
            "msgEmailDemande",
            "msgEmailDemande",
            "Texte de l'email de confirmation de demande",
            true,
            null,
            null,
            Outils::unsanitize(Settings::chercherParCleSetting('msgEmailDemande')->valSetting)
        );

    	$f->add_textarea(
            "msgEmailReservation",
            "msgEmailReservation",
            "Texte de l'email de confirmation de réservation",
            true,
            null,
            null,
            Outils::unsanitize(Settings::chercherParCleSetting('msgEmailReservation')->valSetting)
        );

    	$f->add_textarea(
            "msgEmailReservationDispo",
            "msgEmailReservationDispo",
            "Texte de l'email de réservation disponible",
            true,
            null,
            null,
            Outils::unsanitize(Settings::chercherParCleSetting('msgEmailReservationDispo')->valSetting)
        );

        $f->add_submit("sub","sub")->set_value('Enregistrer les paramètres','actions','btn btn-primary');

        $this->tpl->assign("form",$f);
        $this->session->form = $f;
	}

	public function action_valide(){
		$form=$this->session->form;

		//Si l'utilisateur essaie de passer la validation directement
		//en tapant l'URL, on le redirige vers l'action index ;)
		if($this->req->sub != 'Enregistrer les paramètres')
			$this->site->redirect('gestsettings');

		$setting = new Settings(
		    'msgEmailDemande',
		    Outils::sanitize($this->req->msgEmailDemande)
		);

		$setting->enregistrer();

		$setting1 = new Settings(
		    'msgEmailReservation',
		    Outils::sanitize($this->req->msgEmailReservation)
		);

		$setting1->enregistrer();

		$setting2 = new Settings(
		    'msgEmailReservationDispo',
		    Outils::sanitize($this->req->msgEmailReservationDispo)
		);

		$setting2->enregistrer();

		$setting3 = new Settings(
		    'adresseGmail',
		    Outils::sanitize($this->req->adresseGmail)
		);

		$setting3->enregistrer();

		$setting4 = new Settings(
		    'mdpGmail',
		    Outils::sanitize($this->req->mdpGmail)
		);

		$setting4->enregistrer();

		$this->site->ajouter_message('Les paramètres ont été enregistrés.',4);
		$this->site->redirect('gestsettings');
	}

}
?>

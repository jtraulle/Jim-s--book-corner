<?php

class gestcritique extends Module{

    public function action_rediger_critique(){
        $this->set_title("Rédiger une critique | Jim's book corner library");
        
        if(Critique::isCritiqueDejaRedigee($this->session->user->numEmprunteur, $_REQUEST['idlivre'])) {
            $this->site->redirect('gestcritique', 'modifier_critique&idlivre='.$_REQUEST['idlivre']);
        } else {            
            if(Livre::isOuvrageEmprunte($this->session->user->numEmprunteur, $_REQUEST['idlivre'])){            
                $l = Livre::chercherParId($_REQUEST['idlivre']);
                $this->tpl->assign("livre",$l);
                $this->session->numLivre = $l->numLivre;

                $f=new Form("?module=gestcritique&action=ajouter_critique","form1");        

                $f->add_select("noteLivre","noteLivre","Votre note",array("1" => "Je n'ai pas du tout aimé","2" => "J'ai aimé un peu","3" => "J'ai aimé beaucoup","4" => "J'ai adoré","5" => "Je trouve que c'est un chef d'oeuvre !"))->set_value(3,'rating');

                $f->add_textarea(
                    "critiqueLivre",
                    "critiqueLivre",
                    "Votre critique",
                    true
                );

                $f->add_submit("sub","sub")->set_value('Ajouter ma critique','actions','btn primary');

                $this->tpl->assign("form",$f);

                $this->session->form = $f;
            } else {
                $this->site->ajouter_message('Vous ne pouvez pas rédiger de critique sur ce livre car vous ne l\'avez jamais emprunté',1);
                $this->site->redirect('gestemprunteur', 'moncompte');
            }
        }
    }
    
    public function action_voir(){
        $this->set_title("Consulter les critiques | Jim's book corner library");
        
        $livreAConsulter = Livre::chercherParId($_REQUEST['id']);
        if(empty($livreAConsulter->numLivre)){
            $this->site->ajouter_message('Impossible de consulter ce livre, il est inexistant !',1);
            $this->site->redirect('gestlivre','index');
        }
        
        $this->tpl->assign("livre",$livreAConsulter);

        $nbEnregistrementsParPage = 10;
        $totalPages = Outils::nbPagesTotales("critiquer WHERE numLivre=".$_GET['id'],$nbEnregistrementsParPage);

        if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPages){
                $pageCourante = $_GET['page'];
        }else{
                $pageCourante = 1;
        }

        $this->tpl->assign("totalPages",$totalPages);
        $this->tpl->assign("pageCourante",$pageCourante);
        $this->tpl->assign("nbenregistrementsParPage",$nbEnregistrementsParPage);

        $listeCritique = Critique::liste($_GET['id'],$pageCourante,10);
        if(isset($listeCritique)){
            $this->tpl->assign("critiques",$listeCritique);
        } else {
            $this->site->ajouter_message('Aucune critique n\'a encore été rédigée pour ce livre ;)',1);
            $this->site->redirect('gestlivre', 'voir&id='.$_GET['id']);
        }     
    }

    public function action_ajouter_critique(){
        $this->set_title("Rédiger une critique | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige ;)
        if($this->req->sub != 'Ajouter ma critique')
            $this->site->redirect('gestemprunteur', 'moncompte');

        if($form->validate()){

            $critique = new Critique(
                $this->session->user->numEmprunteur,
                $this->session->numLivre,
                $this->req->noteLivre,
                $this->req->critiqueLivre
            );

            $critique->ajouterCritique();

            $this->site->ajouter_message('Critique correctement enregistrée',4);
            $this->site->redirect('gestlivre','index');
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
    }
    
    public function action_modifier_critique(){
        $this->set_title("Modifier une critique | Jim's book corner library");
        
        if(Critique::isCritiqueDejaRedigee($this->session->user->numEmprunteur, $_REQUEST['idlivre'])) {        
            $l = Livre::chercherParId($_REQUEST['idlivre']);
            $critique = Critique::chercherParId($this->session->user->numEmprunteur, $_REQUEST['idlivre']);
            $this->tpl->assign("livre",$l);
            $this->session->numLivre = $l->numLivre;

            $f=new Form("?module=gestcritique&action=valide_modifier_critique","form1");        

            $f->add_select("noteLivre","noteLivre","Votre note",array("1" => "Je n'ai pas du tout aimé","2" => "J'ai aimé un peu","3" => "J'ai aimé beaucoup","4" => "J'ai adoré","5" => "Je trouve que c'est un chef d'oeuvre !"))->set_value($critique->noteCritique,'rating');

            $f->add_textarea("critiqueLivre", "critiqueLivre", "Votre critique", true, null, null, $critique->commentaireCritique);

            $f->add_submit("sub","sub")->set_value('Modifier ma critique','actions','btn primary');

            $this->tpl->assign("form",$f);

            $this->session->form = $f;
        } else {
            $this->site->redirect('gestcritique', 'ajouter_critique&idlivre='.$_REQUEST['idlivre']);
        }
    }

    public function action_valide_modifier_critique(){
        $this->set_title("Modifier une critique | Jim's book corner library");
        
        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige ;)
        if($this->req->sub != 'Modifier ma critique')
            $this->site->redirect('gestemprunteur', 'moncompte');

        if($form->validate()){

            $critique = new Critique(
                $this->session->user->numEmprunteur,
                $this->session->numLivre,
                $this->req->noteLivre,
                $this->req->critiqueLivre
            );

            $critique->modifierCritique();

            $this->site->ajouter_message('Critique correctement enregistrée',4);
            $this->site->redirect('gestlivre','index');
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
    }
    
}

?>

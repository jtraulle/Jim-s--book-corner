<?php

class settings extends Module{
    
    public function action_index(){
		$this->set_title("Modifier les paramètres | Jim's book corner library");
        
        $f=new Form("?module=settings&action=valide","form1");
        $f->add_textarea(
            "emailText",
            "emailText",
            "Texte de l'email de confirmation de demande",
            true
        );
       
        $f->add_submit("sub","sub")->set_value('Enregistrer les paramètres','actions','btn btn-primary');

        $this->tpl->assign("form",$f);
        $this->session->form = $f;
	}
    
}
?>

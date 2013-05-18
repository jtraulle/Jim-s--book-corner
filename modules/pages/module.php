<?php
class pages extends Module{
   
    public function action_credits(){
		$this->set_title("Crédits | Jim's book corner library");
	}
	
	public function action_video(){
		$this->set_title("Vidéo de présentation | Jim's book corner library");
	}

	public function action_lettre(){
		$this->set_title("A propos de Jim et Christiane McCrate | Jim's book corner library");
	}

	public function action_lettre_manuscrite(){
		$this->set_title("A propos de Jim et Christiane McCrate | Jim's book corner library");
	}
    
    public function action_infospratiques(){
		$this->set_title("Informations pratiques | Jim's book corner library");
	}
	
	public function action_inauguration(){
		$this->set_title("Inauguration | Jim's book corner library");
	}

	public function action_presse(){
		$this->set_title("Presse | Jim's book corner library");
	}

    public function action_donateurs(){
        $donnateurs = Emprunteur::listeDonateurs();
        $this->set_title("Donateurs | Jim's book corner library");
        $this->tpl->assign("donateurs",$donnateurs);
    }
}
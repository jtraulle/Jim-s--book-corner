<?php
class Index extends Module{

	public function action_index(){

        $this->set_title("Bienvenue | Jim's book corner library");
        $this->tpl->assign("listeLivres",Livre::cinqDerniersLivres());
        $this->tpl->assign("dernierEvenement",Evenement::dernierEvenement());
	}
	
	public function action_recalculsha(){
		
        $raw = json_decode(file_get_contents('https://api.github.com/repos/jtraulle/Jim-s--book-corner/commits'));
        $lastrevid = substr($raw[0]->sha, 0, 10) ;
        $handle = fopen("templates/lastrevid.tpl", "w+");
        fwrite($handle, $lastrevid);
        
        
        $this->site->ajouter_message('Le hash de commit a été correctement mis à jour ;)', 4);
        $this->site->redirect('index');
        
	}

}
?>
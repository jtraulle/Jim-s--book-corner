<?php
class Index extends Module{

	public function action_index(){

        $this->set_title("Bienvenue | Jim's book corner library");
        $this->tpl->assign("listeLivres",Livre::cinqDerniersLivres());
        $this->tpl->assign("dernierEvenement",Evenement::dernierEvenement());
	}
	
	public function action_recalculsha(){
		
        
        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/repos/jtraulle/Jim-s--book-corner/commits');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
		$lastrevid = json_decode(curl_exec($ch));
		$lastrevid = substr($lastrevid[0]->sha, 0, 10) ;
		curl_close($ch);
        
        $handle = fopen("templates/lastrevid.tpl", "w+");
        fwrite($handle, $lastrevid);
        
        $this->site->ajouter_message('Le hash de commit a été correctement mis à jour ;)', 4);
        $this->site->redirect('index');
        
	}

}
?>
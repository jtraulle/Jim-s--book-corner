<?php
class Index extends Module{

	public function action_index(){

        $this->set_title("Bienvenue | Jim's book corner library");
        $this->tpl->assign("listeLivres",Livre::cinqDerniersLivres());
        $this->tpl->assign("dernierEvenement",Evenement::dernierEvenement());
	}

}
?>
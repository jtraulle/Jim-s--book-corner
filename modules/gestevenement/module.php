<?php

class gestevenement extends Module{
	
	public function action_index(){
        $this->set_title("Événements | Jim's book corner library");

        $nbEnregistrementsParPage = 10;
		$totalPages = Outils::nbPagesTotales('livre',$nbEnregistrementsParPage);

		if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPages){
			$pageCourante = $_GET['page'];
		}else{
			$pageCourante = 1;
		}

		$this->tpl->assign("totalPages",$totalPages);
		$this->tpl->assign("pageCourante",$pageCourante);
		$this->tpl->assign("nbenregistrementsParPage",$nbEnregistrementsParPage);

		$listeEvenements = Evenement::liste();
      
		$this->tpl->assign("listeEvenements",Evenement::liste($pageCourante, 10));
    }
}

?>
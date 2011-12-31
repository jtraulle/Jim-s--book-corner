<?php
class exampledata extends Module{

	public function action_importemprunteurs(){
        $fichier = file_get_contents('lib/examples/emprunteurs.sql');
        $db = DB::get_instance();
        $db->exec($fichier);
        $this->site->ajouter_message('Les données d\'exemple pour le module "Emprunteur" ont été importées avec succès.',4);
        $this->site->redirect('gestemprunteur','index');
	}

}
?>

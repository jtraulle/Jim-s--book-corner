<?php


class ex4 extends Module{

	public function	action_index(){

		//génère du contenu
		//et l'envoie sous forme de fichier
		header("Content-type: text/plain");
		header('Content-Disposition: attachment; filename="exemple.txt"');
		echo "test";
		exit;

		
	}
	
	
	
}
?>

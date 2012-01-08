<?php
/**
* OMGL3
* Class Module : classe de base pour les modules de l'application
*
* initialis par le front controller avec les donnes suivantes
* db 		= SGBD de l'application
* tpl		= moteur de template
* session	= gestionnaire session
* req		= requete HTTP actuelle
*
*
*/

class Module{

	//nom par dfaut du template  charger
	protected $tpl_name="";

	public function init(){ 

		if($this->session->ouverte()){

			if(isset($this->session->user->identifiantEmprunteur))
				$this->tpl->assign('login',$this->session->user->identifiantEmprunteur);
			if(isset($this->session->user->pseudoGestionnaire))
				$this->tpl->assign('login',$this->session->user->pseudoGestionnaire);
			if(isset($this->session->user->statut))
				$this->tpl->assign('statut',$this->session->user->statut);
		}
			
		
	}
	
	//variables de config du site
	public function set_variables($config){
		foreach($config as $var=>$val)
			$this->$var=$val;
	}
	
	//titre de la page du module
	public function set_title($title){
		$this->tpl->assign('titre',$title);	
	}

	//get : nom du template  charger
	public function get_tpl_name(){
		return empty($this->tpl_name) ? get_class($this) : $this->tpl_name;	
	}
	//set : nom du template  charger
	public function set_tpl_name($tpl){
		$this->tpl_name=$tpl;	
	}		
}
?>
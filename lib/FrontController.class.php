<?php
/**
* OMGL3
* Class FrontController : chargeur/exécuteur de modules
*
*/
Class FrontController{

	public static $_content_="";

	public function __construct($config){
		foreach($config as $var=>$val)
			$this->$var=$val;
		$this->config=$config;
		
	}

	public function load_content(){

		//vérifie si un paramètre de module est passé, sinon : défaut
		$module= ( $this->req->module != '' ) ? $this->req->module : 'index';	
		//vérifie si une action est requise, sinon : index
		$action= ( $this->req->action != '')   ? $this->req->action : 'index';	

		$this->tpl->assign('titre','Jim\'s book corner library');
		$this->tpl->assign('module',$module);
		$this->tpl->assign('action',$action);

		//inclue le module en question
		if(!class_exists($module))
			if(file_exists("modules/$module/module.php"))
				require("modules/$module/module.php");
			else
				throw new Exception("Module inconnu : $module");

		$m=new $module();
		//nom du template à appeler, par défaut
		$m->set_tpl_name("$module"."-$action");
		//nom de la fonction à appeler
		$action="action_$action";
		//variables outils
		$m->set_variables($this->config);
		$m->init();

		if(method_exists($module,$action)){
			//Si le statut de l'utilisateur est différent de gestionnaire 
			//ou qu'il n'existe pas (invité) ET que cet utilisateur cherche 
			//à accéder aux fonctions action_modifier, action_supprimer, etc.
			//on lui en interdit l'accès en levant une exception ! 
			if((!isset($this->session->user->statut) OR $this->session->user->statut != 'gestionnaire') && 
			($action == 'action_modifier' OR $action == 'action_supprimer' OR $action == 'action_ajouter'))
				throw new Exception("Vous n'avez pas l'autorisation d'accéder à cette page ou votre session a expiré.");
			else //sinon on exécute l'action demandée.
				$m->$action();
		}		
		else
			throw new Exception("Action inconnue : $module::$action");

		$res=$this->tpl->fetch($m->get_tpl_name().".tpl");
		$this->tpl->assign('bloc_contenu',$res);
		$this->tpl->assign('messages',$this->site->liste_messages());
	}	
}

?>
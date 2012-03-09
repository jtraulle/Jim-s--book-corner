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
                $chemin = preg_replace("/(&page=[0-9]*)/", "", $_SERVER['QUERY_STRING']);
                $this->tpl->assign('chemin',$chemin);

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

		//Ce tableau permet de définir les permissions d'accès pour les invités
		$allowGuest = array(
			'index' => array(
				'action_index'
			),
			'gestlivre' => array(
				'action_index',
				'action_voir'
			),
			'inscription' => array(
				'action_index',
				'action_valide'
			),
			'gestauteur' => array(
				'action_index',
				'action_voir'
			),
			'gestemprunteur' => array(
				'action_connect',
				'action_valide_connect'
			),
			'gestgestionnaire' => array(
				'action_connect',
				'action_valide_connect'
			),
			'gestevenement' => array(
				'action_index'
			),
                        'gestcritique' => array(
                                'action_voir'
                        ),
			'pages' => array(
				'action_credits',
				'action_lettre',
				'action_lettre_manuscrite'
			)
		);

		//Ce tableau permet de définir les permissions d'accès pour les membres enregistrés
		$allowRegistered = array(
			'gestemprunteur' => array(
				'action_moncompte',
				'action_deco',
				'action_modifier_pass',
				'action_valide_modifier_pass',
				'action_modifier_identifiant',
				'action_valide_modifier_identifiant'
			),
			'gestcritique' => array(
				'action_rediger_critique',
				'action_ajouter_critique',
                                'action_modifier_critique',
                                'action_valide_modifier_critique'
			),
			'gestemprunt' => array(
				'action_demande_pret'
			),
			'gestreservation' => array(
				'action_reserver'
			)
		);

		$permissionGuest = null;
		$permissionRegistered = null;

		foreach($allowGuest as $moduleAautoriser => $actions){
			foreach($actions as $actionAautoriser){
				if($module==$moduleAautoriser && $action==$actionAautoriser)
					$permissionGuest = true;
			}
		}

		foreach($allowRegistered as $moduleAautoriser => $actions){
			foreach($actions as $actionAautoriser){
				if($module==$moduleAautoriser && $action==$actionAautoriser)
					$permissionRegistered = true;
			}
		}

		if(method_exists($module,$action)){
			if((!isset($this->session->user->statut)) && $permissionGuest)
				$m->$action();
			elseif ($this->session->user->statut == 'emprunteur' && ($permissionGuest OR $permissionRegistered))
				$m->$action();
			elseif ($this->session->user->statut == 'gestionnaire')
				$m->$action();
			else
				throw new Exception("Vous n'avez pas l'autorisation d'accéder à cette page ou votre session a expiré.");
		}		
		else
			throw new Exception("Action inconnue : $module::$action");

		$res=$this->tpl->fetch($m->get_tpl_name().".tpl");
		$this->tpl->assign('bloc_contenu',$res);
		$this->tpl->assign('messages',$this->site->liste_messages());
	}	
}

?>
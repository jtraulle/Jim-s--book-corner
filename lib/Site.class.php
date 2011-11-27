<?php
/**
* OMGL3
* Class Site : outils
*
*/
  
define("ALERTE",1);
define("ERREUR",2);
define("OK",4);
define("INFO",8);
 	
class Site{

	private static $inst;

	private function __construct($session){
		$this->session=$session;		
	}
	

	//envoie un header de redirection au navigateur
	//et quitte le script
	function redirect($module='index',$action='index'){
		header("Location: ?module=$module&action=$action");
		exit();
	}

	public static function get_instance($config){
			if (self::$inst==NULL)
				self::$inst = new Site($config);
			return self::$inst;
	}


	/**
	* retourne les éventuels messages d'infos stockés
	* et les supprime
	*/
	function liste_messages(){
		if(!$this->session->_messages)
			return NULL;

		$str="";
		foreach($this->session->_messages as $message=>$type)
		
			$str.=$this->format($message,$type);
		
		$this->effacer_messages();
		return $str;
	}
	 
	 
	/**
	* 
	*/
	function ajouter_message($message,$type=INFO){
		//pas possibilité d'affecter directement une donnée de tableau à une variable accédée avec __get
		$temp=$this->session->_messages;
		$temp[$message]=$type;
		$this->session->_messages=$temp;
	}
	 
	/**
	* 
	*/
	function effacer_messages(){
		unset($this->session->_messages);
	}


				 
	/**
	* affiche un message utilisateur dans la zone de message
	*
	* $message : message affiché
	* $type : type du message (défaut INFO)
	*/
	function format($message, $type=INFO){
	 
		switch($type){
			case INFO: 
				$class='alert-message info';
			break;
			case ERREUR: 
				$class='alert-message error';
				$message="<b>$message</b><pre>\n".self::trace(debug_backtrace())."</pre>";
			break;
			case OK: 
				$class='alert-message success';
			break;
			case ALERTE: 
				$class='alert-message warning';
				$message="<strong>Attention !</strong> $message";
			break;
			default:
				$class='alert-message info';
		}
	 
		return <<< ENDOFMESSAGE
	 
			<div class='$class'>
				$message
			</div>
		 
ENDOFMESSAGE;
		}
		 
		/**
		* affiche un message de debug, avec la trace d'exécution
		*
		* $message : chaine, tableau, etc...
		*/
		function debug($message){
			return "<pre class='debug'>"
					."<b>"
					.print_r($message,true)
					."</b>\n"
					.$this->trace(debug_backtrace())
					."</pre>";
		}

		
		/**
		* affiche la trace d'exécution courante
		*
		* $backtrace : retour d'un debug_backtrace lors de l'appel à debug
		* si NULL, inclus l'appel de debug dans la trace d'exécution
		*/
		function trace($backtrace){
		 
			$chaine='';
			if($backtrace)
				$trace=array_reverse($backtrace);
			else
				$trace=array_reverse(debug_backtrace());
			$fonction=NULL;
			$decalage='';
			foreach($trace as $appel){
		 
				$chaine.= $decalage.$appel['file'].', ligne '.$appel['line'];
				if($fonction){
					$chaine.=" : $fonction()\n";
					$decalage="  ".$decalage;
				}else{
					$decalage="  +--";
					$chaine.= "\n";
				}
		 
				$fonction=$appel['function'];
		 
			}
			return $chaine;
		}
}
?>
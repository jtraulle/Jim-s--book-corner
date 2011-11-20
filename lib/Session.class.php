<?php
session_set_cookie_params("0",dirname($_SERVER["SCRIPT_NAME"]));
session_start();
 
class Session{
 
	public $user;
	private static $instance;
 
 	function __construct(){
 		$this->restaurer();	
 	}
 	
 	public static function get_instance(){
 		if(!self::$instance)
 			self::$instance =  new Session();
 		return self::$instance;
 	}
  
	function ouvrir($user){
		$_SESSION["__user"]=$user;
		$this->restaurer();
	}
		
	function fermer(){
		unset($_SESSION["__user"]);
	}

	function ouverte(){
		return isset($_SESSION["__user"]);
	}


	function restaurer(){
		if($this->ouverte()){
			$this->user=$_SESSION["__user"];
			
		}
	}
	function __toString(){
		return (self::$user->login);
	}
	
	
	//stocke une variable de session
	function __get($variable){
		if(!empty($_SESSION['__variables'][$variable]))
			return  $_SESSION['__variables'][$variable];
		else
			return "";
	}

	function __set($variable,$valeur){
			$_SESSION['__variables'][$variable]=$valeur;
	}

	function __unset($variable){
			unset($_SESSION['__variables'][$variable]);
	}

	
}
?>
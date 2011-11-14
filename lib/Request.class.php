<?php
/**
* OMGL3
* Class Request : interface SGBD
*
*/
class Request{
	
	private static $inst;
	
 	//récupère un paramètre de la requete GET	
	public function get($name){
		return isset ( $_GET[$name]) ? $_GET[$name] : "";
	}

	//récupère un paramètre de la requete POST
	public function post($name){
		return isset($_POST[$name])?$_POST[$name]:"";
	}

	public static function get_instance(){
			if (self::$inst==NULL)
				self::$inst=new Request;
			return self::$inst;
	}
	
	
	public function __get($name){
		return isset ($_REQUEST[$name]) ? $_REQUEST[$name] : '' ;
	}
	
}
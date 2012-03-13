<?php

if(!file_exists('lib/Params.ini.php'))
	header('Location: install/introInstall.html');

header('Content-type:text/html; charset=utf-8');
ini_set('display_errors',1);

//gestionnaire d'exception
set_exception_handler('exc');
set_error_handler('erreur');
//register_shutdown_function('shutdown');
$debugs = array();
ob_start();

//paramètres et chargeur de classes
require_once("lib/Params.ini.php");
require_once("lib/Autoload.php");

//classes outils----------------------------------------------------------

//moteur de template
require_once('lib/Smarty-3.1.1/libs/Smarty.class.php');
$tpl = new Smarty();
$tpl->template_dir = 'templates/';
$tpl->compile_dir = 'lib/tpl/templates_c/';
$tpl->config_dir = 'lib/tpl/configs/';
$tpl->cache_dir = 'lib/tpl/cache/';

//Session
$session=Session::get_instance();

//toolbox Site
$site=Site::get_instance($session);

//Base de données
$db=DB::get_instance();

//Requete
$request=Request::get_instance();

$config=array('db'=>$db,'tpl'=>$tpl,'session'=>$session,'req'=>$request,'site'=>$site);

//moteur du site
$moteur=new FrontController($config);
$moteur->load_content($tpl);

//récupère les affichages "parasites" (echo, print, var_dump...)
$echx = ob_get_clean();

if(Outils::getVersionBDD() != 2.0)
    throw new Exception('<p>La structure de la base de données n\'est pas à jour ! Effectuez la mise à jour vers la dernière version à partir du fichier structure.sql</p>');

//affiche le template
$tpl->display('main.tpl');


//--------------------------------------------------------------------------------------------
//Gestion d'erreurs
//--------------------------------------------------------------------------------------------

if(!empty($debugs) OR !empty($echx)){

	echo'<div class="container"><div class="row"><div class="span16">';

	if(!empty($debugs))
	{
		//affichage des erreurs résiduelles
		echo "<div class='alert-message error'><h5>Erreurs d'exécution</h5>";
		foreach($debugs as $d)
			echo "<div>$d</div>";
		echo "</div>";
	}

	if(!empty($echx))
	{
		//affichages parasites
		echo "<div class='alert-message'><h5>Informations d'exécution</h5>";
			echo  $echx;
		echo "</div>";
	}

	echo "</div></div></div>";
}

//gestionnaire d'exceptions
function exc($exc){
	global $tpl;
	ob_end_flush();
	$tpl->assign('message',$exc->getMessage());
	$tpl->display('erreur.tpl');
}
//gestionnaire d'erreurs
function erreur($errno, $errstr, $errfile, $errline){
	global $debugs;
	$debugs[]= "<b>$errfile</b>:$errline $errstr";
}
?>
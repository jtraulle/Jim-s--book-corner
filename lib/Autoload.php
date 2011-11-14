<?php
/*
* Chargeur de classes
*/
function __autoload_my_classes($name) {
    if(file_exists(CLASSES . "/$name.class.php"))
    	require_once( CLASSES . "/$name.class.php");
    else if(file_exists("lib/$name.class.php"))
    	require_once("lib/$name.class.php");
}

spl_autoload_register('__autoload_my_classes');

?>
<?php
class Table {
	
	public function __construct($config=array()){
		foreach($config as $var=>$val)
			$this->$var=$val;		
	}
			
}

?>
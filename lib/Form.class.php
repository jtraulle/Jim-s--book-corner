<?php
/**
* OMGL3
* Class Form : Formulaire HTML
* Gère les champs, le pré-remplissage, la génération HTML
*/
class Form{

	protected $fields;
	protected $action='?';
	protected $method='POST';
        protected $erreurs;

        public function __construct($action,$id){
		$this->id=$id;
		$this->action=$action;
	} 

	function add_select($name,$id,$label,$options=array()){
		$s = new HTMLInput(SELECT,$name,$id,$label,$options);
		$this->fields[][$name]=$s;
		return $s;		
	}
        
        function add_legend($name,$value){
                $s = new HTMLInput(LEGEND,$name);
                $s->set_value($value);
                $this->fields[][$name]=$s;
		return $s;		
	}
        
        function add_endfieldset($name){
                $s = new HTMLInput(FINFIELDSET,$name);
                $this->fields[][$name]=$s;
		return $s;		
	}

	function add_text($name,$id,$label='',$required=false,$rule='',$message=''){
		$s = new HTMLInput(TEXT,$name,$id,$label,null,$required,$rule,$message);
		$this->fields[][$name]=$s;
		return $s;		
	}

	function add_password($name,$id,$label){
		$s = new HTMLInput(PASSWORD,$name,$id,$label);
		$this->fields[][$name]=$s;
		return $s;		
	}

	function add_submit($name,$id,$label=''){
		$s =  new HTMLInput(SUBMIT,$name,$id,$label);
		$this->fields[][$name]=$s;
		return $s;		
	}

	function add_checkbox($name,$id,$label='&nbsp;',$checked=FALSE){
		$s =  new HTMLInput(CHECK,$name,$id,$label);
		$s->check($checked);
		$this->fields[][$name]=$s;
		return $s;		
	}

	function add_radio($name,$id,$label='&nbsp;',$checked=FALSE){
		$s =  new HTMLInput(RADIO,$name,$id,$label);
		$s->check($checked);
		$this->fields[][$name]=$s;
		return $s;		
	}


	//remplissage des champs avec les valeurs issues de _REQUEST
	function populate(){
		echo "<h6>$"."_REQUEST"."</h6><pre>";
		print_r($_REQUEST);
		echo "</pre>";

		echo "<h6>$"."this->fields"."</h6><pre>";
		print_r($this->fields);
		echo "</pre>";

		foreach($this->fields as $k=>$arr){
			$k=key($arr);
			$f=current($arr);

			if(isset($_REQUEST[$k])){
				//echo "<li>$k = ".$_REQUEST[$k]."</li>";
				if($f->type==RADIO){
					if($f->value == $_REQUEST[$k])
						$f->check();
					else
						$f->check(false);
				}
				elseif($f->type==CHECK)
						$f->check();
				else{
					$f->set_value($_REQUEST[$k]) ;
				}
			}
			else
				$f->check(FALSE);
		}
	}
        
        function validate(){
            $this->erreurs = 0;
            foreach($this->fields as $k=>$arr){
                $k=key($arr);
                $f=current($arr);

                if(isset($_REQUEST[$k])){
                    switch ($f->rule) {
                        case "alphaNumAccentue":
                            if (!preg_match('#^[a-zA-ZâêôûÄéÇàèÉÈÊùÌÍÎÏîÒÓÔÕÖÙÚÛÜàáâãäçèéêëìíîïñòóôõöùúûü ]{1,23}$#', $_REQUEST[$k])){
                                $f->value = $_REQUEST[$k];
                                $f->error = true;
                                $this->erreurs += 1;
                            } else { 
                                $f->value = $_REQUEST[$k];
                                $f->error = false;
                            }
                            break;
                        case "identifiant":
                            echo "On vérifie que c'est bien un identifiant";
                            break;
                        case 2:
                            echo "i égal 2";
                            break;
                    }
                }    
            }
            echo "<h1>Nombres d'erreurs du formulaire :".$this->erreurs."</h1>";
        }

	//génération HTML du formulaire
	function __toString(){
		
		$s="<form method='{$this->method}' action='{$this->action}'>";
		foreach($this->fields as $k=>$f){
			$s=$s.array_pop($f);
		}
		$s.="</form>";
					
		return $s;
	} 
}
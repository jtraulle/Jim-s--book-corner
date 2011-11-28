<?php
/**
* OMGL3
* Class HTMLInput : champ de saisie pour formulaire HTML
*
*/
define ("TEXT","text");
define ("TEXTAREA","textarea");
define ("PASSWORD","password");
define ("CHECK","checkbox");
define ("RADIO","radio");
define ("SELECT","select");					
define ("SUBMIT","submit");					

class HTMLInput{
		
	public $name;
	public $value;
	public $id;
	public $label;
	public $type;
	public $options;
	public $checked=false;
	public $selected="";
	public $required=false;           //Le champ est-il requis ?
        public $rule;                     //Définir une règle pour la validation
        public $message;                  //Message à afficher si la validation échoue
	public $error=false;
		
	public function __construct($type,$name='',$id='',$label='&nbsp;',$options=array(),$required=false,$rule='',$message=''){
		$this->type=$type;
		$this->name=$name;
		$this->id=$id;
		$this->label=$label;		
		$this->options=$options;
                $this->required = $required;
                $this->rule = $rule;
                $this->message = $message;
	}
	
	public function check($bool=TRUE){
		$this->checked= $bool;	
		return $this;
	}

	public function set_value($val){
		$this->value=htmlspecialchars($val,ENT_QUOTES);
		return $this;
	}

	function __toString(){
		
		switch($this->type){
			case TEXT : return "<div class='clearfix'><label for='{$this->id}'>{$this->label}</label><div class='input'><input class='xlarge' type='text' value='{$this->value}' id='{$this->id}' name='{$this->id}' /></div></div>" ; break;
			case TEXTAREA :return "<label>{$this->label}</label><textarea id='{$this->id}' name='{$this->id}'>{$this->value}</textarea>" ; break;
			case PASSWORD : return "<div class='clearfix'><label for='{$this->id}'>{$this->label}</label><div class='input'><input class='xlarge' type='password' value='{$this->value}' id='{$this->id}' name='{$this->id}' /></div></div>" ; break;
			case CHECK : return "<label>{$this->label}</label><input type='checkbox' ".($this->checked?"checked='checked'":'')." value='{$this->value}' id='{$this->id}' name='{$this->name}' />" ; break;
			case RADIO : return "<label>{$this->label}</label>  <input type='radio' ".($this->checked?"checked='checked'":'')." value='{$this->value}' id='{$this->id}' name='{$this->name}' /><span>{$this->value}</span>" ; break;
			case SELECT : $s="<label>{$this->label}</label><select id='{$this->id}' name='{$this->id}'>";
				foreach($this->options as $k=>$v)
					$s.='<option '.($k===$this->value || $v===$this->value ? "selected='selected'":'').">$v</option>";
				$s.="</select>";
				return $s;
					
			
			break;
			case SUBMIT : return "<label>{$this->label}</label><input type='submit' value='{$this->value}' id='{$this->id}' name='{$this->id}' />" ; break;
			default: return "[CHAMP INCONNU]";			
			
			
		}
		return "[CHAMP INCONNU]";
	}
}
?>
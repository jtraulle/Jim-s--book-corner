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
define ("LEGEND","legend");
define ("FINFIELDSET","finfieldset");

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
    public $class='';
	public $class2='';

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

    public function set_value($val, $class=null, $class2=null){
        $this->value=htmlspecialchars($val,ENT_QUOTES);
        if(isset($class))
            $this->class=htmlspecialchars($class,ENT_QUOTES);
    	if(isset($class2))
    	    $this->class2=htmlspecialchars($class2,ENT_QUOTES);
		return $this;
    }

    function __toString(){

        switch($this->type){

            case TEXT:
                return "<div class='clearfix {$this->class}'><label for='{$this->id}'>{$this->label}</label><div class='input'><input class='{$this->class}' type='text' value='{$this->value}' id='{$this->id}' name='{$this->id}' /><span class='help-inline'>{$this->message}</span> </div></div>" ;
            break;

            case TEXTAREA:
                return "<div class='clearfix {$this->class}'><label for='{$this->id}'>{$this->label}</label><div class='input'><textarea id='{$this->id}' name='{$this->id}' class='xxlarge' rows='4'>{$this->value}</textarea><span class='help-inline'>{$this->message}</span> </div></div>" ;
            break;

            case LEGEND:
                return "<fieldset><legend>{$this->value}</legend>";
            break;

            case FINFIELDSET:
                return "</fieldset>";
            break;

            case PASSWORD:
                return "<div class='clearfix {$this->class}'><label for='{$this->id}'>{$this->label}</label><div class='input'><input type='password' value='{$this->value}' id='{$this->id}' name='{$this->id}' /><span class='help-inline'>{$this->message}</span> </div></div>" ;
            break;

            case CHECK:
                return "<div class='clearfix'><label for='{$this->id}'>{$this->label}</label><div class='input'><input type='checkbox' ".($this->checked?"checked='checked'":'')." value='{$this->value}' id='{$this->id}' name='{$this->name}' /></div></div>" ;
            break;

            case RADIO:
                return "<div class='clearfix'><label for='{$this->id}'>{$this->label}</label><div class='input'><input type='radio' ".($this->checked?"checked='checked'":'')." value='{$this->value}' id='{$this->id}' name='{$this->name}' /><span>{$this->value}</span></div></div>" ;
            break;

            case SELECT:
                $s="<div class='clearfix' style='display:inline-block; clear:none;'><label for='{$this->id}'>{$this->label}</label><div class='input'><select id='{$this->id}' name='{$this->id}'>";
                foreach($this->options as $k=>$v)
                $s.='<option value="'.$k.'" '.($k==$this->value || $v==$this->value ? "selected='selected'":'').">$v</option>";
                $s.="</select></div></div>";
                return $s;
            break;

            case SUBMIT:
                return "<div class='{$this->class}'><input type='submit' class='{$this->class2}' value='{$this->value}' id='{$this->id}' name='{$this->id}' /></div>" ;
            break;

            default:
                return "[CHAMP INCONNU]";
        }
        return "[CHAMP INCONNU]";
    }
}
?>

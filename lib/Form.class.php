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

    function add_text($name,$id,$label='',$required=false,$rule='',$message='',$value=''){
        $s = new HTMLInput(TEXT,$name,$id,$label,null,$required,$rule,$message);
        $s->set_value($value);
        $this->fields[][$name]=$s;

        return $s;
    }

    function add_password($name,$id,$label='',$required=false,$rule='',$message=''){
        $s = new HTMLInput(PASSWORD,$name,$id,$label,null,$required,$rule,$message);
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

        //echo "<h6>$"."this->fields"."</h6><pre>";
        //print_r($this->fields);
        //echo "</pre>";

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
                        if (!preg_match('#^[a-zA-Z\'âêôûÄéÇàèÉÈÊùÌÍÎÏîÒÓÔÕÖÙÚÛÜàáâãäçèéêëìíîïñòóôõöùúûü ]{1,23}$#', $_REQUEST[$k])){
                            $f->value = $_REQUEST[$k];
                            $f->class = "error";
                            $this->erreurs += 1;
                        } else {
                            $f->value = $_REQUEST[$k];
                            $f->class = "success";
                        }
                    break;

                    case "numeric":
                        if (!preg_match('#^[0-9]{1,4}$#', $_REQUEST[$k])){
                            $f->value = $_REQUEST[$k];
                            $f->class = "error";
                            $this->erreurs += 1;
                        } else {
                            $f->value = $_REQUEST[$k];
                            $f->class = "success";
                        }
                    break;

                    case "codepostal":
                        if (!preg_match('#^[0-9]{5}$#', $_REQUEST[$k])){
                            $f->value = $_REQUEST[$k];
                            $f->class = "error";
                            $this->erreurs += 1;
                        } else {
                            $f->value = $_REQUEST[$k];
                            $f->class = "success";
                        }
                    break;

                    case "identifiant":
                        if (!preg_match('#^[a-zA-Z0-9_]{6,}$#', $_REQUEST[$k])){
                            $f->value = $_REQUEST[$k];
                            $f->class = "error";
                            $this->erreurs += 1;
                        } else {
                            $f->value = $_REQUEST[$k];
                            $f->class = "success";
                        }
                    break;

                    case "motdepasse":
                        if (!preg_match('#^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,20}$#', $_REQUEST[$k])){
                            $f->value = $_REQUEST[$k];
                            $f->class = "error";
                            $this->erreurs += 1;
                        } else {
                            $f->value = $_REQUEST[$k];
                            $f->class = "success";
                        }
                    break;

                    case "telfixe":
                        if (!preg_match('#^0[1-589][0-9]{8}$#', $_REQUEST[$k])){
                            $f->value = $_REQUEST[$k];
                            $f->class = "error";
                            $this->erreurs += 1;
                        } else {
                            $f->value = $_REQUEST[$k];
                            $f->class = "success";
                        }
                    break;

                    case "telportable":
                        if (!preg_match('#^0[6-7][0-9]{8}$#', $_REQUEST[$k])){
                            $f->value = $_REQUEST[$k];
                            $f->class = "error";
                            $this->erreurs += 1;
                        } else {
                            $f->value = $_REQUEST[$k];
                            $f->class = "success";
                        }
                    break;

                    case "email":
                        if (!filter_var($_REQUEST[$k],FILTER_VALIDATE_EMAIL)){
                            $f->value = $_REQUEST[$k];
                            $f->class = "error";
                            $this->erreurs += 1;
                        } else {
                            $f->value = $_REQUEST[$k];
                            $f->class = "success";
                        }
                    break;
                }
            }
        }
        if($this->erreurs != 0)
            return false;
        else
            return true;
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

<?php
class ex3 extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("IND/IND");		
		$f=new Form("?module=ex3&action=valide","form1");
		$f->add_text("text1","text1","ChampText");		
		$f->add_checkbox("chek1","ck1","ChampBox")->set_value("on");		
		$f->add_radio("rad1","r1","ChampRad")->set_value("on");		
		$f->add_radio("rad1","r2")->set_value("tw");		
		$f->add_radio("rad1","r3")->set_value("tre");		
		$f->add_select("choix","choix","ChampSel",array("Un","Deux","Trois"))->set_value("Deux");		
		$f->add_submit("Valider","sub")->set_value('Valider');		

		$this->tpl->assign("form",$f);	
		$this->session->form = $f;		
		
	}

	public function action_valide(){

		$this->set_title("IND/VAL");

		if($this->req->text1 != 'ok'){
			$this->site->ajouter_message('il faut taper ok dans la zone de texte');			
			$form=$this->session->form;
			$form->populate();
			$this->tpl->assign("form",$form);
		}
		else{
			$this->site->ajouter_message('tout s\'est bien passé dans le formulaire précédent');			
			$this->site->redirect('index');
		}
			



	}




}
?>
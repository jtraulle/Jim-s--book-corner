<?php /* Smarty version Smarty-3.1.1, created on 2011-11-14 10:47:57
         compiled from "templates\erreur.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93744ec0cc3ea6bd04-08222183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdd211a162f6574be7b02e819d20d9c79bf073fb' => 
    array (
      0 => 'templates\\erreur.tpl',
      1 => 1321267674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93744ec0cc3ea6bd04-08222183',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_4ec0cc3eb8535',
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ec0cc3eb8535')) {function content_4ec0cc3eb8535($_smarty_tpl) {?><div class='echo' style='background: #ffcc00;
	background-repeat: repeat-x;
	background-image: -moz-linear-gradient(top, #ffcc00, #E6B800);
	background-image: -ms-linear-gradient(top, #ffcc00, #E6B800);
	background-image: -webkit-gradient(linear, left top, left bottom, from(#ffcc00), to(#E6B800));
	background-image: -webkit-linear-gradient(top, #ffcc00, #E6B800);
	background-image: -o-linear-gradient(top, #ffcc00, #E6B800);
	background-image: linear-gradient(top, #ffcc00, #E6B800);
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	border: 1px solid rgba(0, 0, 0, 0.2);
	margin-bottom: 18px;
	padding: 7px 14px;
	color: #404040;
	text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
	-moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
	box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);'>
<strong>Erreur :</strong> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['message']->value)===null||$tmp==='' ? "Le site a rencontré un problème." : $tmp);?>

</div><?php }} ?>
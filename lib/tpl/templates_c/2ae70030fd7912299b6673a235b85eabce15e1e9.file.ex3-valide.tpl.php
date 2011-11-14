<?php /* Smarty version Smarty-3.1.1, created on 2011-11-14 08:10:32
         compiled from "templates\ex3-valide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147214ec0ccf8cb3da1-18440641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ae70030fd7912299b6673a235b85eabce15e1e9' => 
    array (
      0 => 'templates\\ex3-valide.tpl',
      1 => 1320929308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147214ec0ccf8cb3da1-18440641',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_4ec0ccf8d77ee',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ec0ccf8d77ee')) {function content_4ec0ccf8d77ee($_smarty_tpl) {?><p>
ici, le contenu du template par défaut
</p>
<p>
Formulaire:  
</p>
<?php echo $_smarty_tpl->tpl_vars['form']->value;?>

<div style='clear:both'></div><?php }} ?>
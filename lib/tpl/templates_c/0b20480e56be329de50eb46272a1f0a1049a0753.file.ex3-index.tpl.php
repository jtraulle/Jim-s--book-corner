<?php /* Smarty version Smarty-3.1.1, created on 2011-11-14 08:10:30
         compiled from "templates\ex3-index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167444ec0ccf6cee2b6-48322578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b20480e56be329de50eb46272a1f0a1049a0753' => 
    array (
      0 => 'templates\\ex3-index.tpl',
      1 => 1320929308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167444ec0ccf6cee2b6-48322578',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_4ec0ccf6daef4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ec0ccf6daef4')) {function content_4ec0ccf6daef4($_smarty_tpl) {?><p>
ici, le contenu du template par défaut
</p>
<p>
Formulaire:  
</p>
<?php echo $_smarty_tpl->tpl_vars['form']->value;?>

<div style='clear:both'></div><?php }} ?>
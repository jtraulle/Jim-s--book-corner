<?php /* Smarty version Smarty-3.1.1, created on 2011-11-14 08:09:35
         compiled from "templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:275194ec0ccbf39c197-50415839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64dc0f53a42be5b3a7d2ba591c653348a6eeab8a' => 
    array (
      0 => 'templates\\login.tpl',
      1 => 1320929308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275194ec0ccbf39c197-50415839',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'login' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_4ec0ccbf49e61',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ec0ccbf49e61')) {function content_4ec0ccbf49e61($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['login']->value)){?>
Connecté:<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
 <a href='?module=login&action=deconnect'>Logout</a>
<?php }else{ ?>
<form action='?module=login&action=login' method='post'>
	<input type='text' name='Login'>
	<input type='password' name='Pass'>
	<input type='submit' value='Login'>
</form>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.1, created on 2011-11-14 08:09:35
         compiled from "templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50134ec0ccbf513c17-50146462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6aae8c641d21506c83b2eef3095b796e7ec90482' => 
    array (
      0 => 'templates\\main.tpl',
      1 => 1320929308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50134ec0ccbf513c17-50146462',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'titre' => 0,
    'bloc_login' => 0,
    'messages' => 0,
    'module' => 0,
    'action' => 0,
    'bloc_contenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_4ec0ccbf76898',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ec0ccbf76898')) {function content_4ec0ccbf76898($_smarty_tpl) {?><!-- start template-->
<html>
	<head>
	<title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
	
	<style>
		*{
			font-family:helvetica;	
			padding:0px;
			margin:0px;
		}
		
		body{
			background:	-webkit-gradient(linear, left top, left bottom, from(#A5AA95), to(#6F7364));
		}

		#menu{
			background:black;
			height:14pt;	
			padding:5px;
		}
	
		#menu a{
			border:1px gray solid;
			background-color: #AAAAAA;
			padding:0 5  0 5;
			text-decoration:none;
			line-height:12pt;
			color:white;
			
		}
		#login{
			background:#333;
			float:right;
			padding-right:5px;
			padding-left:5px;
			margin-top:3px;
			color:white;
		}
		#page{
			width:800px;
			margin:auto;	
			background:white;
		}
	
		#contenu{
			background:white;
			padding:5px;
		}
		#module{
			border:5px #CCF dotted;	
		}
		label{
			width:150px;
			float:left;clear:left;	
			margin:4pt;
			text-align:right;
			
		}
		
		#contenu option, #contenu input, #contenu select{
			color:#353730;
			font-size:10pt;	
			margin:4pt;
			padding:4pt;
			border:1px #868A78 solid;
			border-radius: 4px;			
		}

		
		#contenu input,#contenu select{
			float:left;
		}
		#zonemessage{
			background:#E4FFB4;
			border:5px #99AA78 dotted;
			padding:20px;	
		}
		
		span{
			float:left;	
		}
	
	</style>
	</head>
	<body>
	<div id='page'>
		<div id='login'>
			<?php echo $_smarty_tpl->tpl_vars['bloc_login']->value;?>

		</div>
	
		<div id='menu'>
			<a href='?' title='contenu'>Defaut</a>		
			<a href='?module=ex1' title='contenu'>Lien 1</a>
			<a href='?module=ex2' title='page de traitement puis redirection vers le module par défaut'>Lien 2</a>
			<a href='?module=ex3' title='page de formulaire + traitement'>Lien 3</a>	
			<a href='?module=ex4' title='page de download de fichier'>Lien 4</a>
		</div>
	
		<div id='zonemessage'>
			Ici, les messages du site
			    <?php echo $_smarty_tpl->tpl_vars['messages']->value;?>

		</div>
		
		<div id='contenu'>
			Dans cette zone, on affiche le contenu généré par <b><?php echo $_smarty_tpl->tpl_vars['module']->value;?>
-><?php echo $_smarty_tpl->tpl_vars['action']->value;?>
()</b>
			<div id='module'>

				<?php echo $_smarty_tpl->tpl_vars['bloc_contenu']->value;?>

			</div>
		</div>
	</div>
	</body>
		
</html>
<!-- end template--><?php }} ?>
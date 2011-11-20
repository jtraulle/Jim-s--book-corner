<!-- start template-->
<html>
	<head>
	<title>{$titre}</title>
	
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
			{$bloc_login}
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
			    {$messages}
		</div>
		
		<div id='contenu'>
			Dans cette zone, on affiche le contenu généré par <b>{$module}->{$action}()</b>
			<div id='module'>

				{$bloc_contenu}
			</div>
		</div>
	</div>
	</body>
		
</html>
<!-- end template-->
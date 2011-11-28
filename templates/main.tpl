<!-- start template-->
<html>
	<head>
		<title>{$titre}</title>
		<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css">

		<style type ='text/css'>
		input {
			height:inherit;
		}

		.page-header {
			-webkit-border-radius: 0px 0px 6px 6px;
   			-moz-border-radius: 0px 0px 6px 6px;
   			border-radius: 0px 0px 6px 6px;
        	background-color: #f5f5f5;
        	padding: 15px 20px 10px;
      	}
		</style>
	</head>

	<body>

	<div class='container'>

		<div class="content">
		
		<div class="page-header">
          <h1>Jim's book corner library <small>Integrated library system</small></h1>
        </div>

        <div class="row">
          <div class="span16">

		<!--
		<div id='login'>
			{$bloc_login}
		</div> -->
	
		<ul class="tabs">
  			<li class="active"><a href="?">Accueil</a></li>
			<li><a href="?module=ex1">Lien 4</a></li>
			<li><a href="?module=ex1">Lien 3</a></li>
			<li><a href="?module=ex1">Lien 2</a></li>
			<li><a href="?module=inscription">Inscription</a></li>
		</ul>
	
		{if isset($messages) }	
			{$messages}
		{/if}
		
		<div id='contenu'>
			Dans cette zone, on affiche le contenu généré par <b>{$module}->{$action}()</b>
			<div id='module'>

				{$bloc_contenu}
			</div>
		</div>

		</div>
		</div>
		</div>
	</div>
	</body>
		
</html>
<!-- end template-->
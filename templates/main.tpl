<!-- start template-->
<html>
	<head>
		<title>{$titre}</title>
		<meta http-equiv="Content-type" value="text/html; charset=utf-8">
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

      	.page-title{
      		border-bottom : 1 px solid #cacaca;
      		margin-bottom : 25px;
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
  			<li><a href="?module=gestemprunteur">Gestion emprunteurs</a></li>
			<li><a href="?module=inscription">Inscription</a></li>
		</ul>

		{if isset($messages) }
			{$messages}
		{/if}

		<div id='contenu'>
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
<!-- start template-->
<html>
	<head>
		<title>Une erreur est survenue | Jim's book corner library</title>
		<meta http-equiv="Content-type" value="text/html; charset=utf-8">
		<script type="lib/js/jquery.min.js"></script>

		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="lib/css/bootstrap.min.css">

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

      	.floatleft{
          	float: left;
          	margin-right: 50px;
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

		<ul class="tabs">
  			<li {if $module == 'index'}class="active"{/if}><a href="?">Accueil</a></li>
  			<li {if $module == 'gestevenements'}class="active"{/if}><a href="?module=gestevenements">Événements</a></li>
  			<li {if $module == 'gestemprunteur'}class="active"{/if}><a href="?module=gestemprunteur">Gestion emprunteurs</a></li>
  			<li {if $module == 'gestlivre'}class="active"{/if}><a href="?module=gestlivre">Gestion livres</a></li>
  			<li {if $module == 'gestreservations'}class="active"{/if}><a href="?module=gestreservations">Gestion réservations</a></li>
  			<li {if $module == 'gestemprunts'}class="active"{/if}><a href="?module=gestemprunts">Emprunter</a></li>
  			<li {if $module == 'recherche'}class="active"{/if}><a href="?module=recherche">Rechercher</a></li>
		</ul>

		{if isset($messages) }
			{$messages}
		{/if}

		<div id='contenu'>
			<div id='module'>
                <div class="hero-unit">
                        <img class="floatleft" src="images/ooops.png" alt="Oops" />
                        <h1>Ooops !</h1>
                        <h3>Une erreur est survenue ...</h3>
                        <p>{$message|default:"Le site a rencontré un problème."}</p>
                        <div class="row"><div class="span-one-third offset-two-thirds"><a class="btn primary large" href="?module=index">Retourner à l'accueil »</a></div></div>
                  </div>
			</div>
		</div>

		</div>
		</div>
		</div>
	</div>
	</body>

</html>
<!-- end template-->

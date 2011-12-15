<!-- start template-->
<html>
	<head>
		<title>{$titre}</title>
		<meta http-equiv="Content-type" value="text/html; charset=utf-8">
		<script type="text/javascript"src="lib/js/jquery.min.js"></script>

		<script type="text/javascript">
            $(document).ready(function(){
		        $('.help-inline').hide();
		        $('.error .help-inline').show();
		        $("input").focus( function() {
		            if ($(this).attr("class") != 'error')
		                $(this).next().show();
		        } );
		        $("input").blur( function() {
		            if ($(this).attr("class") != 'error')
		                $(this).next().hide();
		        } );
		        $('.suppr').click(function(e) {
					e.preventDefault();
					thisHref = $(this).attr('href');
					if(confirm('Êtes vous sûr(e) de vouloir supprimer cet enregistrement ?')) {
						window.location = thisHref;
					}

				});
		     });
		</script>

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

      	.page-title{
      		border-bottom : 1 px solid #cacaca;
      		margin-bottom : 25px;
      	}

      	.floatleft{
      		float: left;
      		margin-right: 50px;
      	}

      	.tweak-hero{
      	    padding: 30px;
      	}

      	.inline input{
      		position: relative;
      		left: 380px;
      		top: -47px;
      		margin-bottom: -40px;
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

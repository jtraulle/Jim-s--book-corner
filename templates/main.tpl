<!-- start template-->
<html>
	<head>
		<title>{$titre}</title>
		<meta http-equiv="Content-type" value="text/html; charset=utf-8">
		<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		
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
		     });
		</script>
		
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="https://raw.github.com/twitter/bootstrap/master/bootstrap.min.css">

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
  			<li {if $module == 'gestemprunteur'}class="active"{/if}><a href="?module=gestemprunteur">Gestion emprunteurs</a></li>
			<li {if $module == 'inscription'}class="active"{/if}><a href="?module=inscription">Inscription</a></li>
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
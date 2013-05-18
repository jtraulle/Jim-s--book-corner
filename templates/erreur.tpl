<html>
    <head>
        <title>Ooops ! | Jim's book corner library</title>

        <meta http-equiv="Content-type" value="text/html; charset=utf-8">
        
        <!-- On utilise cette balise pour forcer IE à respecter les standards -->
        <meta http-equiv="X-UA-Compatible" content="IE=9"/>

        <script type="text/javascript"src="lib/js/jquery.min.js"></script>
        <script type="text/javascript"src="lib/js/custom.js"></script>

        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/css/custom.css">
        <link rel="stylesheet" href="lib/css/font-awesome.css">
    </head>

    <body>
        <div class='container'>
            <div class="content">
                <div class="page-header">
                    <h1>Jim's book corner library <small>Integrated library system</small></h1>
                    {if isset($login)}
                    <div class="login"><p><em>Vous êtes identifié en tant que {$login}</em> {if $statut == 'gestionnaire'}<img src="images/bricks.png" title="Vous possédez les droits de gestion"/>{/if}</p>
                    <p><a href="?module=gestemprunteur&action=deco"><img src="images/key.png" /> Fermer la session</a></p></div>
                    {else}
                    <div class="login"><p><a href="?module=inscription"><img src="images/user_add.png" /> S'inscrire</a></p><p><a href="?module=gestemprunteur&action=connect"><img src="images/user_go.png" /> S'identifier</a></p></div>
                    {/if}
                </div>

                <div class="row">
                    <div class="span16">

                        {include file="navigation.tpl"}

                        {if isset($messages)}
                            {$messages}
                        {/if}

                        <div id='contenu'>
                            <div id='module'>
                                <div class="hero-unit">
			                        <img class="floatleft" src="images/ooops.png" alt="Oops" />
			                        <h1>Ooops !</h1>
			                        <h3>Une erreur est survenue ...</h3>
			                        <p>{$message|default:"Le site a rencontré un problème."}</p>
			                        <div class="row">
			                        	<div class="span-one-third offset-two-thirds">
			                        		<a class="btn btn-primary large" href="?module=index">Retourner à l'accueil »</a>
			                        	</div>
			                        </div>
                				</div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>
                    {if !isset($statut)}<p><em>Réalisation département Informatique IUT d'Amiens</em> - <a href="?module=pages&action=credits">Crédits</a><span style="float:right;"><img style="vertical-align:top;" src="images/cog.png" /> <a href="?module=gestgestionnaire&action=connect">Interface de gestion</a></span></p>
                    {else}
                    <p style="text-align:center;"><em>Réalisation département Informatique IUT d'Amiens</em> - <a href="?module=pages&action=credits">Crédits</a></p>
                    {/if}
                </footer>
            </div>
        </div>
    </body>

</html>
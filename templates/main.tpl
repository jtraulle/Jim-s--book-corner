<html>
    <head>
        <title>{$titre}</title>

        <meta http-equiv="Content-type" value="text/html; charset=utf-8">
        
        <!-- On utilise cette balise pour forcer IE à respecter les standards -->
        <meta http-equiv="X-UA-Compatible" content="IE=9"/>

        <script type="text/javascript"src="lib/js/jquery.min.js"></script>
        
        {if isset($nomPrenomAuteur)}
        <script type="text/javascript">
           var nomPrenomAuteur = "{$nomPrenomAuteur}";
        </script>
        {/if}
        
        <script type="text/javascript"src="lib/js/custom.js"></script>

        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/css/custom.css">       
    </head>

    <body>
        <div class='container'>
            <div class="content">
                <div class="page-header">
                    <h1>Jim's book corner library <small>Integrated library system</small></h1>
                    {if isset($login)}
                    <div class="login"><p><em>Vous êtes identifié en tant que {$login}</em></p><p><a href="?module=gestEmprunteur&action=deco"><img src="images/key.png" /> Fermer la session</a></p></div>
                    {else}
                    <div class="login"><p><a href="?module=inscription"><img src="images/user_add.png" /> S'inscrire</a></p><p><a href="?module=gestEmprunteur&action=connect"><img src="images/user_go.png" /> S'identifier</a></p></div>
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
                                {$bloc_contenu}
                            </div>
                        </div>
                    </div>
                </div>
                <footer>
                    <p style="text-align:center;"><em>Réalisation département Informatique IUT d'Amiens</em> - <a href="?module=pages&action=credits">Crédits</a></p>
                </footer>
            </div>
        </div>
    </body>

</html>

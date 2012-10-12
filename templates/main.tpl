<html>
    <head>
        <title>{$titre}</title>

        <meta http-equiv="Content-type" value="text/html; charset=utf-8">
        
        <!-- On utilise cette balise pour forcer IE à respecter les standards -->
        <meta http-equiv="X-UA-Compatible" content="IE=9"/>

        <script type="text/javascript"src="lib/js/jquery.min.js"></script>
        <script type="text/javascript"src="lib/js/jquery-ui.min.js"></script>
        <script type="text/javascript"src="lib/js/bootstrap-twipsy.js"></script>
        <script type="text/javascript"src="lib/js/bootstrap-dropdown.js"></script>
        <script type="text/javascript"src="lib/js/bootstrap-alerts.js"></script>
        <script type="text/javascript"src="lib/js/bootstrap-modal.js"></script>
        <script type="text/javascript"src="lib/js/jquery.rating.js"></script>
        <script type="text/javascript"src="lib/js/fancyzoom.js"></script>
        {if isset($note1)}
        
        <script type="text/javascript">
            var note1 = {$note1};
            var note2 = {$note2};
            var note3 = {$note3};
            var note4 = {$note4};
            var note5 = {$note5};
        </script>  
        
        <script type="text/javascript"src="lib/js/highcharts.js"></script>
        <script type="text/javascript"src="lib/js/exporting.js"></script>
        <script type="text/javascript"src="lib/js/custom-chart.js"></script>
        {/if}
        <script type="text/javascript"src="lib/js/chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript"src="lib/js/markitup/jquery.markitup.js"></script>
        <script type="text/javascript"src="lib/js/markitup/sets/bbcode/set.js"></script>
        
        {if isset($nomPrenomAuteur)}
        <script type="text/javascript">
           var nomPrenomAuteur = "{$nomPrenomAuteur}";
        </script>
        {/if}
        
        <script type="text/javascript"src="lib/js/custom.js"></script>

        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/css/Aristo/Aristo.css">
        <link rel="stylesheet" href="lib/css/jquery.rating.css"> 
        <link rel="stylesheet" href="lib/css/font-awesome.css">  
        <link rel="stylesheet" href="lib/css/custom.css">  
        <link rel="stylesheet" href="lib/js/chosen/chosen.css">
        <link rel="stylesheet" type="text/css" href="lib/js/markitup/skins/simple/style.css" />
        <link rel="stylesheet" type="text/css" href="lib/js/markitup/sets/bbcode/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Dawning+of+a+New+Day|Dancing+Script' rel='stylesheet' type='text/css'>
              
    </head>

    <body>
        <div class='container'>
            <div class="content">
                <div class="page-header">
                    <h1>Jim's book corner library <small>Integrated library system <sub>βeta</sub></small></h1>
                    {if isset($login)}
                    <div class="login"><p><em>Vous êtes identifié en tant que {$login}</em> {if $statut == 'gestionnaire'}<img class="infobulle" src="images/bricks.png" data-placement="below" rel='twipsy' title="Vous possédez les droits de gestion"/>{/if}</p>
                    <p><a href="?module=gestemprunteur&action=deco"><img src="images/key.png" /> Fermer la session</a></p></div>
                    {else}
                    <div class="login"><p><a href="?module=inscription"><img src="images/user_add.png" /> S'inscrire</a></p><p><a href="?module=gestemprunteur&action=connect"><img src="images/user_go.png" /> Mon compte lecteur</a></p></div>
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
                    {if $statut == 'invite'}<p><a href="https://github.com/jtraulle/Jim-s--book-corner/">JBCL ILS</a>, <a href="https://github.com/jtraulle/Jim-s--book-corner/commit/239df7f7ce">rev. 239df7f7ce</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em>Réalisation département informatique <acronym style="border-bottom: 1px dotted grey;" title="Institut Universitaire de Technologie">IUT</acronym> d'Amiens</em> - <a href="?module=pages&action=credits">Crédits</a><span style="float:right;"><img style="vertical-align:top;" src="images/bug.png" /> <a href="http://projets.opencomp.fr/jim-s--book-corner/issues/new">Signaler une anomalie</a> - <img style="vertical-align:top;" src="images/cog.png" /> <a href="?module=gestgestionnaire&action=connect">Interface de gestion</a></span></p>
                    {else}
                    <p><a href="https://github.com/jtraulle/Jim-s--book-corner/">JBCL ILS</a>, <a href="https://github.com/jtraulle/Jim-s--book-corner/commit/239df7f7ce">rev. 239df7f7ce</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em>Réalisation département informatique de l'<acronym title="Institut Universitaire de Technologie">IUT</acronym> d'Amiens</em> - <a href="?module=pages&action=credits">Crédits</a> <span style="float:right;"><img style="vertical-align:top;" src="images/bug.png" /> <a href="http://projets.opencomp.fr/jim-s--book-corner/issues/new">Signaler une anomalie</a></span></p>
                    {/if}
                </footer>
            </div>
        </div>
        
        <script type="text/javascript" id="fbzScript" src="http://feedeebuzz.de/widget/js/feedeebuzz.js?to=jtraulle%40gmail.com&amp;p=l&amp;c=b&amp;l=fr"></script>
    </body>

</html>

<ul class="tabs">
    <li {if $module == 'index'}class="active"{/if}><a href="?"><i class="icon-home"></i> Accueil</a></li>
    <li {if $module == 'pages' AND ($action == 'lettre' OR $action == 'lettre_manuscrite')}class="active"{/if}><a href="?module=pages&action=lettre"><i class="icon-envelope"></i> Témoignages</a></li>
    <li {if $module == 'gestevenement'}class="active"{/if}><a href="?module=gestevenement"><i class="icon-time"></i> Événements</a></li>
    <li {if $module == 'gestlivre' OR $module == 'gestauteur'}class="active"{/if}><a href="?module=gestlivre"><i class="icon-book"></i> Catalogue</a></li>
    <li {if $module == 'pages' AND $action == 'donateurs'}class="active"{/if}><a href="?module=pages&action=donateurs"><i class="icon-heart"></i> Donateurs</a></li>
    <li {if $module == 'pages' AND $action == 'presse'}class="active"{/if}><a href="?module=pages&action=presse"><i class="icon-file"></i> Presse</a></li>
    <li {if $module == 'gestemprunteur' && $action == 'moncompte'}class="active"{/if} style="float:right;"><a href="?module=gestemprunteur&action=moncompte"><i class="icon-user"></i> Mon compte lecteur</a></li> 
</ul>
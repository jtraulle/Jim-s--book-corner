<ul class="tabs">
    <li {if $module == 'index'}class="active"{/if}><a href="?"><i class="icon-home"></i> Accueil</a></li>
    <li {if $module == 'pages' AND ($action == 'lettre' OR $action == 'lettre_manuscrite')}class="active"{/if}><a href="?module=pages&action=lettre"><i class="icon-envelope"></i> Témoignages</a></li>
    <li {if $module == 'gestevenement'}class="active"{/if}><a href="?module=gestevenement"><i class="icon-time"></i> Événements</a></li>
    <li {if $module == 'gestlivre' OR $module == 'gestauteur'}class="active"{/if}><a href="?module=gestlivre"><i class="icon-book"></i> Livres</a></li>
</ul>
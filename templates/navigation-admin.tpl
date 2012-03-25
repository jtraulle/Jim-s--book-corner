<ul class="tabs">
    <li {if $module == 'index'}class="active"{/if}><a href="?"><i class="icon-home"></i> Accueil</a></li>
    <li {if $module == 'pages' AND ($action == 'lettre' OR $action == 'lettre_manuscrite')}class="active"{/if}><a href="?module=pages&action=lettre"><i class="icon-envelope"></i> Témoignages</a></li>
    <li {if $module == 'gestevenement'}class="active"{/if}><a href="?module=gestevenement"><i class="icon-calendar"></i> Événements</a></li>
    <li {if $module == 'gestlivre' OR $module == 'gestauteur'}class="active"{/if}><a href="?module=gestlivre"><i class="icon-book"></i> Catalogue</a></li>
    <li {if $module == 'gestcritique'}class="active"{/if}><a href="?module=gestcritique&action=gerer"><i class="icon-comments"></i> Critiques</a></li>
    <li {if $module == 'gestemprunteur'}class="active"{/if}><a href="?module=gestemprunteur"><i class="icon-user"></i> Emprunteurs</a></li>
    <li {if $module == 'gestemprunt' OR $module == 'gestreservation'}class="active"{/if}><a href="?module=gestemprunt"><i class="icon-share-alt"></i> Circulation</a></li>
    <li {if $module == 'gestgestionnaire' OR $module == 'gestsettings'}class="active"{/if} style="float:right;"><a href="?module=gestsettings"><i class="icon-cogs"></i> Paramètres</a></li>
</ul>
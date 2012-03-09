<ul class="tabs">
    <li {if $module == 'index'}class="active"{/if}><a href="?">Accueil</a></li>
    <li {if $module == 'pages' AND ($action == 'lettre' OR $action == 'lettre_manuscrite')}class="active"{/if}><a href="?module=pages&action=lettre">A propos</a></li>
    <li {if $module == 'gestevenement'}class="active"{/if}><a href="?module=gestevenement">Événements</a></li>
    <li {if $module == 'gestlivre' OR $module == 'gestauteur'}class="active"{/if}><a href="?module=gestlivre">Livres</a></li>
    <li {if $module == 'gestemprunteur'}class="active"{/if}><a href="?module=gestemprunteur">Emprunteurs</a></li>
    <li {if $module == 'gestemprunt' OR $module == 'gestreservation'}class="active"{/if}><a href="?module=gestemprunt">Circulation</a></li>
    <li {if $module == 'gestgestionnaire'}class="active"{/if} style="float:right;"><a href="?module=gestgestionnaire">Gestionnaires</a></li>
</ul>
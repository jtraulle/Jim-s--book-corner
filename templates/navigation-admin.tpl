<ul class="tabs">
    <li {if $module == 'index'}class="active"{/if}><a href="?">Accueil</a></li>
    <li {if $module == 'gestevenement'}class="active"{/if}><a href="?module=gestevenement">Événements</a></li>
    <li {if $module == 'gestlivre' OR $module == 'gestauteur'}class="active"{/if}><a href="?module=gestlivre">Livres</a></li>
    <li {if $module == 'gestemprunteur'}class="active"{/if}><a href="?module=gestemprunteur">Emprunteurs</a></li>
    <li {if $module == 'gestemprunt' OR $module == 'gestreservation'}class="active"{/if}><a href="?module=gestemprunt">Circulation</a></li>
    <li {if $module == 'recherche'}class="active"{/if} style="float:right;"><a href="?module=recherche"><img style="vertical-align:middle;" src="images/search.png" /> Recherche</a></li>
</ul>
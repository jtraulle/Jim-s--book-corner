<ul class="tabs">
    <li {if $module == 'index'}class="active"{/if}><a href="?">Accueil</a></li>
    <li {if $module == 'gestevenement'}class="active"{/if}><a href="?module=gestevenement">Événements</a></li>
    <li {if $module == 'gestlivre' OR $module == 'gestauteur'}class="active"{/if}><a href="?module=gestlivre">Catalogue</a></li>
    <li {if $module == 'gestemprunteur' && $action == 'moncompte'}class="active"{/if} style="float:right;"><a href="?module=gestemprunteur&action=moncompte"><img style="vertical-align:middle;" src="images/user_go.png" /> Mon compte lecteur</a></li> 
</ul>
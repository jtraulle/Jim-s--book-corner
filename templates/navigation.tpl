<ul class="tabs">
                            <li {if $module == 'index'}class="active"{/if}><a href="?">Accueil</a></li>
                            <li {if $module == 'gestevenement'}class="active"{/if}><a href="?module=gestevenement">Événements</a></li>
                            <li {if $module == 'gestlivre' OR $module == 'gestauteur'}class="active"{/if}><a href="?module=gestlivre">Livres</a></li>
                            {if $statut == 'gestionnaire'}<li {if $module == 'gestemprunteur'}class="active"{/if}><a href="?module=gestemprunteur">Emprunteurs</a></li>{/if}
                            {if $statut == 'gestionnaire' OR $statut == 'emprunteur'}<li {if $module == 'gestemprunt'}class="active"{/if}><a href="?module=gestemprunt">Emprunts</a></li>
                            <li {if $module == 'gestreservations'}class="active"{/if}><a class="gris" href="?module=gestreservations">Réservations</a></li>{/if}
                            {if $statut == 'gestionnaire'}<li {if $module == 'gestgestionnaire'}class="active"{/if} style="float:right;"><a href="?module=gestgestionnaire"> Gestionnaires</a></li>{/if}
                            <li {if $module == 'recherche'}class="active"{/if} style="float:right;"><a href="?module=recherche"><img style="vertical-align:middle;" src="images/search.png" /> Recherche</a></li>
                        </ul>
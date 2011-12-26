<ul class="tabs">
                            <li {if $module == 'index'}class="active"{/if}><a href="?">Accueil</a></li>
                            <li {if $module == 'gestevenements'}class="active"{/if}><a class="gris" href="?module=gestevenements">Événements</a></li>
                            <li {if $module == 'gestlivre'}class="active"{/if}><a href="?module=gestlivre">Gestion livres</a></li>
                            <li {if $module == 'gestauteur'}class="active"{/if}><a href="?module=gestauteur">Gestion auteurs</a></li>
                            <li {if $module == 'gestemprunteur'}class="active"{/if}><a href="?module=gestemprunteur">Gestion emprunteurs</a></li>
                            <li {if $module == 'gestreservations'}class="active"{/if}><a class="gris" href="?module=gestreservations">Gestion réservations</a></li>
                            <li {if $module == 'gestemprunts'}class="active"{/if}><a class="gris" href="?module=gestemprunts">Emprunter</a></li>
                            <li {if $module == 'recherche'}class="active"{/if}><a href="?module=recherche">Rechercher</a></li>
                        </ul>
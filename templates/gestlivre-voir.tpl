<div class="page-title">
    <h2>Consulter la fiche d'un ouvrage</h2>{if $statut == 'gestionnaire'}<a class="ontitle btn" href="?module=gestlivre&action=modifier&id={$livre->numLivre}"><i class="icon-pencil"></i> Modifier cet ouvrage</a>{/if}
</div>

{$nbDispo = $livre->nbExemplaireLivre - $livre->nbEmprunte()}

<table class="bordered-table zebra-striped">

        <tbody>
          <tr>
            <th style="width:50px;">Titre</th>
            <td>{$livre->titreLivre}</td>
          </tr>
          <tr>
            <th>Auteur</th>
            <td><a title="Cliquez pour en savoir plus sur l'auteur" href="?module=gestauteur&action=voir&id={$livre->numAuteur}"><i class="icon-user"></i> {$livre->prenomAuteur} {$livre->nomAuteur}</a></td>
          </tr>
          <tr>
            <th>Genre(s)</th>
            <td>{foreach from=$genres key=idgenre item=genre name=genres}<a href="?module=gestgenre&action=voir&id={$idgenre}"><i class="icon-tag"></i> {$genre}</a>{if $smarty.foreach.genres.last}{else}, {/if}{/foreach}</td>
          </tr>
          <tr>
            <th>Langue</th>
            <td>{$livre->langueLivre}</td>
          </tr>
          <tr>
            <th>Résumé</th>
            <td>{if $livre->resumeLivre == ''}Pas de résumé disponible pour cet ouvrage{else}{$livre->resumeLivre}{/if}</td>
          </tr>
          <tr>
            <th>Circulation</th>
            <td>{if $statut == 'gestionnaire'}{if $nbDispo > 0}<img src="images/bullet_green.png" />{else}<img src="images/bullet_red.png" />{/if} {$nbDispo} disponible(s)<br />{if $nbDispo > 0}<a href="?module=gestemprunt&action=preter&id={$livre->numLivre}"><img src="images/book_out.png" /> Prêter cet ouvrage</a>{else}<a style="margin-right:8px;" href="?module=gestreservation&action=reserver_pour&id={$livre->numLivre}"><img src="images/book.png" /> Réserver</a>{/if}{elseif $statut == 'emprunteur'}{if $nbDispo > 0}<img src="images/bullet_green.png" />{else}<img src="images/bullet_red.png" />{/if} {$nbDispo} disponible(s)<br />{if $nbDispo > 0}<a href="?module=gestemprunt&action=demande_pret&id={$livre->numLivre}"><img src="images/book_out.png" /> Demander un prêt</a>{else}<a style="margin-right:8px;" href="?module=gestreservation&action=reserver&id={$livre->numLivre}"><img src="images/book.png" /> Réserver</a>{/if}{else}Vous devez être inscrit et connecté pour pouvoir demander un prêt.<br /><a href="?module=inscription"><i class="icon-pencil"></i> Inscrivez-vous</a> ou <a href="?module=gestemprunteur&action=connect"><i class="icon-signin"></i> connectez-vous</a>.{/if}</td>
          </tr>
        </tbody>
      </table>

{if {$note1}+{$note2}+{$note3}+{$note4}+{$note5} != 0}
<div class="page-title">
    <h3>Ce que les autres en ont pensé</h3>
</div>

<div id="graph" style="min-width: 400px; max-width: 900px; height: 250px; margin: 0 auto"></div>

<h4>Visualisation des 3 dernières critiques</h4>

{section name=cr loop=$critiques}
<div class="well">
    <h5>Critique de {$critiques[cr]->identifiantEmprunteur} <span style="float:right";>note attribuée : {$critiques[cr]->noteCritique}/5</span></h5>
        {$critiques[cr]->commentaireCritique}</td>
</div>
{/section}
<a href="?module=gestcritique&action=voir&id={$livre->numLivre}" class="btn" style="float:right;">Voir plus »</a>
{/if}

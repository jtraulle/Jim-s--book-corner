<div class="page-title">
    <h2>Consulter la fiche d'un ouvrage</h2>
</div>

<table class="bordered-table zebra-striped">

        <tbody>
          <tr>
            <th style="width:50px;">Titre</th>
            <td>{$livre->titreLivre}</td>
          </tr>
          <tr>
            <th>Auteur</th>
            <td><a title="Cliquez pour en savoir plus sur l'auteur" href="?module=gestauteur&action=voir&id={$livre->numAuteur}">{$livre->prenomAuteur} {$livre->nomAuteur}</a></td>
          </tr>
          <tr>
            <th>Langue</th>
            <td>{$livre->langueLivre}</td>
          </tr>
          <tr>
            <th>Résumé</th>
            <td>{if $livre->resumeLivre == ''}Pas de résumé disponible pour cet ouvrage{else}{$livre->resumeLivre}{/if}</td>
          </tr>
        </tbody>
      </table>

{if {$note1}+{$note2}+{$note3}+{$note4}+{$note5} != 0}
<div class="page-title">
    <h3>Ce que les autres en ont pensé</h3>
</div>

<div id="graph" style="min-width: 400px; max-width: 900px; height: 250px; margin: 0 auto"></div>

<h4>Visualisation des 5 dernières critiques</h4>

{section name=cr loop=$critiques}
<div class="well">
    <h5>Critique de {$critiques[cr]->identifiantEmprunteur} <span style="float:right";>note attribuée : {$critiques[cr]->noteCritique}/5</span></h5>
        {$critiques[cr]->commentaireCritique}</td>
</div>
{/section}
<a href="?module=gestcritique&action=voir&id={$livre->numLivre}" class="btn" style="float:right;">Voir plus »</a>
{/if}

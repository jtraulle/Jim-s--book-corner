<div class="page-title">
    <h2>Consulter les livres du genre "{$genre}"</h2>
</div>

{if isset($listeGenres)}

<table class="condensed-table zebra-striped">
    <thead>
      	<tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Langue</th>
            <th>Action</th>
    	</tr>
    </thead>
	<tbody>

{section name=genres loop=$listeGenres}
      	<tr>
            <td>{$listeGenres[genres]->titreLivre}</td>
            <td>{$listeGenres[genres]->prenomAuteur} {$listeGenres[genres]->nomAuteur}</td>
            <td>{if $listeGenres[genres]->langueLivre == "Anglais"}<img src="images/book_eng.png" /> {else}<img src="images/book_fre.png" /> {/if}{$listeGenres[genres]->langueLivre}</td>
            <td><a href="?module=gestlivre&action=voir&id={$listeGenres[genres]->numLivre}"><i class="icon-eye-open"></i> Consulter la fiche</a></td>
    	</tr>
{/section}
	</tbody>
</table>

{include file="paginate.tpl"}

{else}

<div class="alert-message block-message info">
  <p style="margin-bottom:10px;"><strong>Aucun auteur à afficher</strong></p> <p>Vous n'avez encore ajouté aucun auteur !<br />Vous devriez commencer par en ajouter quelques uns ...</p>
  <div class="alert-actions">
    <a class="btn small" href="?module=inscription">Ajouter un auteur</a> <a class="btn small" href="?module=exampledata&action=importauteurs">Importer des données d'exemple</a>
  </div>
</div>

{/if}

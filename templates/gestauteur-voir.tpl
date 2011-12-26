<div class="page-title">
    <h2>Consulter un auteur</h2>
</div>

<p>Nom : {$nomAuteur}</p>
<p>Prénom : {$prenomAuteur}</p>

{if isset($infoAuteur)}
<blockquote style="margin-top:30px; margin-bottom:50px;">
  <p>{$infoAuteur}</p>
  <small>Wikipédia, l'encyclopédie libre et gratuite.</small>
</blockquote>
{/if}

<div class="page-title">
    <h2>Livres rédigés par cet auteur possédés</h2>
</div>

{if isset($listeParAuteur)}

<table class="condensed-table zebra-striped">
    <thead>
      	<tr>
            <th>Titre</th>
            <th>Langue</th>
            <th>Nombre d'exemplaires</th>
    	</tr>
    </thead>
	<tbody>

{section name=auteurs loop=$listeParAuteur}
      	<tr>
            <td>{$listeParAuteur[auteurs]->titreLivre}</td>
            <td>{if $listeParAuteur[auteurs]->langueLivre == "Anglais"}<img src="images/book_eng.png" /> {else}<img src="images/book_fre.png" /> {/if}{$listeParAuteur[auteurs]->langueLivre}</td>
        	<td>{$listeParAuteur[auteurs]->nbExemplaireLivre}</td>
    	</tr>
{/section}
	</tbody>
</table>

{else}

<div class="alert-message block-message info">
  <p style="margin-bottom:10px;"><strong>Aucun auteur à afficher</strong></p> <p>Vous n'avez encore ajouté aucun auteur !<br />Vous devriez commencer par en ajouter quelques uns ...</p>
  <div class="alert-actions">
    <a class="btn small" href="?module=inscription">Ajouter un auteur</a> <a class="btn small" href="?module=exampledata&action=importauteurs">Importer des données d'exemple</a>
  </div>
</div>

{/if}

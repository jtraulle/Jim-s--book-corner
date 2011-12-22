<div class="page-title">
    <h2>Gérer les livres <a style="position: relative; left: 623px; top: 15px;" class="btn success" href="?module=gestlivre&action=ajouter">+ Ajouter un livre</a></h2>
</div>

{if isset($listeLivres)}

{$champ_recherche}

<table class="bordered-table zebra-striped">
    <thead>
      	<tr>
            <th>#</th>
            <th>Titre</th>
            <th>Auteur</th>
    		<th>Langue</th>
    		<th>Actions</th>
    	</tr>
    </thead>
	<tbody>

{section name=livres loop=$listeLivres}
      	<tr>
            <td>{$listeLivres[livres]->numLivre}</td>
            <td>{$listeLivres[livres]->titreLivre}</td>
            <td>{$listeLivres[livres]->prenomAuteur} {$listeLivres[livres]->nomAuteur}</td>
        	<td>{if $listeLivres[livres]->langueLivre == "Anglais"}<img src="images/book_eng.png" /> {else}<img src="images/book_fre.png" /> {/if}{$listeLivres[livres]->langueLivre}</td>
        	<td style="width:250px;"><a style="margin-right:40px;" href="?module=gestlivre&action=modifier&id={$listeLivres[livres]->numLivre}"><img src="images/user_edit.png" /> Voir/Modifier</a>
        	    <a class="suppr" href="?module=gestlivre&action=supprimer&id={$listeLivres[livres]->numLivre}"><img src="images/user_delete.png" /> Supprimer</a></td>
    	</tr>
{/section}
	</tbody>
</table>

{include file="paginate.tpl"}

{else}

<div class="alert-message block-message info">
  <p style="margin-bottom:10px;"><strong>Aucun livre à afficher</strong></p> <p>Vous n'avez encore ajouté aucun livre !<br />Vous devriez commencer par en ajouter quelques uns ...</p>
  <div class="alert-actions">
    <a class="btn small" href="?module=gestlivre&action=ajouter">Ajouter un livre</a>
  </div>
</div>

{/if}

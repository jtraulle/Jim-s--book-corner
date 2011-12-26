<div class="page-title">
    <h2>Gérer les auteurs <a style="position: relative; left: 492px; top: 15px;" class="btn success" href="?module=inscription">+ Ajouter un auteur</a></h2>
</div>

{if isset($listeAuteurs)}

{$champ_recherche}

<table class="bordered-table zebra-striped">
    <thead>
      	<tr>
            <th>#</th>
            <th>Prénom</th>
    		<th>Nom</th>
    		<th>Actions</th>
    	</tr>
    </thead>
	<tbody>

{section name=auteurs loop=$listeAuteurs}
      	<tr>
            <td>{$listeAuteurs[auteurs]->numAuteur}</td>
            <td>{$listeAuteurs[auteurs]->prenomAuteur}</td>
        	<td>{$listeAuteurs[auteurs]->nomAuteur}</td>
        	<td style="width:300px;"><a style="margin-right:40px;" href="?module=gestauteur&action=voir&id={$listeAuteurs[auteurs]->numAuteur}"><img src="images/view.png" /> Voir</a>
        	<a style="margin-right:40px;" href="?module=gestauteur&action=modifier&id={$listeAuteurs[auteurs]->numAuteur}"><img src="images/user_edit.png" /> Modifier</a>
        	    <a class="suppr" href="?module=gestauteur&action=supprimer&id={$listeAuteurs[auteurs]->numAuteur}"><img src="images/user_delete.png" /> Supprimer</a></td>
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

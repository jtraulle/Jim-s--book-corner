<div class="page-title">
    <h2>Gérer les emprunteurs</h2> <a class="ontitle btn success" href="?module=inscription">+ Ajouter un emprunteur</a>
</div>

{if isset($listeEmprunteurs)}

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

{section name=emprunteurs loop=$listeEmprunteurs}
      	<tr>
            <td>{$listeEmprunteurs[emprunteurs]->numEmprunteur}</td>
            <td>{$listeEmprunteurs[emprunteurs]->prenomEmprunteur}</td>
        	<td>{$listeEmprunteurs[emprunteurs]->nomEmprunteur}</td>
        	<td style="width:250px;"><a style="margin-right:40px;" href="?module=gestemprunteur&action=modifier&id={$listeEmprunteurs[emprunteurs]->numEmprunteur}"><img src="images/user_edit.png" /> Voir/Modifier</a>
        	    <a class="suppr" href="?module=gestemprunteur&action=supprimer&id={$listeEmprunteurs[emprunteurs]->numEmprunteur}"><img src="images/user_delete.png" /> Supprimer</a></td>
    	</tr>
{/section}
	</tbody>
</table>

{include file="paginate.tpl"}

{else}

<div class="alert-message block-message info">
  <p style="margin-bottom:10px;"><strong>Aucun emprunteur à afficher</strong></p> <p>Vous n'avez encore ajouté aucun emprunteur !<br />Vous devriez commencer par en ajouter quelques uns ...</p>
  <div class="alert-actions">
    <a class="btn small" href="?module=inscription">Ajouter un emprunteur</a> <a class="btn small" href="?module=exampledata&action=importemprunteurs">Importer des données d'exemple</a>
  </div>
</div>

{/if}

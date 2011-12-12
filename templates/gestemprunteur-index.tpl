<div class="page-title">
    <h2>Gérer les emprunteurs <a style="position: relative; left: 492px; top: 15px;" class="btn success" href="?module=inscription">+ Ajouter un emprunteur</a></h2>
</div>

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

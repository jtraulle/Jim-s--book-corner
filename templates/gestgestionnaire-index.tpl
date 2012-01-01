<div class="page-title">
    <h2>Gérer les gestionnaires</h2> <a class="ontitle btn success" href="?module=gestgestionnaire&action=ajouter">+ Ajouter un gestionnaire</a>
</div>

{if isset($listeGestionnaires)}

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

{section name=gestionnaires loop=$listeGestionnaires}
      	<tr>
            <td>{$listeGestionnaires[gestionnaires]->numGestionnaire}</td>
            <td>{$listeGestionnaires[gestionnaires]->prenomGestionnaire}</td>
        	<td>{$listeGestionnaires[gestionnaires]->nomGestionnaire}</td>
        	<td style="width:250px;"><a style="margin-right:40px;" href="?module=gestgestionnaire&action=modifier&id={$listeGestionnaires[gestionnaires]->numGestionnaire}"><img src="images/user_edit.png" /> Voir/Modifier</a>
        	    <a class="suppr" href="?module=gestgestionnaire&action=supprimer&id={$listeGestionnaires[gestionnaires]->numGestionnaire}"><img src="images/user_delete.png" /> Supprimer</a></td>
    	</tr>
{/section}
	</tbody>
</table>

{include file="paginate.tpl"}

{else}

<div class="alert-message block-message info">
  <p style="margin-bottom:10px;"><strong>Aucun gestionnaire à afficher</strong></p> <p>Vous n'avez encore ajouté aucun gestionnaire !<br />Vous devriez commencer par en ajouter quelques uns ...</p>
  <div class="alert-actions">
    <a class="btn small" href="?module=inscription">Ajouter un gestionnaire</a> <a class="btn small" href="?module=exampledata&action=importgestionnaires">Importer des données d'exemple</a>
  </div>
</div>

{/if}

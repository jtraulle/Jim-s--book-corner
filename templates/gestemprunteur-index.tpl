  <div class="page-title">
    <h2>Gérer les emprunteurs</h2> <a class="ontitle btn btn-success" href="?module=inscription"><i class="icon-plus"></i> Ajouter un emprunteur</a>
</div>

{if isset($listeEmprunteurs)}

{$champ_recherche}

<table class="bordered-table zebra-striped">
    <thead>
      	<tr>
            <th>#</th>
            <th>Prénom</th>
    		<th>Nom</th>
    		<th>Identifiant</th>
    		<th>Actions</th>
    	</tr>
    </thead>
	<tbody>

{section name=emprunteurs loop=$listeEmprunteurs}
      	<tr>
            <td>{$listeEmprunteurs[emprunteurs]->numEmprunteur}</td>
            <td>{$listeEmprunteurs[emprunteurs]->prenomEmprunteur}</td>
        	<td>{$listeEmprunteurs[emprunteurs]->nomEmprunteur}</td>
        	<td>{$listeEmprunteurs[emprunteurs]->identifiantEmprunteur}</td>
        	<td style="width:250px;"><a style="margin-right:20px;" href="?module=gestemprunteur&action=voir&id={$listeEmprunteurs[emprunteurs]->numEmprunteur}"><img src="images/view.png" /> Voir</a><a style="margin-right:20px;" href="?module=gestemprunteur&action=modifier&id={$listeEmprunteurs[emprunteurs]->numEmprunteur}"><img src="images/user_edit.png" /> Modifier</a>
        	    <a data-controls-modal="modal-suppr" data-backdrop="true" data-keyboard="true" href="?module=gestemprunteur&action=supprimer&id={$listeEmprunteurs[emprunteurs]->numEmprunteur}"><img src="images/user_delete.png" /> Supprimer</a></td>
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

<div id="modal-suppr" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">×</a>
        <h3>Êtes vous sûr(e) ?</h3>
    </div>
    <div class="modal-body">
        <p>Vous êtes sur le point de supprimer cet emprunteur.</p>
        <p><strong>ATTENTION !</strong> Lorsque vous supprimez un emprunteur, ses critiques, témoignages, emprunts et réservations associées seront aussi supprimés !</p>
        <p>Cette opération est irréversible alors <strong>je vous le redemande</strong>, êtes vous réellement sûr(e) de vouloir supprimer cet emprunteur ?</p>
    </div>
    <div class="modal-footer">
        <a href="?module=gestemprunt&action=supprimerDemande&id=" class="btn btn-danger">Oui, supprimer</a>
        <a href="#" onclick="$('#modal-suppr').modal('hide')" class="btn secondary">Annuler</a>
    </div>
</div>
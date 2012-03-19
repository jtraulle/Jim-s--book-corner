<div class="page-title">
    <h2>Genres</h2> {if $statut == 'gestionnaire'}<a class="ontitle btn btn-success" href="?module=gestgenre&action=ajouter"><i class="icon-plus"></i> Ajouter un genre</a>{/if} <a class="ontitle btn" href="?module=gestlivre">← retour au catalogue</a>
</div>

{if isset($listeGenres)}

{$champ_recherche}

<table class="bordered-table zebra-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

{section name=genres loop=$listeGenres}
        <tr>
            <td>{$listeGenres[genres]->numGenre}</td>
            <td>{$listeGenres[genres]->genre}</td>
            <td {if $statut == 'gestionnaire'}style="width:300px;"{else}style="width:90px;"{/if}><a style="margin-right:40px;" href="?module=gestgenre&action=voir&id={$listeGenres[genres]->numGenre}"><img src="images/view.png" /> Voir</a>
            {if $statut == 'gestionnaire'}<a style="margin-right:40px;" href="?module=gestgenre&action=modifier&id={$listeGenres[genres]->numGenre}"><img src="images/user_edit.png" /> Modifier</a>
                <a data-controls-modal="modal-suppr" data-backdrop="true" data-keyboard="true" href="?module=gestgenre&action=supprimer&id={$listeGenres[genres]->numGenre}"><img src="images/user_delete.png" /> Supprimer</a></td>{/if}
        </tr>
{/section}
    </tbody>
</table>

{include file="paginate.tpl"}

{else}

<div class="alert-message block-message info">
  <p style="margin-bottom:10px;"><strong>Aucun genre à afficher</strong></p> <p>Vous n'avez encore ajouté aucun genre !<br />Vous devriez commencer par en ajouter quelques uns ...</p>
  <div class="alert-actions">
    <a class="btn small" href="?module=gestgenre&action=ajouter">Ajouter un genre</a>
  </div>
</div>

{/if}

<div id="modal-suppr" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">×</a>
        <h3>Êtes vous sûr(e) ?</h3>
    </div>
    <div class="modal-body">
        <p>Vous êtes sur le point de supprimer ce genre.</p>
        <p><strong>ATTENTION !</strong> Lorsque vous supprimez un genre, si des livres ont été associés à ce genre, ils seront eux aussi supprimés !</p>
        <p>Cette opération est irréversible alors <strong>je vous le redemande</strong>, êtes vous réellement sûr(e) de vouloir supprimer ce genre ?</p>
    </div>
    <div class="modal-footer">
        <a href="?module=gestemprunt&action=supprimerDemande&id=" class="btn btn-danger">Oui, supprimer</a>
        <a href="#" onclick="$('#modal-suppr').modal('hide')" class="btn secondary">Annuler</a>
    </div>
</div>
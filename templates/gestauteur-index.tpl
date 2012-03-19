<div class="page-title">
    <h2>Auteurs</h2> {if $statut == 'gestionnaire'}<a class="ontitle btn btn-success" href="?module=gestauteur&action=ajouter"><i class="icon-plus"></i> Ajouter un auteur</a>{/if} <a class="ontitle btn" href="?module=gestlivre">← retour au catalogue</a>
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
            <td {if $statut == 'gestionnaire'}style="width:300px;"{else}style="width:90px;"{/if}><a style="margin-right:40px;" href="?module=gestauteur&action=voir&id={$listeAuteurs[auteurs]->numAuteur}"><img src="images/view.png" /> Voir</a>
            {if $statut == 'gestionnaire'}<a style="margin-right:40px;" href="?module=gestauteur&action=modifier&id={$listeAuteurs[auteurs]->numAuteur}"><img src="images/user_edit.png" /> Modifier</a>
                <a data-controls-modal="modal-suppr" data-backdrop="true" data-keyboard="true" href="?module=gestauteur&action=supprimer&id={$listeAuteurs[auteurs]->numAuteur}"><img src="images/user_delete.png" /> Supprimer</a></td>{/if}
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

<div id="modal-suppr" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">×</a>
        <h3>Êtes vous sûr(e) ?</h3>
    </div>
    <div class="modal-body">
        <p>Vous êtes sur le point de supprimer cet auteur.</p>
        <p><strong>ATTENTION !</strong> Lorsque vous supprimez un auteur, l'ensemble des livres associés à cet auteur seront eux aussi supprimés !</p>
        <p>Cette opération est irréversible alors <strong>je vous le redemande</strong>, êtes vous réellement sûr(e) de vouloir supprimer cet auteur ?</p>
    </div>
    <div class="modal-footer">
        <a href="?module=gestemprunt&action=supprimerDemande&id=" class="btn btn-danger">Oui, supprimer</a>
        <a href="#" onclick="$('#modal-suppr').modal('hide')" class="btn secondary">Annuler</a>
    </div>
</div>
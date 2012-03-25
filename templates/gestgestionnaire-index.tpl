<div class="page-title">
    <h2>Gérer les gestionnaires</h2> <a class="ontitle btn btn-success" href="?module=gestgestionnaire&action=ajouter"><i class="icon-plus"></i> Ajouter un gestionnaire</a> <a class="ontitle btn" href="?module=gestsettings">← retour aux paramètres</a>
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
                <a data-controls-modal="modal-suppr" data-backdrop="true" data-keyboard="true" href="?module=gestgestionnaire&action=supprimer&id={$listeGestionnaires[gestionnaires]->numGestionnaire}"><img src="images/user_delete.png" /> Supprimer</a></td>
        </tr>
{/section}
    </tbody>
</table>

{include file="paginate.tpl"}

{/if}

<div id="modal-suppr" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">×</a>
        <h3>Êtes vous sûr(e) ?</h3>
    </div>
    <div class="modal-body">
        <p>Vous êtes sur le point de supprimer ce gestionnaire.</p>
        <p>Cette opération est irréversible alors <strong>je vous le redemande</strong>, êtes vous réellement sûr(e) de vouloir supprimer ce gestionnaire ?</p>
    </div>
    <div class="modal-footer">
        <a href="?module=gestemprunt&action=supprimerDemande&id=" class="btn btn-danger">Oui, supprimer</a>
        <a href="#" onclick="$('#modal-suppr').modal('hide')" class="btn secondary">Annuler</a>
    </div>
</div>
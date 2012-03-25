<div class="page-title">
    <h2>Témoignages</h2>{if $statut == 'emprunteur'}{if $isTemoignageDejaRedige}<a class="ontitle btn" href="?module=gestemoignage&action=ajouter"><i class="icon-pencil"></i> Modifier mon témoignage</a><a data-controls-modal="modal-suppr" data-backdrop="true" data-keyboard="true" class="ontitle btn btn-danger" href="?module=gestemoignage&action=supprimer"><i class="icon-trash"></i> Supprimer mon témoignage</a>{else}<a class="ontitle btn btn-success" href="?module=gestemoignage&action=ajouter"><i class="icon-plus"></i> Ajouter mon témoignage</a>{/if}{/if}
</div>

{if isset($listeTemoignages)}

{section name=temoignages loop=$listeTemoignages}
<div class="well">
     <h4 style="display:inline-block;">Témoignage de {$listeTemoignages[temoignages]->Emprunteur->identifiantEmprunteur} {$listeTemoignages[temoignages]->dateTemoignage}</h4>
     {if $statut == 'gestionnaire'}<div style="display:inline-block; float:right; padding-bottom:10px;"> <a data-controls-modal="modal-suppr" data-backdrop="true" data-keyboard="true" href="?module=gestemoignage&action=supprimer_gestionnaire&id={$listeTemoignages[temoignages]->numTemoignage}" class="btn btn-danger btn-mini"><i class="icon-remove"></i> Supprimer</a></div>{/if}

    <p>{$listeTemoignages[temoignages]->temoignage}</p>
</div>
{/section}

{include file="paginate.tpl"}

<div id="modal-suppr" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">×</a>
        <h3>Êtes vous sûr(e) ?</h3>
    </div>
    <div class="modal-body">
        <p>Vous êtes sur le point de supprimer le temoignage.</p>
        <p>Cette opération est irréversible alors <strong>je vous le redemande</strong>, êtes vous réellement sûr(e) de vouloir supprimer le témoignage ?</p>
    </div>
    <div class="modal-footer">
        <a href="?module=gestemoignage&action=supprimer&id=" class="btn btn-danger">Oui, supprimer</a>
        <a href="#" onclick="$('#modal-suppr').modal('hide')" class="btn secondary">Annuler</a>
    </div>
</div>

{else}

<div class="alert-message block-message info">
  <p style="margin-bottom:10px;"><strong>Aucun témoignage à afficher</strong></p> <p>Aucun témoignage n'a pour le moment été ajouté ...<br />{if $statut == 'emprunteur'}Pourquoi n'ajouteriez vous pas votre propre témoignage ?</p>
  <div class="alert-actions">
    <a class="btn small" href="?module=gestemoignage&action=ajouter">Ajouter mon témoignage</a>
  </div>{/if}
</div>

{/if}
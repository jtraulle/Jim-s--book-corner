<div class="page-title">
    <h2>Mes critiques</h2><a class="ontitle btn" href="?module=gestemprunteur&action=moncompte">← mon compte lecteur</a>
</div>

{section name=cr loop=$critiques}
<div class="well">
    <h5>Critique sur <em>{$critiques[cr]->infosLivre->titreLivre}</em> de {$critiques[cr]->infosLivre->prenomAuteur} {$critiques[cr]->infosLivre->nomAuteur}<span style="float:right";>note attribuée : {$critiques[cr]->noteCritique}/5</span></h5>
        <div style="text-align:right; padding-bottom:10px;"><a href="?module=gestcritique&action=rediger_critique&idlivre={$critiques[cr]->infosLivre->numLivre}" class="btn btn-mini"><i class="icon-pencil"></i> Modifier</a> <a data-controls-modal="modal-suppr" data-backdrop="true" data-keyboard="true" href="?module=gestcritique&action=supprimer_critique&idlivre={$critiques[cr]->infosLivre->numLivre}" class="btn btn-danger btn-mini"><i class="icon-remove"></i> Supprimer</a></div>
<p>{$critiques[cr]->commentaireCritique}</p>
</div>
{/section}

{include file="paginate.tpl"}

<div id="modal-suppr" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">×</a>
        <h3>Êtes vous sûr(e) ?</h3>
    </div>
    <div class="modal-body">
        <p>Vous êtes sur le point de supprimer cette critique.</p>
        <p>Cette opération est irréversible alors <strong>je vous le redemande</strong>, êtes vous réellement sûr(e) de vouloir supprimer cette critique ?</p>
    </div>
    <div class="modal-footer">
        <a href="?module=gestemprunt&action=supprimerDemande&id=" class="btn btn-danger">Oui, supprimer</a>
        <a href="#" onclick="$('#modal-suppr').modal('hide')" class="btn secondary">Annuler</a>
    </div>
</div>
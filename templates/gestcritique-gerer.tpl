<div class="page-title">
    <h2>Critiques des lecteurs</h2><a class="ontitle btn" href="?module=gestlivre">← retour au catalogue</a>
</div>

{section name=cr loop=$critiques}
<div class="well">
    <h5>Critique sur <a href="?module=gestlivre&action=voir&id={$critiques[cr]->infosLivre->numLivre}"><em>{$critiques[cr]->infosLivre->titreLivre}</em></a> de <a href="?module=gestauteur&action=voir&id={$critiques[cr]->infosLivre->numAuteur}"><i class="icon-user"></i> {$critiques[cr]->infosLivre->prenomAuteur} {$critiques[cr]->infosLivre->nomAuteur}</a><span style="float:right";>note attribuée : {$critiques[cr]->noteCritique}/5</span></h5>
        <div style="text-align:right; padding-bottom:10px;"><a data-controls-modal="modal-suppr" data-backdrop="true" data-keyboard="true" href="?module=gestcritique&action=supprimer_critique_pour&idlivre={$critiques[cr]->infosLivre->numLivre}&idemprunteur={$critiques[cr]->numEmprunteur}" class="btn btn-danger btn-mini"><i class="icon-remove"></i> Supprimer</a></div>
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
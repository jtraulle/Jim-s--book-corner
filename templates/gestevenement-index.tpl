<div class="page-title">
    <h2>Événements</h2> {if $statut == 'gestionnaire'}<a class="ontitle btn btn-success" href="?module=gestevenement&action=ajouter"><i class="icon-plus"></i> Ajouter un événement</a>{/if}
</div>

{section name=evenements loop=$listeEvenements}
<div class="well">
    <h3 style="display:inline-block;">{$listeEvenements[evenements]->nomEvenement}</h3>{if $statut == 'gestionnaire'}<p style="float:right; vertical-align:middle;"><img style="vertical-align:top;" src="images/book.png"> <a href="?module=gestevenement&action=modifier&id={$listeEvenements[evenements]->numEvenement}">Modifier</a> <img style="vertical-align:top;" src="images/bin.png"> <a data-controls-modal="modal-suppr" data-backdrop="true" data-keyboard="true" href="?module=gestevenement&action=supprimer&id={$listeEvenements[evenements]->numEvenement}">Supprimer</a></p>{/if}
    <p><img class="infobulle" data-placement="below" rel='twipsy' title="Thème de l'événement" src="images/asterisk_yellow.png" /> {$listeEvenements[evenements]->themeEvenement} <img class="infobulle" data-placement="below" rel='twipsy' title="Lieu de l'évenement" src="images/home.png" /> {$listeEvenements[evenements]->lieuEvenement} <img class="infobulle" data-placement="below" rel='twipsy' title="Date et heure de rendez-vous" src="images/date.png" /> {$listeEvenements[evenements]->dateEvenement}</p>
    <p>{$listeEvenements[evenements]->desEvenement}</p>
</div>
{/section}

{include file="paginate.tpl"}

<div id="modal-suppr" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">×</a>
        <h3>Êtes vous sûr(e) ?</h3>
    </div>
    <div class="modal-body">
        <p>Vous êtes sur le point de supprimer cet évenement.</p>
        <p>Cette opération est irréversible alors <strong>je vous le redemande</strong>, êtes vous réellement sûr(e) de vouloir supprimer cet évenement ?</p>
    </div>
    <div class="modal-footer">
        <a href="?module=gestemprunt&action=supprimerDemande&id=" class="btn btn-danger">Oui, supprimer</a>
        <a href="#" onclick="$('#modal-suppr').modal('hide')" class="btn secondary">Annuler</a>
    </div>
</div>
<div class="page-title">
    <h2>Prêter un ouvrage</h2>
</div>

<div class="well">
<div><img style="float:left; margin-right:10px;" src="images/handcheck.png" /> <h4 style="display:inline-block; vertical-align:top;">Vous souhaitez prêter <em>{$livre->titreLivre}</em> de {$livre->prenomAuteur} {$livre->nomAuteur}.</h4><p>A qui est destiné ce prêt ?</p></div>
</div>

{$form}

<div id="modal-from-dom" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">×</a>
        <h3>Cet ouvrage n'est pas disponible</h3>
    </div>
    <div class="modal-body">
        <p>L'ouvrage que vous souhaitez emprunter n'est actuellement pas disponible.</p>
        <p>Souhaitez vous le réserver ?</p>
    </div>
    <div class="modal-footer">
        <a href="?module=gestemprunt&action=reserver&id={$livre->numLivre}" class="btn success">Oui, réserver</a>
        <a href="#" onclick="$('#modal-from-dom').modal('hide')" class="btn secondary">Non</a>
    </div>
</div>
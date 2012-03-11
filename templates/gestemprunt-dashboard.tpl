<div class="page-title">
    <h2>Gérer les emprunts</h2><a class="ontitle btn" href="?module=gestreservation"><img style="vertical-align:top;" src="images/date.png" /> Gérer les réservations</a>
</div>

<div class="well">
    <div><img src="images/ball-red.png" /> <h3 class="titresPrets">Prêts nécessitant une intervention</h3></div>
        <p>La durée d'emprunt étant illimitée, cette rubrique signale les conflits.<br />Par exemple, lorsque un lecteur souhaite emprunter un livre mais que ce dernier est déjà emprunté par un autre lecteur.</p>
</div>

<div class="well">
    <div><img src="images/ball-yellow.png" /> <h3 class="titresPrets">Prêts en attente de validation</h3></div>
        <p style="color:gray; font-style:italic;">Les prêts listés dans cette rubrique sont en attente de validation.<br />Cela signifie que le lecteur a manifesté sa volonté d'emprunter l'ouvrage et que vous devez valider le prêt.</p>

    <table class="zebra-striped condensed-table">
    <thead>
        <tr>
            <th>Titre de l'ouvrage</th>
            <th>Auteur</th>
            <th>Emprunt demandé par</th>
            <th>Date de la demande</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

{section name=aValider loop=$listeEnAttente}
        <tr>
            <td>{$listeEnAttente[aValider]['titreLivre']}</td>
            <td>{$listeEnAttente[aValider]['prenomAuteur']} {$listeEnAttente[aValider]['nomAuteur']}</td>
            <td>{$listeEnAttente[aValider]['prenomEmprunteur']} {$listeEnAttente[aValider]['nomEmprunteur']}</td>
            <td>{$listeEnAttente[aValider]['dateDemande']}</td>
            <td><a data-controls-modal="modal-from-dom" data-backdrop="true" data-keyboard="true" href="?module=gestemprunt&action=validerPret&id={$listeEnAttente[aValider]['numEmprunt']}"><img src="images/accept.png" /> Valider</a> <a data-controls-modal="modal-suppr" data-backdrop="true" data-keyboard="true" href="?module=gestemprunt&action=supprimerDemande&id={$listeEnAttente[aValider]['numEmprunt']}"><img src="images/cancel.png" /> Supprimer</a></td>
        </tr>
{/section}
    </tbody>
</table>
</div>

<div class="row">
    <div class="span8">
        <div class="well">
            <img src="images/ball-green.png" /> <h3 class="titresPrets">Prêts en cours</h3> <a href="?module=gestemprunt&action=pretsEnCours" class="btn" style="float:right; margin-top:5px;">Voir les xx prêts en cours.</a>
        </div>
    </div>  

    <div class="span8">      
        <div class="well">
            <div><img src="images/history.png" /> <h3 class="titresPrets">Historique des prêts</h3> <a href="" class="btn" style="float:right; margin-top:5px;">Voir les prêts achevés.</a></div> 
        </div>
   </div>        
</div>

<div id="modal-from-dom" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">×</a>
        <h3>Êtes vous sûr(e) ?</h3>
    </div>
    <div class="modal-body">
        <p>Vous êtes sur le point de valider le prêt.</p>
        <p>Lorsque vous aurez cliqué sur "Confirmer le prêt" le prêt sera enregistré et l'emprunteur pourra emporter l'ouvrage.</p>
    </div>
    <div class="modal-footer">
        <a href="?module=gestemprunt&action=validerPret&id=" class="btn btn-success">Confirmer le prêt</a>
        <a href="#" onclick="$('#modal-from-dom').modal('hide')" class="btn secondary">Annuler</a>
    </div>
</div>

<div id="modal-suppr" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">×</a>
        <h3>Êtes vous sûr(e) ?</h3>
    </div>
    <div class="modal-body">
        <p>Vous êtes sur le point de supprimer cette demande de prêt.</p>
        <p>Cette opération est irréversible alors <strong>je vous le redemande</strong>, êtes vous réellement sûr(e) de vouloir supprimer cette demande de prêt ?</p>
    </div>
    <div class="modal-footer">
        <a href="?module=gestemprunt&action=supprimerDemande&id=" class="btn btn-danger">Oui, supprimer</a>
        <a href="#" onclick="$('#modal-suppr').modal('hide')" class="btn secondary">Annuler</a>
    </div>
</div>


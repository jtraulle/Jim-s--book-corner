<div class="page-title">
    <h2>Gérer les réservations</h2> <a class="ontitle btn" href="?module=gestreservation&action=histo"><img style="vertical-align:top;" src="images/date.png" /> Historique</a> <a class="ontitle btn" href="?module=gestemprunt">← retour à la gestion des prêts</a>
</div>

<div class="well">
    <div><img src="images/ball-green.png" /> <h3 class="titresPrets">Réservations disponibles (à retirer)</h3></div>
        <p style="color:gray; font-style:italic;">Les réservations listés dans cette rubrique correspondent aux livres en attente de retrait par le lecteur ayant effectué la réservation.</p>

    <table class="zebra-striped condensed-table">
    <thead>
        <tr>
            <th>Titre de l'ouvrage</th>
            <th>Auteur</th>
            <th>Réservation demandé par</th>
            <th>Date de la réservation</th>
        </tr>
    </thead>
    <tbody>

{section name=res loop=$listeReservationsDispo}
        <tr>
            <td>{$listeReservationsDispo[res]['titreLivre']}</td>
            <td>{$listeReservationsDispo[res]['prenomAuteur']} {$listeReservationsDispo[res]['nomAuteur']}</td>
            <td>{$listeReservationsDispo[res]['prenomEmprunteur']} {$listeReservationsDispo[res]['nomEmprunteur']}</td>
            <td>{$listeReservationsDispo[res]['dateReservation']}</td>
        </tr>
{/section}
    </tbody>
</table>
</div>

<div class="well">
    <div><img src="images/ball-yellow.png" /> <h3 class="titresPrets">Réservations en attente</h3></div>
        <p style="color:gray; font-style:italic;">Les réservations listés dans cette rubrique sont enregistrées.</p>

    <table class="zebra-striped condensed-table">
    <thead>
        <tr>
            <th>Titre de l'ouvrage</th>
            <th>Auteur</th>
            <th>Réservation demandé par</th>
            <th>Date de la réservation</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

{section name=res loop=$listeReservationsEnAttente}
        <tr>
            <td>{$listeReservationsEnAttente[res]['titreLivre']}</td>
            <td>{$listeReservationsEnAttente[res]['prenomAuteur']} {$listeReservationsEnAttente[res]['nomAuteur']}</td>
            <td>{$listeReservationsEnAttente[res]['prenomEmprunteur']} {$listeReservationsEnAttente[res]['nomEmprunteur']}</td>
            <td>{$listeReservationsEnAttente[res]['dateReservation']}</td>
            <td><a data-controls-modal="modal-suppr" data-backdrop="true" data-keyboard="true" href="?module=gestreservation&action=suppr&id={$listeReservationsEnAttente[res]['numReservation']}"><img src="images/cancel.png" /> Supprimer</a></td>
        </tr>
{/section}
    </tbody>
</table>
</div>

<div id="modal-suppr" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close">×</a>
        <h3>Êtes vous sûr(e) ?</h3>
    </div>
    <div class="modal-body">
        <p>Vous êtes sur le point de supprimer cette réservation.</p>
        <p>Cette opération est irréversible alors <strong>je vous le redemande</strong>, êtes vous réellement sûr(e) de vouloir supprimer cette réservation ?</p>
        <p>L'emprunteur ne sera pas informé de cette suppression.</p>
    </div>
    <div class="modal-footer">
        <a href="?module=gestreservation&action=suppr&id=" class="btn btn-danger">Oui, supprimer</a>
        <a href="#" onclick="$('#modal-suppr').modal('hide')" class="btn secondary">Annuler</a>
    </div>
</div>
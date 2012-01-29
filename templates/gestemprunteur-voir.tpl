<div class="page-title">
    <h2>Fiche lecteur de {$emprunteurAconsulter->prenomEmprunteur} {$emprunteurAconsulter->nomEmprunteur}</h2>
</div>

<div id="accordion">
	<h3><a href="#">Informations de contact</a></h3>
	<div>
		<p><strong><em>Adresse postale :</em></strong> {$emprunteurAconsulter->numRueEmprunteur} {$emprunteurAconsulter->nomRueEmprunteur}, {$emprunteurAconsulter->codePostalEmprunteur} {$emprunteurAconsulter->villeEmprunteur}</p>
		<p><strong><em>Adresse de courriel :</em></strong> {$emprunteurAconsulter->emailEmprunteur}</p>
		<p><strong><em>Téléphone fixe :</em></strong> {$emprunteurAconsulter->telFixeEmprunteur}</p>
		<p><strong><em>Téléphone portable :</em></strong> {$emprunteurAconsulter->telPortableEmprunteur}</p>
	</div>
	<h3><a href="#">Prêts en cours</a></h3>
	<div>
		<table class="zebra-striped condensed-table">
    <thead>
        <tr>
            <th>Titre de l'ouvrage</th>
            <th>Auteur</th>
            <th>Date d'emprunt</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

{section name=emprunts loop=$listeEmprunts}
        <tr>
            <td>{$listeEmprunts[emprunts]['titreLivre']}</td>
            <td>{$listeEmprunts[emprunts]['prenomAuteur']} {$listeEmprunts[emprunts]['nomAuteur']}</td>
            <td class="infobulle" data-placement="left" rel='twipsy' title="{$listeEmprunts[emprunts]['dateEmprunt']}">{$listeEmprunts[emprunts]['dateH']}</td>
            <td><a href="?module=gestemprunt&action=rendre&idemprunteur={$listeEmprunts[emprunts]['numEmprunteur']}&idlivre={$listeEmprunts[emprunts]['numLivre']}">Enregistrer retour</a></td>
        </tr>
{/section}
    </tbody>
</table>
	</div>
	<h3><a href="#">Prêts en attente de validation</a></h3>
	<div>
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
	<h3><a href="#">Réservation en attente</a></h3>
	<div>
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
	<h3><a href="#">Réservations à retirer</a></h3>
	<div>
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
        <a href="?module=gestemprunt&action=validerPret&id=" class="btn success">Confirmer le prêt</a>
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
        <a href="?module=gestemprunt&action=supprimerDemande&id=" class="btn danger">Oui, supprimer</a>
        <a href="#" onclick="$('#modal-suppr').modal('hide')" class="btn secondary">Annuler</a>
    </div>
</div>
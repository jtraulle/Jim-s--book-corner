<div class="page-title">
    <h2>Mon compte lecteur</h2> <a class="ontitle btn" href="?module=index">← retour à l'accueil</a>
</div>

<div id="accordion">
	<h3><a href="#">Informations de contact</a></h3>
	<div>
		<p><strong><em>{$emprunteurAconsulter->prenomEmprunteur} {$emprunteurAconsulter->nomEmprunteur}</em></strong>
		<p>{$emprunteurAconsulter->numRueEmprunteur} {$emprunteurAconsulter->nomRueEmprunteur}, <br />{$emprunteurAconsulter->codePostalEmprunteur} {$emprunteurAconsulter->villeEmprunteur}</p>
		<p>{$emprunteurAconsulter->emailEmprunteur}</p>
		<p>{$emprunteurAconsulter->telFixeEmprunteur}</p>
		<p>{$emprunteurAconsulter->telPortableEmprunteur}</p>
	</div>
	<h3><a href="#">Prêts en cours</a></h3>
	<div>
		{if $listeEmprunts}
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
		{else}
		<div style="padding-bottom:45px;" class="alert-message block-message info">
	    <p><strong>Vous n'avez aucun prêt en cours.</strong></p> 
	    <p>Nous disposons de plusieurs centaines de titres, vous devriez parcourir notre catalogue ;)</p>
	    <div class="alert-actions">
	    <a style="float:right;" class="btn small" href="?module=gestlivre">Parcourir le catalogue</a>
	    </div>
	    </div>
		{/if}
	</div>
	{if $listeEnAttente}
	<h3><a href="#">Prêts en attente de validation</a></h3>
	<div>
	<table class="zebra-striped condensed-table">
	    <thead>
	        <tr>
	            <th>Titre de l'ouvrage</th>
	            <th>Auteur</th>
	            <th>Date de la demande</th>
	            <th>Statut</th>
	        </tr>
	    </thead>
	    <tbody>
			{section name=aValider loop=$listeEnAttente}
	        <tr>
	            <td>{$listeEnAttente[aValider]['titreLivre']}</td>
	            <td>{$listeEnAttente[aValider]['prenomAuteur']} {$listeEnAttente[aValider]['nomAuteur']}</td>
	            <td>{$listeEnAttente[aValider]['dateDemande']}</td>
	            <td>En attente de validation ...</td>
	        </tr>
			{/section}
	    </tbody>
	</table>
	</div>
	{/if}
	{if $listeReservationsEnAttente}
	<h3><a href="#">Réservation en attente</a></h3>
	<div>
		<table class="zebra-striped condensed-table">
	    <thead>
	        <tr>
	            <th>Titre de l'ouvrage</th>
	            <th>Auteur</th>
	            <th>Date de la réservation</th>
	        </tr>
	    </thead>
	    <tbody>

		{section name=res loop=$listeReservationsEnAttente}
	        <tr>
	            <td>{$listeReservationsEnAttente[res]['titreLivre']}</td>
	            <td>{$listeReservationsEnAttente[res]['prenomAuteur']} {$listeReservationsEnAttente[res]['nomAuteur']}</td>
	            <td>{$listeReservationsEnAttente[res]['dateReservation']}</td>
	        </tr>
		{/section}
	    </tbody>
	</table>
	</div>
	{/if}
	{if $listeReservationsDispo}
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
	{/if}
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
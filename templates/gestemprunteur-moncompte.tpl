<div class="page-title">
    <h2>Mon compte lecteur</h2>

<div class="btn-group ontitle">
  <a class="btn" href="?module=gestemprunteur&action=modifier_identifiant"><i class="icon-pencil"></i> Modifier mon identifiant</a>
  <a class="btn" href="?module=gestemprunteur&action=modifier_pass"><i class="icon-key"></i> Modifier mon mot de passe</a>
</div>
<a class="ontitle btn" href="?module=gestcritique&action=mescritiques"><i class="icon-comments"></i> Voir mes critiques</a>

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
		            <td><a href="?module=gestcritique&action=rediger_critique&idlivre={$listeEmprunts[emprunts]['numLivre']}"><i class="icon-comment"></i> Rédiger une critique</a></td>
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
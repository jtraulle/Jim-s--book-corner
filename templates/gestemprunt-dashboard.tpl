<div class="page-title">
    <h2>Gérer les emprunts</h2>
</div>

	<div class="alert-message fade in success">
        <a class="close" href="#">×</a>
        <p><strong>Parfait !</strong> L'ensemble des prêts ne nécessite aucune intervention.</p>
        <p>Vous pouvez cependant envoyer un rappel à un emprunteur lui demandant de restituer l'ouvrage emprunté.</p>
    </div>

    <div><img src="images/ball-red.png" /> <h3 class="titresPrets">Prêts nécessitant une intervention</h3></div>
        <p>La durée d'emprunt étant illimitée, cette rubrique signale les éventuels conflits.<br />Par exemple, lorsque un lecteur souhaite emprunter un livre mais que ce dernier est déjà emprunté par un autre lecteur.</p>

    <div><img src="images/ball-yellow.png" /> <h3 class="titresPrets">Prêts en attente de validation</h3></div>
        <p>Les prêts listés dans cette rubrique sont en attente de validation.<br />Cela signifie que le lecteur a manifesté sa volonté d'emprunter l'ouvrage et que vous devez valider le prêt.</p>

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
            <td><a data-controls-modal="modal-from-dom" data-backdrop="true" data-keyboard="true" href="?module=gestemprunt&action=validerPret&id=?">Traiter la demande</a></td>
        </tr>
{/section}
    </tbody>
</table>

    <div><img src="images/ball-green.png" /> <h3 class="titresPrets">Prêts en cours</h3></div>

    <table class="zebra-striped condensed-table">
    <thead>
        <tr>
            <th>Titre de l'ouvrage</th>
            <th>Auteur</th>
            <th>Emprunté par</th>
            <th>Date d'emprunt</th>
        </tr>
    </thead>
    <tbody>

{section name=emprunts loop=$listeEmprunts}
        <tr>
            <td>{$listeEmprunts[emprunts]['titreLivre']}</td>
            <td>{$listeEmprunts[emprunts]['prenomAuteur']} {$listeEmprunts[emprunts]['nomAuteur']}</td>
            <td>{$listeEmprunts[emprunts]['prenomEmprunteur']} {$listeEmprunts[emprunts]['nomEmprunteur']}</td>
            <td class="infobulle" data-placement="left" rel='twipsy' title="{$listeEmprunts[emprunts]['dateEmprunt']}">{$listeEmprunts[emprunts]['dateH']}</td>
        </tr>
{/section}
    </tbody>
</table>

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
        <a href="?module=gestemprunt&action=validerPret&id=?" class="btn success">Confirmer le prêt</a>
        <a href="?module=gestemprunt&action=supprimerDemande&id=?" class="btn secondary danger">Supprimer la demande</a>
    </div>
</div>

</div>
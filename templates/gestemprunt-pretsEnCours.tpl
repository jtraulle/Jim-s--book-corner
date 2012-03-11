  <div class="page-title">
    <h2>Gérer les emprunts</h2> <a class="ontitle btn" href="?module=gestemprunt">← retour à la synthèse</a>
</div>
  
    <div><img src="images/ball-green.png" /> <h3 class="titresPrets">Prêts en cours</h3></div>

    <table class="zebra-striped condensed-table">
    <thead>
        <tr>
            <th>Titre de l'ouvrage</th>
            <th>Auteur</th>
            <th>Emprunté par</th>
            <th>Date d'emprunt</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

{section name=emprunts loop=$listeEmprunts}
        <tr>
            <td>{$listeEmprunts[emprunts]['titreLivre']}</td>
            <td>{$listeEmprunts[emprunts]['prenomAuteur']} {$listeEmprunts[emprunts]['nomAuteur']}</td>
            <td>{$listeEmprunts[emprunts]['prenomEmprunteur']} {$listeEmprunts[emprunts]['nomEmprunteur']}</td>
            <td class="infobulle" data-placement="left" rel='twipsy' title="{$listeEmprunts[emprunts]['dateEmprunt']}">{$listeEmprunts[emprunts]['dateH']}</td>
            <td><a href="?module=gestemprunt&action=rendre&idemprunteur={$listeEmprunts[emprunts]['numEmprunteur']}&idlivre={$listeEmprunts[emprunts]['numLivre']}"><i class="icon-arrow-down"></i> Enregistrer retour</a></td>
        </tr>
{/section}
    </tbody>
</table>
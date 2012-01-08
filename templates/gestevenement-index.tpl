<div class="page-title">
    <h2>Événements</h2> <a class="ontitle btn success" href="?module=gestevenement&action=ajouter">+ Ajouter un événement</a>
</div>

{section name=evenements loop=$listeEvenements}
<div class="well">
    <h3 style="display:inline-block;">{$listeEvenements[evenements]->nomEvenement}</h3>{if $statut == 'gestionnaire'}<p style="float:right; vertical-align:middle;"><img style="vertical-align:top;" src="images/book.png"> <a href="?module=gestevenement&action=modifier&id={$listeEvenements[evenements]->numEvenement}">Modifier</a> <img style="vertical-align:top;" src="images/bin.png"> <a class="suppr" href="?module=gestevenement&action=supprimer&id={$listeEvenements[evenements]->numEvenement}">Supprimer</a></p>{/if}
    <p><img class="infobulle" data-placement="below" rel='twipsy' title="Thème de l'événement" src="images/asterisk_yellow.png" /> {$listeEvenements[evenements]->themeEvenement} <img class="infobulle" data-placement="below" rel='twipsy' title="Lieu de l'évenement" src="images/home.png" /> {$listeEvenements[evenements]->lieuEvenement} <img class="infobulle" data-placement="below" rel='twipsy' title="Date et heure de rendez-vous" src="images/date.png" /> {$listeEvenements[evenements]->dateEvenement}</p>
    <p>{$listeEvenements[evenements]->desEvenement}</p>
</div>
{/section}
<div class="page-title">
    <h2>Événements</h2> <a class="ontitle btn success" href="?module=gestevenement&action=ajouter">+ Ajouter un événement</a>
</div>

{section name=evenements loop=$listeEvenements}
<div class="well">
    <h3 style="display:inline-block;">{$listeEvenements[evenements]->nomEvenement}</h3><p style="float:right; vertical-align:middle;"><img style="vertical-align:top;" src="images/book.png"> <a href="?module=gestevenement&action=modifier&id={$listeEvenements[evenements]->numEvenement}">Modifier cet événement</a></p>
    <p><img src="images/asterisk_yellow.png" /> {$listeEvenements[evenements]->themeEvenement} <img src="images/home.png" /> {$listeEvenements[evenements]->lieuEvenement} <img src="images/date.png" /> {$listeEvenements[evenements]->dateEvenement}</p>
    <p>{$listeEvenements[evenements]->desEvenement}</p>
</div>
{/section}
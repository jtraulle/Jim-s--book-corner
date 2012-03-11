{if $statut == 'invite'}
<div class="hero-unit tweak-hero">
        <img class="floatleft" src="images/hero-index.png" alt="Oops" />
        <h1>Bienvenue !</h1>
        <h3>au catalogue de la bibliothèque "Jim's book corner" ...</h3>
        <p></p>
        <p>Depuis cette application, vous pouvez rechercher un livre possédé par la bibliothèque et connaître son statut (disponible, emprunté etc.). </p>
        <p>Afin de bénéficier de toutes les fonctionnalités du site (gestion de prêts, réservations etc.), nous vous conseillons de vous inscrire dès maintenant.</p><a style="float:right;" class="btn btn-primary btn-large mainCallToActionBtn" href="?module=inscription">Je m'inscris »</a> <a style="float:right;" class="btn btn-large btn-success mainCallToActionBtn" href="?module=gestemprunteur&action=connect">Déjà inscrit ?</a> 
</div>
{/if}

<div class="row">
    <div class="span8">
      <h2>Derniers livres ajoutés</h2>
      <table class="condensed-table zebra-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
        </tr>
    </thead>
    <tbody>
<div id="tab">
{section name=livres loop=$listeLivres}
        <tr>
            <td style="vertical-align:middle;">{$listeLivres[livres]->titreLivre}</td>
            <td style="vertical-align:middle;"><a href="?module=gestauteur&action=voir&id={$listeLivres[livres]->numAuteur}">{$listeLivres[livres]->prenomAuteur} {$listeLivres[livres]->nomAuteur}</a></td>
        </tr>
{/section}
    </tbody>
</table>
      <p><a class="btn" href="?module=gestlivre">Voir plus »</a></p>
    </div>
    <div class="span8">
      <h2>Dernier événement</h2>
       <div class="well">
        <h3 style="display:inline-block;">{$dernierEvenement->nomEvenement}</h3>
        <p><img class="infobulle" data-placement="below" rel='twipsy' title="Thème de l'événement" src="images/asterisk_yellow.png" /> {$dernierEvenement->themeEvenement} <img class="infobulle" data-placement="below" rel='twipsy' title="Lieu de l'évenement" src="images/home.png" /> {$dernierEvenement->lieuEvenement} <img class="infobulle" data-placement="below" rel='twipsy' title="Date et heure de rendez-vous" src="images/date.png" /> {$dernierEvenement->dateEvenement}</p>
         <p>{$dernierEvenement->desEvenement}</p>
</div>
      <p><a class="btn" href="?module=gestevenement">Voir plus »</a></p>
   </div>        
</div>
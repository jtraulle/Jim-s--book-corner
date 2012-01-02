<div class="hero-unit tweak-hero">
        <img class="floatleft" src="images/hero-index.png" alt="Oops" />
        <h1>Bienvenue !</h1>
        <h3>au catalogue de la bibliothèque "Jim's book corner" ...</h3>
        <p></p>
        <p>Depuis cette application, vous pouvez rechercher un livre possédé par la bibliothèque et connaître son statut (disponible, emprunté etc.). </p>
        <p>Afin de bénéficier de toutes les fonctionnalités du site (gestion de prêts, réservations etc.), nous vous conseillons de vous inscrire dès maintenant.</p><a style="margin-left:750px;" class="btn primary large" href="?module=inscription">Je m'inscris »</a>
</div>

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
{$nbDispo = $listeLivres[livres]->nbExemplaireLivre - $listeLivres[livres]->nbEmprunte}
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
      <h2>Derniers évènements</h2>
       <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      <p><a class="btn" href="#">Voir plus »</a></p>
   </div>        
</div>
<?php if ($this->request->getSession()->read('Auth.User.id') === null): ?>
<div class="jumbotron pt-4 pb-4">
    <img class="float-left mr-4" src="/img/hero-index.png" alt="Oops" />
    <h2 class="display-4">Bienvenue !</h2>
    <p class="lead font-weight-bold">sur le catalogue de la bibliothèque “Jim's book corner” dont les différents ouvrages ont été offerts par Jim Mc Crate.</p>
    <p class="lead font-weight-bold mt-4"> Pour les “amoureux” de l'auteur James Joyce, les ouvrages ont été offerts à une autre bibliothèque nommée “<a href='http://jamesjoyce-a-saintgerandlepuy.com/crbst_23.html'>Anna Livia Plurabelle</a>”. </p>
    <p class="mt-5"><i>Le Jim's book corner se trouve au Labo de Langue de l'UFR STAPS, Allée Paschal Grousset, 80025 Amiens</i></p>
    <p>Depuis cette application, vous pouvez rechercher un livre possédé par la bibliothèque et connaître son statut (disponible, emprunté, etc), lire ou déposer des témoignages dédiés à Jim et Christiane Mc Crate et consulter les évènements. Afin de bénéficier de toutes les fonctionnalités du site (gestion de prêts, réservations, etc), merci de vous inscrire dès maintenant.</p>
    <a style="float:right;" class="btn btn-primary btn-large mainCallToActionBtn" href="/users/users/register"><?= __('Register'); ?> »</a>
    <a style="float:right;" class="btn btn-large btn-success mainCallToActionBtn" href="/users/users/login"><?= __('Already registered ?'); ?></a>
</div>
<?php endif; ?>

<div class="col-md-6 p-0 pr-3">
<?= $this->cell('LatestBooksAdded::display'); ?>
</div>
<div class="col-md-6">
<?= $this->cell('LatestEvent::display'); ?>
</div>

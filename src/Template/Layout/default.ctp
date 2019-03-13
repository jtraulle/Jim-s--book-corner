<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?> | Jim's book corner library
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('fontawesome.min.css') ?>
    <?= $this->Html->css('fontawesome-solid.min.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class='container'>
        <div class="content">
            <div class="row page-header">
                <h1>Jim's book corner library <small>Integrated library system <sub>βeta</sub></small></h1>
                <div class="login">
                    <p><a href="/users/register"><img src="/img/user_add.png" /> <?= __('Register'); ?></a></p>
                    <p><a href="/users/login"><img src="/img/user_go.png" /> <?= __('My reader account'); ?></a></p>
                </div>
            </div>

            <ul class="row nav nav-tabs mt-4 mb-4">
                <li class="nav-item"><a class="nav-link active" href="/"><i class="fas fa-fw fa-home"></i> <?= __('Home'); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/testimonies"><i class="fas fa-fw fa-envelope"></i> <?= __('Testiomonies'); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="/events"><i class="fas fa-fw fa-calendar"></i> <?= __('Events'); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="/books"><i class="fas fa-fw fa-book-reader"></i> <?= __('Catalog'); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/donators"><i class="fas fa-fw fa-heart"></i> <?= __('Donators'); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/press"><i class="fas fa-fw fa-file"></i> <?= __('Press'); ?></a></li>
            </ul>

            <div class="row">
                <?= $this->Flash->render(); ?>
                <?= $this->fetch('content') ?>
            </div>
            <footer class="row">
                <div class="col-2"><p><a href="https://github.com/jtraulle/Jim-s--book-corner/">JBCL ILS</a></p></div>
                <div class="col-5"><p><em>Réalisation département informatique <abbr title="Institut Universitaire de Technologie">IUT</abbr> d'Amiens</em> - <a href="?module=pages&action=credits">Crédits</a></p></div>
                <div class="col-5"><p class="d-inline-block float-right">
                        <img style="vertical-align:top;" src="/img/bug.png" />
                        <a href="http://projets.opencomp.fr/jim-s--book-corner/issues/new"><?= __('Report an issue'); ?></a>
                        <img style="vertical-align:top;" src="/img/cog.png" />
                        <a href="?module=gestgestionnaire&action=connect"><?= __('Management interface'); ?></a>
                    </p></div>

            </footer>
        </div>
    </div>
</body>
</html>

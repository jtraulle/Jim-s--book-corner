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
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Dancing+Script') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <div class='container'>
        <div class="content">
            <div class="row page-header">
                <h1>Jim's book corner library <small>Integrated library system <sub>βeta</sub></small></h1>
                <div class="login">
                    <?php if ($this->request->getSession()->read('Auth.User.id') !== null): ?>
                        <p><em><?= __('You are authenticated as {0}', $this->request->getSession()->read('Auth.User.username')); ?></em>
                            <?php if ($this->request->getSession()->read('Auth.User.is_superuser')): ?>
                            <img class="infobulle" src="/img/bricks.png" data-toggle="tooltip" data-placement="bottom" title="<small><?= __('You have management rights'); ?></small>"/>
                            <?php endif; ?>
                        </p>
                        <p><a href="/users/users/logout"><img src="/img/key.png" /> <?= __('Close session'); ?></a></p>
                    <?php else: ?>
                    <p><a href="/users/users/register"><img src="/img/user_add.png" /> <?= __('Register'); ?></a></p>
                    <p><a href="/users/users/login"><img src="/img/user_go.png" /> <?= __('My reader account'); ?></a></p>
                    <?php endif; ?>
                </div>
            </div>

            <?= $this->element('navbar'); ?>

            <div class="row">
                <?= $this->Flash->render(); ?>
                <?= $this->fetch('content') ?>
            </div>
            <footer class="row mt-5">
                <div class="col-2"><p><a href="https://github.com/jtraulle/Jim-s--book-corner/">JBCL ILS</a></p></div>
                <div class="col-5"><p><em><?= __('Produced by Amiens <abbr title="Institut Universitaire de Technologie">UIT</abbr> <abbr title="Information Technology">IT</abbr> department'); ?></em> - <a href="/pages/licenses"><?= __('Licenses'); ?></a></p></div>
                <div class="col-5">
                    <p class="float-right">
                        <img src="/img/bug.png" />
                        <a class="mr-3" href="https://github.com/jtraulle/Jim-s--book-corner/issues/new"><?= __('Report an issue'); ?></a>
                        <img src="/img/cog.png" />
                        <a href="/users/users/login"><?= __('Management interface'); ?></a>
                    </p>
                </div>

            </footer>
        </div>
    </div>
    <?= $this->Html->script('bootstrap-native-v4.min') ?>
    <?= $this->fetch('script') ?>
</body>
</html>

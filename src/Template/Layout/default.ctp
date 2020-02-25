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
</head>
<body>
    <div class='container'>
        <div class="content">
            <div class="row page-header">
                <h1>Jim's book corner library <small class="d-none d-lg-inline">Integrated library system <sub>βeta</sub></small></h1>
                <div class="ml-auto">
                    <?php if ($this->request->getSession()->read('Auth.User.id') !== null): ?>
                        <p class="m-0"><em><?= __('You are authenticated as {0}', $this->request->getSession()->read('Auth.User.username')); ?></em>
                            <?php if ($this->request->getSession()->read('Auth.User.is_superuser')): ?>
                                <i class="fas fa-fw fa-cubes text-danger" data-toggle="tooltip" data-placement="bottom" title="<small><?= __('You have management rights'); ?></small>"></i>
                            <?php endif; ?>
                        </p>
                        <p class="m-0 float-right"><a href="/users/users/logout"><i class="fas fa-fw fa-key text-warning"></i> <?= __('Close session'); ?></a></p>
                    <?php else: ?>
                    <p class="m-0"><a href="/users/users/register"><i class="fas fa-fw fa-user-plus"></i> <?= __('Register'); ?></a></p>
                    <p class="m-0"><a href="/users/users/login"><i class="fas fa-fw fa-book-reader pr-2"></i> <?= __('My reader account'); ?></a></p>
                    <?php endif; ?>
                </div>
            </div>

            <?= $this->element('navbar'); ?>

            <div class="row">
                <?= $this->Flash->render(); ?>
                <?= $this->fetch('content') ?>
            </div>
            <footer class="row mt-5">
                <div class="col-md-2 col-sm-12"><p><a href="https://github.com/jtraulle/Jim-s--book-corner/">JBCL ILS</a></p></div>
                <div class="col-md-5 col-sm-12 align-items-center"><p><em><?= __('Produced by Amiens <abbr title="Institut Universitaire de Technologie">UIT</abbr> <abbr title="Information Technology">IT</abbr> department'); ?></em> - <a href="/pages/licenses"><?= __('Licenses'); ?></a></p></div>
                <div class="col-md-5 col-sm-12">
                    <p class="float-right">
                        <i class="fas fa-fw fa-bug text-success"></i>
                        <a class="mr-3" href="https://github.com/jtraulle/Jim-s--book-corner/issues/new"><?= __('Report an issue'); ?></a>
                        <i class="fas fa-fw fa-cog text-secondary"></i>
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

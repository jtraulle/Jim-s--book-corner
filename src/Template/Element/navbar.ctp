<?php

$isHomepage = $this->getRequest()->getParam('controller') === 'Pages' &&
              $this->getRequest()->getParam('action') === 'display' &&
              $this->getRequest()->getParam('pass')[0] === 'home';

$isPageTestimony = $this->getRequest()->getParam('controller') === 'Pages' &&
                   $this->getRequest()->getParam('action') === 'display' &&
                   in_array($this->getRequest()->getParam('pass')[0], ['testimonies', 'manuscript']);

$isModuleTestimonies = $this->getRequest()->getParam('controller') === 'Testimonies';
$isModuleEvents = $this->getRequest()->getParam('controller') === 'Events';
$isModuleBooks = $this->getRequest()->getParam('controller') === 'Books';
$isModuleReviews = $this->getRequest()->getParam('controller') === 'Reviews';
$isModuleUsers = $this->getRequest()->getParam('controller') === 'Users';
$isModuleCirculations = $this->getRequest()->getParam('controller') === 'Circulations';
$isModuleSettings = $this->getRequest()->getParam('controller') === 'Settings';

$isDonatorsPage = $this->getRequest()->getParam('controller') === 'Pages' &&
                  $this->getRequest()->getParam('action') === 'display' &&
                  $this->getRequest()->getParam('pass')[0] === 'donators';

$isPressPage = $this->getRequest()->getParam('controller') === 'Pages' &&
               $this->getRequest()->getParam('action') === 'display' &&
               $this->getRequest()->getParam('pass')[0] === 'press';
?>

<ul class="row nav nav-tabs mt-4 mb-4">
    <li class="nav-item"><a class="nav-link <?= $isHomepage ? 'active' : '' ?>" href="/"><i class="fas fa-fw fa-home"></i> <?= __('Home'); ?></a></li>
    <li class="nav-item"><a class="nav-link <?= $isPageTestimony || $isModuleTestimonies ? 'active' : '' ?>" href="/pages/testimonies"><i class="fas fa-fw fa-envelope"></i> <?= __('Testiomonies'); ?></a></li>
    <li class="nav-item"><a class="nav-link <?= $isModuleEvents ? 'active' : '' ?>" href="/events"><i class="fas fa-fw fa-calendar"></i> <?= __('Events'); ?></a></li>
    <li class="nav-item"><a class="nav-link <?= $isModuleBooks ? 'active' : '' ?>" href="/books"><i class="fas fa-fw fa-book-reader"></i> <?= __('Catalog'); ?></a></li>
    <li class="nav-item"><a class="nav-link <?= $isModuleReviews ? 'active' : '' ?>" href="/reviews"><i class="fas fa-fw fa-comments"></i> <?= __('Reviews'); ?></a></li>
    <?php if ($this->request->getSession()->read('Auth.User.is_superuser') === true): ?>
    <li class="nav-item"><a class="nav-link <?= $isModuleUsers ? 'active' : '' ?>" href="/users/users"><i class="fas fa-fw fa-users"></i> <?= __('Borrowers'); ?></a></li>
    <li class="nav-item"><a class="nav-link <?= $isModuleCirculations ? 'active' : '' ?>" href="/circulations"><i class="fas fa-fw fa-handshake"></i> <?= __('Circulation'); ?></a></li>
    <li class="nav-item"><a class="nav-link <?= $isModuleSettings ? 'active' : '' ?>" href="/settings"><i class="fas fa-fw fa-cogs"></i> <?= __('Settings'); ?></a></li>
    <?php endif; ?>
    <?php if ($this->request->getSession()->read('Auth.User.id') === null): ?>
    <li class="nav-item"><a class="nav-link <?= $isDonatorsPage ? 'active' : '' ?>" href="/pages/donators"><i class="fas fa-fw fa-heart"></i> <?= __('Donators'); ?></a></li>
    <li class="nav-item"><a class="nav-link <?= $isPressPage ? 'active' : '' ?>" href="/pages/press"><i class="fas fa-fw fa-file"></i> <?= __('Press'); ?></a></li>
    <?php endif; ?>
</ul>
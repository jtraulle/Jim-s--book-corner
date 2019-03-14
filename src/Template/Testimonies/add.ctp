<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Testimony $testimony
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Testimonies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="testimonies form large-9 medium-8 columns content">
    <?= $this->Form->create($testimony) ?>
    <fieldset>
        <legend><?= __('Add Testimony') ?></legend>
        <?php
            echo $this->Form->control('testimony');
            echo $this->Form->control('date');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

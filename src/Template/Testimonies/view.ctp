<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Testimony $testimony
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Testimony'), ['action' => 'edit', $testimony->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Testimony'), ['action' => 'delete', $testimony->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testimony->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Testimonies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Testimony'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="testimonies view large-9 medium-8 columns content">
    <h3><?= h($testimony->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $testimony->has('user') ? $this->Html->link($testimony->user->id, ['controller' => 'Users', 'action' => 'view', $testimony->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($testimony->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($testimony->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Testimony') ?></h4>
        <?= $this->Text->autoParagraph(h($testimony->testimony)); ?>
    </div>
</div>

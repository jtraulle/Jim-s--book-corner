<?php
/**
 * Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<div class="page-title w-100">
    <h2><?= __('Borrowers') ?></h2>
    <?= $this->AuthLink->link(
        '<i class="fas fa-fw fa-plus-circle"></i> ' . __('Add Borrower'),
        ['plugin' => 'CakeDC/Users', 'controller' => 'users', 'action' => 'add'],
        ['class' => 'ontitle btn btn-light btn-outline-success', 'escape' => false]
    ); ?>
</div>

<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('username', __d('CakeDC/Users', 'Username')) ?></th>
        <th><?= $this->Paginator->sort('email', __d('CakeDC/Users', 'Email')) ?></th>
        <th><?= $this->Paginator->sort('first_name', __d('CakeDC/Users', 'First name')) ?></th>
        <th><?= $this->Paginator->sort('last_name', __d('CakeDC/Users', 'Last name')) ?></th>
        <th class="actions"><?= __d('CakeDC/Users', 'Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach (${$tableAlias} as $user) : ?>
        <tr>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->first_name) ?></td>
            <td><?= h($user->last_name) ?></td>
            <td class="actions">
                <?= $this->Html->link('<i class="fas fa-fw fa-eye"></i> ' . __d('CakeDC/Users', 'View'), ['action' => 'view', $user->id], ['escape' => false, 'class' => 'mr-3']) ?>
                <?= $this->Html->link('<i class="fas fa-fw fa-pencil-alt"></i> ' . __d('CakeDC/Users', 'Edit'), ['action' => 'edit', $user->id], ['escape' => false, 'class' => 'mr-3']) ?>
                <?= $this->Form->postLink('<i class="fas fa-fw fa-trash"></i> ' . __d('CakeDC/Users', 'Delete'), ['action' => 'delete', $user->id], ['confirm' => __d('CakeDC/Users', 'Are you sure you want to delete # {0}?', $user->id), 'escape' => false, 'class' => 'text-danger']) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>

<?= $this->element('pagination'); ?>


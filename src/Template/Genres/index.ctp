<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Genre[]|\Cake\Collection\CollectionInterface $genres
 */
?>

<div class="page-title w-100">
    <h2><?= __('Genres') ?></h2>
    <?= $this->AuthLink->link('<i class="fas fa-fw fa-plus-circle"></i> ' . __('Add Genre'), ['action' => 'add'], ['class' => 'ontitle btn btn-light btn-outline-success', 'escape' => false]); ?>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($genres as $genre): ?>
        <tr>
            <td><?= h($genre->name) ?></td>
            <td class="actions">
                <?= $this->Html->link('<i class="fas fa-fw fa-eye"></i> ' . __('View'), ['action' => 'view', $genre->id], ['escape' => false, 'class' => 'mr-3']) ?>
                <?= $this->Html->link('<i class="fas fa-fw fa-pencil-alt"></i> ' . __('Edit'), ['action' => 'edit', $genre->id], ['escape' => false, 'class' => 'mr-3']) ?>
                <?= $this->Form->postLink('<i class="fas fa-fw fa-trash"></i> ' . __('Delete'), ['action' => 'delete', $genre->id], ['confirm' => __d('CakeDC/Users', 'Are you sure you want to delete "{0}"?', $genre->name), 'escape' => false, 'class' => 'text-danger']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->element('pagination'); ?>
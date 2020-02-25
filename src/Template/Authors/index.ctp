<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author[]|\Cake\Collection\CollectionInterface $authors
 */
?>

<div class="page-title w-100">
    <h2><?= __('Authors') ?></h2>
    <?= $this->AuthLink->link('<i class="fas fa-fw fa-plus-circle"></i> ' . __('Add Author'), ['action' => 'add'], ['class' => 'ontitle btn btn-light btn-outline-success', 'escape' => false]); ?>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($authors as $author): ?>
        <tr>
            <td><?= h($author->first_name) ?></td>
            <td><?= h($author->last_name) ?></td>
            <td class="actions">
                <?= $this->Html->link('<i class="fas fa-fw fa-eye"></i> ' . __('View'), ['action' => 'view', $author->id], ['escape' => false, 'class' => 'mr-3']) ?>
                <?= $this->Html->link('<i class="fas fa-fw fa-pencil-alt"></i> ' . __('Edit'), ['action' => 'edit', $author->id], ['escape' => false, 'class' => 'mr-3']) ?>
                <?= $this->Form->postLink('<i class="fas fa-fw fa-trash"></i> ' . __('Delete'), ['action' => 'delete', $author->id], ['confirm' => __('Are you sure you want to delete # {0}?', $author->id), 'escape' => false, 'class' => 'text-danger']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->element('pagination'); ?>
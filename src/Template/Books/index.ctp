<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */
?>

<div class="page-title w-100">
    <h2><?= __('Browse the catalog') ?></h2>
    <?= $this->AuthLink->link(
        '<i class="fas fa-fw fa-plus-circle"></i> ' . __('Add Book'),
        ['controller' => 'books', 'action' => 'add'],
        ['class' => 'ontitle btn btn-light btn-outline-success', 'escape' => false]
    ); ?>
    <div class="btn-group ontitle" style="position: relative; top: 0;" role="group" aria-label="Basic example">
        <a class="ontitle btn btn-light btn-outline-secondary" href="/genres"><i class="fas fa-fw fa-tags"></i> <?= __('Manage genres'); ?></a>
        <a class="ontitle btn btn-light btn-outline-secondary" href="/authors"><i class="fas fa-fw fa-users"></i> <?= __('Manage authors'); ?></a>
    </div>
</div>

<?= $this->element('Books/alphabetPrimer'); ?>

<table class="table table-bordered table-striped table-hover rounded-lg" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Authors.last_name', 'Author') ?></th>
            <th scope="col"><?= $this->Paginator->sort('language') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        <tr>
            <?= $this->Form->create(null, ['valueSources' => 'query']); ?>
            <?php
            $this->Form->setTemplates([
                'inputContainer' => '{{content}}',
            ]);
            ?>
            <th class="p-2"><?= $this->Form->control('title', ['label' => false, 'placeholder' => 'Search by title (enter any part of the title)...', 'class' => 'w-100']); ?></th>
            <th class="p-2"><?= $this->Form->control('author', ['label' => false, 'placeholder' => 'Search by author...', 'class' => 'w-100']); ?></th>
            <th class="p-2"><?= $this->Form->select('language', ['Anglais'=>'Anglais','Français'=>'Français'], ['label' => false]); ?></th>
            <th class="p-2"><?= $this->Form->button('<i class="fas fa-fw fa-search"></i> ' . __('Search the catalog'), ['class' => 'w-100 btn btn-secondary', 'escape' => false, 'type' => 'submit']); ?></th>
            <?= $this->Form->end(); ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?= h($book->title) ?></td>
            <td><?= $book->has('author') ? $this->Html->link($book->author->full_name, ['controller' => 'Authors', 'action' => 'view', $book->author->id]) : '' ?></td>
            <td><?= h($book->language) ?></td>
            <td class="actions row m-0 border-top-0 border-right-0 border-left-0">
                <div class="col-md-12 col-lg-6 pl-0 pr-1">
                    <span class="d-inline-block" style="min-width: 50px;">
                    <i class="fas fa-fw fa-circle text-success small"></i>
                    <?= __n('1 available', '{0} available', $book->qty, $book->qty); ?></span>
                    <?php if ($this->request->getSession()->read('Auth.User.is_superuser') === true): ?>
                    <span class="d-inline-block" style="min-width: 50px;">
                        <?= $this->Html->link('<i class="fas fa-fw fa-handshake"></i> ' . __('Borrow'), ['action' => 'borrow', $book->id], ['escape' => false]) ?></span>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 p-0">
                    <?php if ($this->request->getSession()->read('Auth.User.is_superuser') === true): ?>
                        <?= $this->Html->link('<i class="fas fa-fw fa-pencil-alt"></i> ' . __('Edit'), ['action' => 'edit', $book->id], ['escape' => false]) ?><br>
                        <?= $this->Form->postLink('<i class="fas fa-fw fa-trash"></i> ' . __('Delete'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete "{0}"?', $book->title), 'class' => 'text-danger', 'escape' => false]) ?>
                    <?php else: ?>
                        <?= $this->Html->link('<i class="fas fa-fw fa-eye"></i> ' . __('View'), ['action' => 'view', $book->id], ['escape' => false, 'class' => 'ml-4']) ?>
                    <?php endif; ?>
                </div>


            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->element('pagination'); ?>
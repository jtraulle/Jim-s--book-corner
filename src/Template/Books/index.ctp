<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */
?>

<div class="page-title w-100">
    <h2><?= __('Browse the catalog') ?></h2>
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
            <th class="p-2"><?= $this->Form->submit('🔍 Search the catalog', ['class' => 'w-100']); ?></th>
            <?= $this->Form->end(); ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?= h($book->title) ?></td>
            <td><?= $book->has('author') ? $this->Html->link($book->author->full_name, ['controller' => 'Authors', 'action' => 'view', $book->author->id]) : '' ?></td>
            <td><?= h($book->language) ?></td>
            <td class="actions">
                <img src="/img/bullet_green.png" />
                <?= __n('1 available', '{0} available', $book->qty, $book->qty); ?>
                 <?= $this->Html->link('<img src="/img/view.png" /> ' . __('View'), ['action' => 'view', $book->id], ['escape' => false, 'class' => 'ml-4']) ?>
                <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $book->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?> -->
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->element('pagination'); ?>
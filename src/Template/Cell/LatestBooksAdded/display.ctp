<h2><?= __('Latest books added'); ?></h2>
<table class="table table-striped table-hover table-sm">
    <thead>
    <tr>
        <th><?= __('Title'); ?></th>
        <th><?= __('Author'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($latestBooksAdded as $book): ?>
        <tr>
            <td><?= $book->title ?></td>
            <td><?= $book->has('author') ? $this->Html->link($book->author->full_name, ['controller' => 'Authors', 'action' => 'view', $book->author->id]) : '' ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link(__('See more') . ' »', ['controller' => 'Books'], ['class' => 'btn btn-secondary']); ?>


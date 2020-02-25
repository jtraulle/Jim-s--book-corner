<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event[]|\Cake\Collection\CollectionInterface $events
 */
?>
<div class="page-title w-100">
    <h2><?= __('Events') ?></h2>
    <?= $this->AuthLink->link(
            '<i class="fas fa-fw fa-plus-circle"></i> ' . __('Add Event'),
            ['controller' => 'events', 'action' => 'add'],
            ['class' => 'ontitle btn btn-light btn-outline-success', 'escape' => false]
        ); ?>
</div>

<?php foreach ($events as $event): ?>
    <?= $this->element('Events/event', ['event' => $event]); ?>
<?php endforeach; ?>

<?= $this->element('pagination'); ?>


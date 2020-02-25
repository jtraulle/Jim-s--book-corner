<?php

use App\Utility\BBCodeParser;

?>
<div class="card card-body bg-light mb-4">
    <div class="row">
        <div class="col-8">
            <h3><?= h($event->name) ?></h3>
        </div>
        <div class="col-4">
            <?php if ($this->AuthLink->isAuthorized(['controller' => 'events', 'action' => 'edit', $event->id])): ?>
                <?= $this->Form->postLink('<i class="fas fa-fw fa-trash"></i> ' . __('Delete'), ['controller' => 'events', 'action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id), 'escape' => false, 'class' => 'd-inline-block float-right text-danger']) ?>
                <?= $this->Html->link('<i class="fas fa-fw fa-edit"></i> ' . __('Edit'), ['controller' => 'events', 'action' => 'edit', $event->id], ['escape' => false, 'class' => 'd-inline-block float-right mr-3']) ?>
            <?php endif; ?>
        </div>
    </div>

    <p>
        <i class="fas fa-fw fa-star-of-life text-warning"></i> <?= h($event->subject) ?><br>
        <i class="fas fa-fw fa-map-marked-alt text-primary"></i> <?= h($event->location) ?>
        <i class="fas fa-fw fa-calendar-alt text-danger"></i> <?= h($event->date) ?></p>
    <p><?= BBCodeParser::bbcodeToHtml($event->description) ?></p>
</div>
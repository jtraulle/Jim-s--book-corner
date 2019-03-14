<?php

use App\Utility\BBCodeParser;

?>
<div class="card card-body bg-light mb-4">
    <div class="row">
        <div class="col-8">
            <h3><?= h($event->name) ?></h3>
        </div>
        <div class="col-4">
            <?php if ($this->AuthLink->isAuthorized(['action' => 'edit', $event->id])): ?>
                <?= $this->Form->postLink('<img src="/img/bin.png"> ' . __('Delete'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id), 'escape' => false, 'class' => 'd-inline-block float-right']) ?>
                <?= $this->Html->link('<img src="/img/book.png"> ' . __('Edit'), ['action' => 'edit', $event->id], ['escape' => false, 'class' => 'd-inline-block float-right mr-3']) ?>
            <?php endif; ?>
        </div>
    </div>

    <p><img class="infobulle" data-placement="below" rel='twipsy' title="Thème de l'événement" src="/img/asterisk_yellow.png" /> <?= h($event->subject) ?> <img class="infobulle" data-placement="below" rel='twipsy' title="Lieu de l'évenement" src="/img/home.png" /> <?= h($event->location) ?> <img class="infobulle" data-placement="below" rel='twipsy' title="Date et heure de rendez-vous" src="/img/date.png" /> <?= h($event->date) ?></p>
    <p><?= BBCodeParser::bbcodeToHtml($event->description) ?></p>
</div>
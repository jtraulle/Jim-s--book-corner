<?php

use App\Utility\BBCodeParser;

?>
<h2><?= __('Latest event'); ?></h2>

<?= $this->element('Events/event', ['event' => $latestEventAdded]); ?>

<?= $this->Html->link(__('See more') . ' »', ['controller' => 'Events'], ['class' => 'btn btn-secondary']); ?>
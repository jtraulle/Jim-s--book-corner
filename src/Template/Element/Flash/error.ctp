<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="w-100 alert alert-danger" onclick="this.classList.add('hidden');">
    <i class="fas fa-fw fa-exclamation-circle"></i> <?= $message ?>
</div>

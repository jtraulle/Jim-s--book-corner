<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="w-100 alert alert-danger" onclick="this.classList.add('hidden');"><?= $message ?></div>

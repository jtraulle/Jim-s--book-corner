<?php

$activeLetter = $this->getRequest()->getQuery('authorLastNameStartsWith');

?>
<ul class="w-100 nav nav-tabs mb-4">
    <li class="nav-item">
        <a class="nav-link plr-25 <?= $activeLetter === null ? 'active' : '' ?>" href="/books">∞</a>
    </li>
    <?php foreach (range('A', 'Z') as $char): ?>
        <a class="nav-link plr-25 <?= $activeLetter !== null && $activeLetter === $char ? 'active' : '' ?>" href="?authorLastNameStartsWith=<?= $char ?>"><?= $char ?></a>
    </li>
    <?php endforeach; ?>
</ul>
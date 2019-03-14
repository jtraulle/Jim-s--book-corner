<ul>
    <?php foreach ($donorsList as $user): ?>
        <li><?= $user->first_name ?> <?= $user->last_name ?></li>
    <?php endforeach; ?>
</ul>
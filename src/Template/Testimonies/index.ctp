<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Testimony[]|\Cake\Collection\CollectionInterface $testimonies
 */
?>

<div class="page-title w-100">
    <h2><?= __('Testimonies'); ?></h2>
</div>

<?php foreach ($testimonies as $testimony): ?>
<div class="card card-body bg-light mb-4">
    <h3><?= __('{0}\'s testimony on {1}', ucwords($testimony->user->first_name), $testimony->date)  ?></h3>
    <p><?= App\Utility\BBCodeParser::bbcodeToHtml($testimony->testimony)?></p>
</div>
<?php endforeach; ?>

<?= $this->element('pagination'); ?>

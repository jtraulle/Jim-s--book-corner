<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author $author
 */
?>


<div class="page-title w-100">
    <h2><?= __('Add Author') ?></h2>
</div>

<?= $this->Form->create($author, ['class' => 'w-100', 'align' => [
'sm' => [
'left' => 6,
'middle' => 6,
'right' => 12
],
'md' => [
'left' => 2,
'middle' => 5,
'right' => 5
]
]]) ?>

<?php
        echo $this->Form->control('first_name');
        echo $this->Form->control('last_name');
?>
<div class="form-group row bg-light pt-4 pb-4 mt-4 border-top ml-0 mr-0 rounded-bottom">
    <div class="offset-md-2 offset-sm-6 col-sm-6 col-md-5 pl-2">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
</div>


<?= $this->Form->end() ?>

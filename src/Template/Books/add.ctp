<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */

$this->Html->css('choices.min', ['block' => 'css']);
$this->Html->script('choices.min', ['block' => 'script']);
$this->append('script'); ?>
<script type="text/javascript">
    const choices = new Choices('select');
</script>
<?php $this->end(); ?>

<?= $this->Form->create($book, ['class' => 'w-100', 'align' => [
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
]]); ?>
<fieldset>
    <legend><?= __('Add Book') ?></legend>
    <?php
        echo $this->Form->control('title');
        echo $this->Form->control('author_id', ['options' => $authors]);
        echo $this->Form->control('summary');
        echo $this->Form->control('language');
        echo $this->Form->control('qty');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>


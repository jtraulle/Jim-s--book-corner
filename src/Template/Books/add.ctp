<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */

$this->Html->css('choices.min', ['block' => 'css']);
$this->Html->script('choices.min', ['block' => 'script']);
$this->Html->css('sceditor.min', ['block' => 'css']);
$this->Html->script('sceditor.min', ['block' => 'script']);
$this->Html->script('bbcode', ['block' => 'script']);
$this->append('script'); ?>
<script type="text/javascript">
    const choices = new Choices('select', {shouldSort: false, placeholderValue: 'Select value(s)'});
    var textarea = document.getElementById('summary');
    sceditor.create(textarea, {
        format: 'bbcode',
        style: '/css/sceditor.min.css',
        toolbar: 'bold,italic,underline|link|source',
        emoticonsEnabled: false,
        height: '300px',
        width: '205%'
    });
</script>
<?php $this->end(); ?>

<div class="page-title w-100">
    <h2><?= __('Add Book') ?></h2>
</div>

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

<?php
    echo $this->Form->control('title');
    echo $this->Form->control('author_id', ['options' => $authors]);
    echo $this->Form->control('summary');
    echo $this->Form->control('language', [
            'type' => 'select',
            'options' => ['Anglais' => 'Anglais', 'Français' => 'Français']
    ]);
    echo $this->Form->control('qty');
    echo $this->Form->control('genres._ids', ['options' => $genres]);
?>

<div class="form-group row bg-light pt-4 pb-4 mt-4 border-top ml-0 mr-0 rounded-bottom">
    <div class="offset-md-2 offset-sm-6 col-sm-6 col-md-5 pl-2">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?= $this->Form->end() ?>


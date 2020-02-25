<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */

$this->Html->css('sceditor.min', ['block' => 'css']);
$this->Html->script('sceditor.min', ['block' => 'script']);
$this->Html->script('bbcode', ['block' => 'script']);
$this->append('script'); ?>
<script type="text/javascript">
    var textarea = document.getElementById('description');
    sceditor.create(textarea, {
        format: 'bbcode',
        style: '/css/sceditor.min.css',
        toolbar: 'bold,italic,underline|link|source',
        emoticonsEnabled: false,
        height: '300px',
        width: '100%'
    });
</script>
<?php $this->end(); ?>

<div class="page-title w-100">
    <h2><?= __('Add Event') ?></h2>
</div>

<?= $this->Form->create($event, ['class' => 'w-100', 'align' => [
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
    echo $this->Form->control('name');
    echo $this->Form->control('subject');
    echo $this->Form->control('location');
    echo $this->Form->control('date');
    echo $this->Form->control('description');
    echo $this->Form->hidden('user_id', ['value' => $this->request->getSession()->read('Auth.User.id')]);
?>

<div class="form-group row bg-light pt-4 pb-4 mt-4 border-top ml-0 mr-0 rounded-bottom">
    <div class="offset-md-2 offset-sm-6 col-sm-6 col-md-5 pl-2">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?= $this->Form->end() ?>

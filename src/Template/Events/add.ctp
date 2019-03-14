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
        emoticonsEnabled: false
    });
</script>
<?php $this->end(); ?>

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
<fieldset>
    <legend><?= __('Add Event') ?></legend>
    <?php
        echo $this->Form->control('name');
        echo $this->Form->control('subject');
        echo $this->Form->control('location');
        echo $this->Form->control('date');
        echo $this->Form->control('description');
        echo $this->Form->control('user_id', ['options' => $users]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

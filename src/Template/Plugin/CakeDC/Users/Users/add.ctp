<?php
/**
 * Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<div class="page-title w-100">
    <h2><?= __('Add Borrower') ?></h2>
</div>

<?= $this->Form->create(${$tableAlias}, ['class' => 'w-100', 'align' => [
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
    echo $this->Form->control('username', ['label' => __d('CakeDC/Users', 'Username')]);
    echo $this->Form->control('email', ['label' => __d('CakeDC/Users', 'Email')]);
    echo $this->Form->control('password', ['label' => __d('CakeDC/Users', 'Password')]);
    echo $this->Form->control('first_name', ['label' => __d('CakeDC/Users', 'First name')]);
    echo $this->Form->control('last_name', ['label' => __d('CakeDC/Users', 'Last name')]);
    echo $this->Form->control('active', [
        'type' => 'checkbox',
        'label' => __d('CakeDC/Users', 'Active')
    ]);
?>

<div class="form-group row bg-light pt-4 pb-4 mt-4 border-top ml-0 mr-0 rounded-bottom">
    <div class="offset-md-2 offset-sm-6 col-sm-6 col-md-5 pl-2">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?= $this->Form->end() ?>


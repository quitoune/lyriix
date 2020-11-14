<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users index content">
    <h3><?= __('Login') ?></h3>
    <div class="table-responsive">
        <?= $this->Form->create() ?>
        <?= $this->Form->control('pseudo') ?>
        <?= $this->Form->control('password') ?>
        <?= $this->Form->button('Connexion') ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $langue
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Languages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="langues form content">
            <?= $this->Form->create($langue) ?>
            <fieldset>
                <legend><?= __('Add Language') ?></legend>
                <?php
                    echo $this->Form->control('code');
                    echo $this->Form->control('nom');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

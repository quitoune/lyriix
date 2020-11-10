<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Shows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shows form content">
            <?= $this->Form->create($show) ?>
            <fieldset>
                <legend><?= __('Add Show') ?></legend>
                <?php
                    echo $this->Form->control('slug');
                    echo $this->Form->control('titre');
                    echo $this->Form->control('annee');
                    echo $this->Form->control('creation', ['empty' => true]);
                    echo $this->Form->control('modification', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

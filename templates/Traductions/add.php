<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Traduction $traduction
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Traductions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="traductions form content">
            <?= $this->Form->create($traduction) ?>
            <fieldset>
                <legend><?= __('Add Traduction') ?></legend>
                <?php
                    echo $this->Form->control('chanson_id', ['options' => $chansons]);
                    echo $this->Form->control('langue_id', ['options' => $langues]);
                    echo $this->Form->control('texte');
                    echo $this->Form->control('creation', ['empty' => true]);
                    echo $this->Form->control('modification', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

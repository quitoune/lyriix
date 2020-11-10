<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chanson $chanson
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $chanson->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $chanson->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Chansons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chansons form content">
            <?= $this->Form->create($chanson) ?>
            <fieldset>
                <legend><?= __('Edit Chanson') ?></legend>
                <?php
                    echo $this->Form->control('slug');
                    echo $this->Form->control('titre');
                    echo $this->Form->control('interprete');
                    echo $this->Form->control('annee');
                    echo $this->Form->control('paroles');
                    echo $this->Form->control('creation', ['empty' => true]);
                    echo $this->Form->control('modification', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

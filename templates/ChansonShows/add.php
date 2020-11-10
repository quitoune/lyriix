<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChansonShow $chansonShow
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Chanson Shows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chansonShows form content">
            <?= $this->Form->create($chansonShow) ?>
            <fieldset>
                <legend><?= __('Add Chanson Show') ?></legend>
                <?php
                    echo $this->Form->control('chanson_id', ['options' => $chansons]);
                    echo $this->Form->control('show_id', ['options' => $shows]);
                    echo $this->Form->control('episode');
                    echo $this->Form->control('scene');
                    echo $this->Form->control('creation', ['empty' => true]);
                    echo $this->Form->control('modification', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

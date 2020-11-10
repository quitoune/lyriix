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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $chansonShow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $chansonShow->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Chanson Shows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chansonShows form content">
            <?= $this->Form->create($chansonShow) ?>
            <fieldset>
                <legend><?= __('Edit Chanson Show') ?></legend>
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

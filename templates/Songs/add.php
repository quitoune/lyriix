<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Song $song
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="songs form content">
            <?= $this->Form->create($song) ?>
            <fieldset>
                <legend><?= __('Add Song') ?></legend>
                <?php
                    echo $this->Form->control('titre');
                    echo $this->Form->control('annee');
                    echo $this->Form->textarea('paroles', ['maxlength' => '', 'class' => 'paroles']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

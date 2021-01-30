<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShowSong $showSong
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $showSong->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $showSong->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Show Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="showSongs form content">
            <?= $this->Form->create($showSong) ?>
            <fieldset>
                <legend><?= __('Edit Show Song') ?></legend>
                <?php
                    echo $this->Form->control('song_id', ['options' => $songs]);
                    echo $this->Form->control('show_id', ['options' => $shows]);
                    echo $this->Form->control('saison');
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

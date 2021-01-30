<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilmSong $filmSong
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $filmSong->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $filmSong->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Film Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmSongs form content">
            <?= $this->Form->create($filmSong) ?>
            <fieldset>
                <legend><?= __('Edit Film Song') ?></legend>
                <?php
                    echo $this->Form->control('song_id', ['options' => $songs]);
                    echo $this->Form->control('film_id', ['options' => $films]);
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArtistSong $artistSong
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $artistSong->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $artistSong->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Artist Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="artistSongs form content">
            <?= $this->Form->create($artistSong) ?>
            <fieldset>
                <legend><?= __('Edit Artist Song') ?></legend>
                <?php
                    echo $this->Form->control('artist_id', ['options' => $artists]);
                    echo $this->Form->control('song_id', ['options' => $songs]);
                    echo $this->Form->control('featuring');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArtistSong $artistSong
 * @var \App\Model\Entity\Song $songs
 * @var \App\Model\Entity\Artist $artists
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Artist Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="artistSongs form content">
            <?= $this->Form->create($artistSong) ?>
            <fieldset>
                <legend><?= __('Add Artist Song') ?></legend>
                <?php
                    echo $this->Form->control('song_id', ['options' => $songs, 'class' => 'select']);
                    echo $this->Form->control('artist_id', ['options' => $artists, 'class' => 'select']);
                    echo $this->Form->control('featuring', ['options'=> array(__('No'), __('Yes')), 'class' => 'select-nosearch']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

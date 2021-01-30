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
                    $opt_song = array();
                    foreach ($songs as $song){
                        $opt_song[$song->id] = $song->titre;
                    }
                    $opt_artist = array();
                    foreach ($artists as $artist){
                        $opt_artist [$artist->id] = $artist->nom;
                    }
                    echo $this->Form->control('song_id', ['options' => $opt_song]);
                    echo $this->Form->control('artist_id', ['options' => $opt_artist]);
                    echo $this->Form->control('featuring', ['options'=> array(__('No'), __('Yes'))]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

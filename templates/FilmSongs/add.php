<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilmSong $songFilm
 * @var \App\Model\Entity\Song $songs
 * @var \App\Model\Entity\Film $films
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Film Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="songFilms form content">
            <?= $this->Form->create($songFilm) ?>
            <fieldset>
                <legend><?= __('Add Film Song') ?></legend>
                <?php
                    $opt_song = array();
                    foreach ($songs as $song){
                        $opt_song[$song->id] = $song->titre;
                    }
                    $opt_film = array();
                    foreach ($films as $film){
                        $opt_film[$film->id] = $film->titre;
                    }
                    echo $this->Form->control('song_id', ['options' => $opt_song]);
                    echo $this->Form->control('film_id', ['options' => $opt_film]);
                    echo $this->Form->control('scene');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

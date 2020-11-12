<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChansonFilm $chansonFilm
 * @var \App\Model\Entity\Chanson $chansons
 * @var \App\Model\Entity\Film $films
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Chanson Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chansonFilms form content">
            <?= $this->Form->create($chansonFilm) ?>
            <fieldset>
                <legend><?= __('Add Chanson Film') ?></legend>
                <?php
                    $opt_song = array();
                    foreach ($chansons as $chanson){
                        $opt_song[$chanson->id] = $chanson->titre;
                    }
                    $opt_film = array();
                    foreach ($films as $film){
                        $opt_film[$film->id] = $film->titre;
                    }
                    echo $this->Form->control('chanson_id', ['options' => $opt_song]);
                    echo $this->Form->control('film_id', ['options' => $opt_film]);
                    echo $this->Form->control('scene');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

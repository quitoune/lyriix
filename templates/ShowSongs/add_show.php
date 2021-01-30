<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShowSong $showSong
 * @var \App\Model\Entity\Song $song
 * @var \App\Model\Entity\Show $shows
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Show Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="showSongs form content">
            <?= $this->Form->create($showSong) ?>
            <fieldset>
                <legend><?= __('Add Show Song') ?></legend>
                <?php
                    $opt_show = array();
                    foreach ($shows as $show){
                        $opt_show[$show->id] = $show->titre;
                    }
                    echo $this->Form->control('song_id', ['type' => 'hidden', 'value' => $song->id]);
                    echo $this->Form->control('show_id', ['options' => $opt_show]);
                    echo "<div class='row'>";
                    echo "<div class='column'>";
                    echo $this->Form->control('saison');
                    echo "</div>";
                    echo "<div class='column'>";
                    echo $this->Form->control('episode');
                    echo "</div>";
                    echo "</div>";
                    echo $this->Form->control('scene');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

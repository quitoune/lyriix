<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChansonShow $chansonShow
 * @var \App\Model\Entity\Chanson $chansons
 * @var \App\Model\Entity\Show $shows
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Chanson Shows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chansonShows form content">
            <?= $this->Form->create($chansonShow) ?>
            <fieldset>
                <legend><?= __('Add Chanson Show') ?></legend>
                <?php
                    $opt_song = array();
                    foreach ($chansons as $chanson){
                        $opt_song[$chanson->id] = $chanson->titre;
                    }
                    $opt_show = array();
                    foreach ($shows as $show){
                        $opt_show[$show->id] = $show->titre;
                    }
                    echo $this->Form->control('chanson_id', ['options' => $opt_song]);
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

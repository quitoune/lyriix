<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Traduction $traduction
 * @var \App\Model\Entity\Traduction $chansons
 * @var \App\Model\Entity\Traduction $langues
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Traductions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="traductions form content">
            <?= $this->Form->create($traduction) ?>
            <fieldset>
                <legend><?= __('Add Traduction') ?></legend>
                <?php
                    $opt_song = array();
                    foreach ($chansons as $chanson){
                        $opt_song[$chanson->id] = $chanson->titre;
                    }
                    $opt_lang = array();
                    foreach ($langues as $langue){
                        $opt_lang[$langue->id] = $langue->nom;
                    }
                    echo $this->Form->control('chanson_id', ['options' => $opt_song]);
                    echo $this->Form->control('langue_id', ['options' => $opt_lang]);
                    echo $this->Form->control('texte');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

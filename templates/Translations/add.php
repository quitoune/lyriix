<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Translation $translation
 * @var \App\Model\Entity\Song $songs
 * @var \App\Model\Entity\Language $languages
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Translations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="translations form content">
            <?= $this->Form->create($translation) ?>
            <fieldset>
                <legend><?= __('Add Translation') ?></legend>
                <?php
                    $opt_song = array();
                    foreach ($songs as $song){
                        $opt_song[$song->id] = $song->titre;
                    }
                    $opt_lang = array();
                    foreach ($languages as $language){
                        $opt_lang[$language->id] = $language->nom;
                    }
                    echo $this->Form->control('song_id', ['options' => $opt_song]);
                    echo $this->Form->control('language_id', ['options' => $opt_lang]);
                    echo $this->Form->control('texte');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

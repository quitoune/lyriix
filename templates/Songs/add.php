<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Song $song
 * @var \App\Model\Entity\Artist $artists
 * @var array $opt
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="songs form content">
            <?= $this->Form->create($song) ?>
            <fieldset>
                <legend><?= __('Add Song') ?></legend>
                <?= $this->Form->control('titre') ?>
                <?= $this->Form->control('annee') ?>
                <?= $this->Form->control('artists', ['type' => 'hidden']) ?>
                <?= $this->createSelect($artists, $opt['main']) ?>
                <?= $this->createSelect($artists, $opt['featuring']) ?>
                <div class="input textarea">
                <label for="paroles"><?= __('Lyrics') ?></label>
                <?= $this->Form->textarea('paroles', ['maxlength' => '', 'class' => 'paroles', 'label' => __('Lyrics')]) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#artists-main").change(function(){
			var artists = "";
			$(this).find("option:selected").each(function(){ 
				artists += $(this).text() + ",";
			});
			$("#artists").val(artists);
		});
	});
</script>

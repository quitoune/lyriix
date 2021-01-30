<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film $film
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Film'), ['action' => 'edit', $film->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Film'), ['action' => 'delete', $film->id], ['confirm' => __('Are you sure you want to delete # {0}?', $film->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Film'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="films view content">
            <h3><?= __('ID') . ': ' . h($film->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Titre') ?></th>
                    <td><?= h($film->titre) ?></td>
                    <th><?= __('Annee') ?></th>
                    <td><?= h($film->annee) ?></td>
                </tr>
                <tr>
                    <th><?= __('Realisateur') ?></th>
                    <td><?= h($film->realisateur) ?></td>
                    <th></th>
                    <td></td>
                </tr>
                <tr>
                	<th><?= __('Creation') ?></th>
                    <td><?= h($film->creation->format('d/m/Y à H:i')) . __(' par ') . h($film->createur->pseudo) ?>
                	</td>
                	<th><?= __('Dernière modification: ') ?></th>
                    <td><?= h($film->modification->format('d/m/Y H:i')) . ' (' . h($film->modificateur->pseudo) . ')' ?>
                	</td>
                </tr>
            </table>
            <div id="songs"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var link_songs = "<?= $this->Url->build(["controller" => "FilmSongs", "action" => "filmView", $film->id]);?>";
		Ajax(link_songs, "#songs");
	});
</script>

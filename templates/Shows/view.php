<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Show'), ['action' => 'edit', $show->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Show'), ['action' => 'delete', $show->id], ['confirm' => __('Are you sure you want to delete # {0}?', $show->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Shows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Show'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shows view content">
            <h3><?= __('ID') . ': ' . h($show->id) ?></h3>
            <table class="center">
                <tr>
                    <th><?= __('Titre') ?></th>
                    <td><?= h($show->titre) ?></td>
                    <th><?= __('Annee') ?></th>
                    <td><?= h($show->annee) ?></td>
                </tr>
                <tr>
                	<th><?= __('Creation') ?></th>
                    <td><?= h($show->creation->format('d/m/Y à H:i')) . __(' par ') . h($show->createur->pseudo) ?>
                	</td>
                	<th><?= __('Dernière modification: ') ?></th>
                    <td><?= h($show->modification->format('d/m/Y H:i')) . ' (' . h($show->modificateur->pseudo) . ')' ?>
                	</td>
                </tr>
            </table>
            <div id="chansons"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var link_chansons = "<?= $this->Url->build(["controller" => "ChansonShows", "action" => "showView", $show->id]);?>";
		Ajax(link_chansons, "#chansons");
	});
</script>

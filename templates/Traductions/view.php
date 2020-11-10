<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Traduction $traduction
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Traduction'), ['action' => 'edit', $traduction->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Traduction'), ['action' => 'delete', $traduction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $traduction->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Traductions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Traduction'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="traductions view content">
            <h3><?= __('ID') . ': ' . h($traduction->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Chanson') ?></th>
                    <td><?= $traduction->has('chanson') ? $this->Html->link($traduction->chanson->titre, ['controller' => 'Chansons', 'action' => 'view', $traduction->chanson->slug]) : '' ?></td>
                    <th><?= __('Langue') ?></th>
                    <td><?= $traduction->has('langue') ? $this->Html->link($traduction->langue->nom, ['controller' => 'Langues', 'action' => 'view', $traduction->langue->code]) : '' ?></td>
                </tr>
                <tr>
                    <th colspan="2" class="center"><?= __('Original text') ?></th>
                    <th colspan="2" class="center"><?= __('Translation') ?></th>
                </tr>
                <tr>
                    <td colspan="2" class="center"><?= preg_replace("#\\n#", "<br>", file_get_contents('resources/chansons/' . $traduction->chanson->paroles)) ?></td>
                    <td colspan="2" class="center"><?= preg_replace("#\\n#", "<br>", file_get_contents('resources/traductions/' . $traduction->texte)) ?></td>
                </tr>
                <tr>
                    <th rowspan="2"><?= __('Creation') ?></th>
                    <td><?= h($traduction->creation->format('d/m/Y à H:i')) ?></td>
                    <th rowspan="2"><?= __('Modification') ?></th>
                    <td><?= h($traduction->modification->format('d/m/Y à H:i')) ?></td>
                </tr>
                <tr>
                    <td><?= h($traduction->createur->pseudo) ?></td>
                    <td><?= h($traduction->modificateur->pseudo) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

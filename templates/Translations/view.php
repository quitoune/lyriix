<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Translation $translation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Translation'), ['action' => 'edit', $translation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Translation'), ['action' => 'delete', $translation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $translation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Translations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Translation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="translations view content">
            <h3><?= __('ID') . ': ' . h($translation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Song') ?></th>
                    <td><?= $translation->has('song') ? $this->Html->link($translation->song->titre, ['controller' => 'Songs', 'action' => 'view', $translation->song->slug]) : '' ?></td>
                    <th><?= __('Language') ?></th>
                    <td><?= $translation->has('language') ? $this->Html->link($translation->language->nom, ['controller' => 'Languages', 'action' => 'view', $translation->language->code]) : '' ?></td>
                </tr>
                <tr>
                    <th colspan="2" class="center"><?= __('Original text') ?></th>
                    <th colspan="2" class="center"><?= __('Translation') ?></th>
                </tr>
                <tr>
                    <td colspan="2" class="center"><?= preg_replace("#\\n#", "<br>", $translation->song->paroles) ?></td>
                    <td colspan="2" class="center"><?= preg_replace("#\\n#", "<br>", $translation->paroles) ?></td>
                </tr>
                <tr>
                    <th rowspan="2"><?= __('Creation') ?></th>
                    <td><?= h($translation->creation->format('d/m/Y à H:i')) ?></td>
                    <th rowspan="2"><?= __('Modification') ?></th>
                    <td><?= h($translation->modification->format('d/m/Y à H:i')) ?></td>
                </tr>
                <tr>
                    <td><?= h($translation->createur->pseudo) ?></td>
                    <td><?= h($translation->modificateur->pseudo) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

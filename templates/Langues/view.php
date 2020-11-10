<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Langue $langue
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Langue'), ['action' => 'edit', $langue->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Langue'), ['action' => 'delete', $langue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $langue->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Langues'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Langue'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="langues view content">
            <h3><?= __('ID') . ': ' . h($langue->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Code') . ': ' ?></th>
                    <td><?= h($langue->code) ?></td>
                    <th><?= __('Nom') . ': ' ?></th>
                    <td><?= h($langue->nom) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Traductions') ?></h4>
                <?php if (count($langue->traductions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Chanson') ?></th>
                            <th><?= __('Auteur') ?></th>
                        </tr>
                        <?php foreach ($langue->traductions as $traduction) : ?>
                        <tr>
                            <td><?= h($traduction->id) ?></td>
                            <td><?= $this->Html->link($traduction->chanson->titre, ['controller' => 'Chansons', 'action' => 'view', $traduction->chanson->slug]) ?></td>
                            <td><?= h($traduction->auteur) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php else: ?>
                <span class="center"><?= __('No traductions associated.'); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

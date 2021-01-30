<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShowSong[]|\Cake\Collection\CollectionInterface $showSongs
 */
?>
<div class="showSongs index content">
    <?= $this->Html->link(__('New Show Song'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Show Songs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('song_id') ?></th>
                    <th><?= $this->Paginator->sort('show_id') ?></th>
                    <th><?= $this->Paginator->sort('saison') ?></th>
                    <th><?= $this->Paginator->sort('episode') ?></th>
                    <th><?= $this->Paginator->sort('scene') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($showSongs as $showSong): ?>
                <tr>
                    <td><?= $this->Number->format($showSong->id) ?></td>
                    <td><?= $showSong->has('song') ? $this->Html->link($showSong->song->titre, ['controller' => 'Songs', 'action' => 'view', $showSong->song->slug]) : '' ?></td>
                    <td><?= $showSong->has('show') ? $this->Html->link($showSong->show->titre, ['controller' => 'Shows', 'action' => 'view', $showSong->show->slug]) : '' ?></td>
                    <td><?= h($showSong->saison) ?></td>
                    <td><?= h($showSong->episode) ?></td>
                    <td><?= h($showSong->scene) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $showSong->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $showSong->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $showSong->id], ['confirm' => __('Are you sure you want to delete # {0}?', $showSong->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ') ?>
            <?= $this->Paginator->prev('< ') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(' >') ?>
            <?= $this->Paginator->last(' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

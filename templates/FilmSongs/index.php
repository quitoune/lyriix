<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilmSong[]|\Cake\Collection\CollectionInterface $filmSongs
 */
?>
<div class="filmSongs index content">
    <?= $this->Html->link(__('New Film Song'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Film Songs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('song_id') ?></th>
                    <th><?= $this->Paginator->sort('film_id') ?></th>
                    <th><?= $this->Paginator->sort('scene') ?></th>
                    <th><?= $this->Paginator->sort('creation') ?></th>
                    <th><?= $this->Paginator->sort('modification') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filmSongs as $filmSong): ?>
                <tr>
                    <td><?= $this->Number->format($filmSong->id) ?></td>
                    <td><?= $filmSong->has('song') ? $this->Html->link($filmSong->song->titre, ['controller' => 'Songs', 'action' => 'view', $filmSong->song->slug]) : '' ?></td>
                    <td><?= $filmSong->has('film') ? $this->Html->link($filmSong->film->titre, ['controller' => 'Films', 'action' => 'view', $filmSong->film->slug]) : '' ?></td>
                    <td><?= h($filmSong->scene) ?></td>
                    <td><?= h($filmSong->creation) ?></td>
                    <td><?= h($filmSong->modification) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $filmSong->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filmSong->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filmSong->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filmSong->id)]) ?>
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

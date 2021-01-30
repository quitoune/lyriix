<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArtistSong[]|\Cake\Collection\CollectionInterface $artistSongs
 */
?>
<div class="artistSongs index content">
    <?= $this->Html->link(__('New Artist Song'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Artist Songs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('artist_id') ?></th>
                    <th><?= $this->Paginator->sort('song_id') ?></th>
                    <th><?= $this->Paginator->sort('featuring') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($artistSongs as $artistSong): ?>
                <tr>
                    <td><?= $this->Number->format($artistSong->id) ?></td>
                    <td><?= $artistSong->has('artist') ? $this->Html->link($artistSong->artist->nom, ['controller' => 'Artists', 'action' => 'view', $artistSong->artist->slug]) : '' ?></td>
                    <td><?= $artistSong->has('song') ? $this->Html->link($artistSong->song->titre, ['controller' => 'Songs', 'action' => 'view', $artistSong->song->slug]) : '' ?></td>
                    <td><?= ($this->Number->format($artistSong->featuring) ? 'Yes' : 'No') ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $artistSong->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $artistSong->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $artistSong->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artistSong->id)]) ?>
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

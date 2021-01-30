<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArtistSong $artistSong
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Artist Song'), ['action' => 'edit', $artistSong->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Artist Song'), ['action' => 'delete', $artistSong->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artistSong->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Artist Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Artist Song'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="artistSongs view content">
            <h3><?= h($artistSong->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Artist') ?></th>
                    <td><?= $artistSong->has('artist') ? $this->Html->link($artistSong->artist->id, ['controller' => 'Artists', 'action' => 'view', $artistSong->artist->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Song') ?></th>
                    <td><?= $artistSong->has('song') ? $this->Html->link($artistSong->song->id, ['controller' => 'Songs', 'action' => 'view', $artistSong->song->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($artistSong->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Featuring') ?></th>
                    <td><?= $this->Number->format($artistSong->featuring) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artist $artist
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Artist'), ['action' => 'edit', $artist->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Artist'), ['action' => 'delete', $artist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artist->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Artists'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Artist'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="artists view content">
            <h3><?= h($artist->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($artist->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nom') ?></th>
                    <td><?= h($artist->nom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($artist->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Artist Songs') ?></h4>
                <?php if (!empty($artist->artist_songs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Artist Id') ?></th>
                            <th><?= __('Song Id') ?></th>
                            <th><?= __('Featuring') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($artist->artist_songs as $artistSongs) : ?>
                        <tr>
                            <td><?= h($artistSongs->id) ?></td>
                            <td><?= h($artistSongs->artist_id) ?></td>
                            <td><?= h($artistSongs->song_id) ?></td>
                            <td><?= h($artistSongs->featuring) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ArtistSongs', 'action' => 'view', $artistSongs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ArtistSongs', 'action' => 'edit', $artistSongs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ArtistSongs', 'action' => 'delete', $artistSongs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artistSongs->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

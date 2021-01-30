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
                    <th><?= __('Nom') ?></th>
                    <td><?= h($artist->nom) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Songs') ?></h4>
                <?php if (!empty($artist->artist_songs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Song') ?></th>
                        </tr>
                        <?php foreach ($artist->artist_songs as $artistSongs) : ?>
                        <tr>
                            <td><?= h($artistSongs->id) ?></td>

                            <td><?= $this->Html->link(h($artistSongs->song->titre), ['action' => 'view', $artistSongs->song->slug, 'controller' => 'Songs']) ?></td>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

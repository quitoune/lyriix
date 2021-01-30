<?php
/**
 * @var \App\View\AjaxView $this
 * @var \App\Model\Entity\ShowSong $showSongs
 */
?>
<div class="related">
    <h4><?= __('Songs') ?></h4>
    <?php if ($showSongs->count()) : ?>
    <div class="table-responsive">
        <table>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Song') ?></th>
                <th><?= __('Saison') ?></th>
                <th><?= __('Episode') ?></th>
                <th><?= __('Scene') ?></th>
            </tr>
            <?php foreach ($showSongs as $showSong) : ?>
            <tr>
                <td><?= h($showSong->id) ?></td>
                <td><?= $this->Html->link($showSong->song->titre, ['controller' => 'Songs', 'action' => 'view', $showSong->song->slug]) ?></td>
                <td><?= h($showSong->saison) ?></td>
                <td><?= h($showSong->episode) ?></td>
                <td><?= h($showSong->scene) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php else: ?>
    <span class="center"><?= __('No songs associated to the show.'); ?></span>
    <?php endif; ?>
</div>
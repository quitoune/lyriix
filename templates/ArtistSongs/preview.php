<?php
/**
 * @var \App\View\AjaxView $this
 * @var \App\Model\Entity\FilmSong $artistSongs
 */
?>
<div class="related">
    <h4><?= __('Songs') ?></h4>
    <?php if ($artistSongs->count()) : ?>
    <div class="table-responsive">
        <table>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Song') ?></th>
                <th><?= __('Year') ?></th>
            </tr>
            <?php foreach ($artistSongs as $artistSong) : ?>
            <tr>
                <td><?= h($artistSong->id) ?></td>
                <td><?= $this->Html->link($artistSong->song->titre, ['controller' => 'Songs', 'action' => 'view', $artistSong->song->slug]) ?></td>
                <td><?= h($artistSong->song->annee) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php else: ?>
    <span class="center"><?= __('No songs associated to the artist.'); ?></span>
    <?php endif; ?>
</div>
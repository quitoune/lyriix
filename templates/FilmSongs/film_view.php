<?php
/**
 * @var \App\View\AjaxView $this
 * @var \App\Model\Entity\FilmSong $filmSongs
 */
?>
<div class="related">
    <h4><?= __('Songs') ?></h4>
    <?php if ($filmSongs->count()) : ?>
    <div class="table-responsive">
        <table>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Song') ?></th>
                <th><?= __('Scene') ?></th>
            </tr>
            <?php foreach ($filmSongs as $filmSong) : ?>
            <tr>
                <td><?= h($filmSong->id) ?></td>
                <td><?= $this->Html->link($filmSong->song->titre, ['controller' => 'Songs', 'action' => 'view', $filmSong->song->slug]) ?></td>
                <td><?= h($filmSong->scene) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php else: ?>
    <span class="center"><?= __('No songs associated to the film.'); ?></span>
    <?php endif; ?>
</div>
<?php
/**
 * @var \App\View\AjaxView $this
 * @var \App\Model\Entity\ChansonFilm $chansonFilms
 */
?>
<div class="related">
    <h4><?= __('Songs') ?></h4>
    <?php if ($chansonFilms->count()) : ?>
    <div class="table-responsive">
        <table>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Chanson') ?></th>
                <th><?= __('Scene') ?></th>
            </tr>
            <?php foreach ($chansonFilms as $chansonFilm) : ?>
            <tr>
                <td><?= h($chansonFilm->id) ?></td>
                <td><?= $this->Html->link($chansonFilm->chanson->titre, ['controller' => 'Chansons', 'action' => 'view', $chansonFilm->chanson->slug]) ?></td>
                <td><?= h($chansonFilm->scene) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php else: ?>
    <span class="center"><?= __('No songs associated to the show.'); ?></span>
    <?php endif; ?>
</div>
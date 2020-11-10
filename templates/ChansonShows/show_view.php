<?php
/**
 * @var \App\View\AjaxView $this
 * @var \App\Model\Entity\ChansonShow $chansonShows
 */
?>
<div class="related">
    <h4><?= __('Songs') ?></h4>
    <?php if ($chansonShows->count()) : ?>
    <div class="table-responsive">
        <table>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Chanson') ?></th>
                <th><?= __('Episode') ?></th>
                <th><?= __('Scene') ?></th>
            </tr>
            <?php foreach ($chansonShows as $chansonShow) : ?>
            <tr>
                <td><?= h($chansonShow->id) ?></td>
                <td><?= $this->Html->link($chansonShow->chanson->titre, ['controller' => 'Chansons', 'action' => 'view', $chansonShow->chanson->slug]) ?></td>
                <td><?= h($chansonShow->episode) ?></td>
                <td><?= h($chansonShow->scene) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php else: ?>
    <span class="center"><?= __('No songs associated to the show.'); ?></span>
    <?php endif; ?>
</div>
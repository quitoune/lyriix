<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilmSong $filmSong
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Film Song'), ['action' => 'edit', $filmSong->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Film Song'), ['action' => 'delete', $filmSong->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filmSong->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Film Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Film Song'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmSongs view content">
            <h3><?= h($filmSong->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Song') ?></th>
                    <td><?= $this->Html->link($filmSong->song->titre, ['controller' => 'Songs', 'action' => 'view', $filmSong->song->titre]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Film') ?></th>
                    <td><?= $this->Html->link($filmSong->film->titre, ['controller' => 'Films', 'action' => 'view', $filmSong->film->titre]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Scene') ?></th>
                    <td><?= h($filmSong->scene) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creation') ?></th>
                    <td>
                    <?= h($filmSong->creation) . ' ' . __('by') . ' ' ?>
                    <?= $this->Html->link($filmSong->createur->pseudo, ['controller' => 'Users', 'action' => 'view', $filmSong->createur->pseudo]) ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Modification') ?></th>
                    <td>
                    <?= h($filmSong->modification) . ' ' . __('by') . ' ' ?>
                    <?= $this->Html->link($filmSong->modificateur->pseudo, ['controller' => 'Users', 'action' => 'view', $filmSong->modificateur->pseudo]) ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

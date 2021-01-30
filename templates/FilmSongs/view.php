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
                    <td><?= $filmSong->has('song') ? $this->Html->link($filmSong->song->id, ['controller' => 'Songs', 'action' => 'view', $filmSong->song->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Film') ?></th>
                    <td><?= $filmSong->has('film') ? $this->Html->link($filmSong->film->id, ['controller' => 'Films', 'action' => 'view', $filmSong->film->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Scene') ?></th>
                    <td><?= h($filmSong->scene) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $filmSong->has('user') ? $this->Html->link($filmSong->user->id, ['controller' => 'Users', 'action' => 'view', $filmSong->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($filmSong->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creation') ?></th>
                    <td><?= h($filmSong->creation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modification') ?></th>
                    <td><?= h($filmSong->modification) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

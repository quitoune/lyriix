<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShowSong $showSong
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Show Song'), ['action' => 'edit', $showSong->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Show Song'), ['action' => 'delete', $showSong->id], ['confirm' => __('Are you sure you want to delete # {0}?', $showSong->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Show Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Show Song'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="showSongs view content">
            <h3><?= h($showSong->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Song') ?></th>
                    <td><?= $this->Html->link($showSong->song->titre, ['controller' => 'Songs', 'action' => 'view', $showSong->song->slug]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Show') ?></th>
                    <td><?= $this->Html->link($showSong->show->titre, ['controller' => 'Shows', 'action' => 'view', $showSong->show->slug]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Episode') ?></th>
                    <td><?= h('S' . ($showSong->saison < 10 ? '0' : '') . $showSong->saison . 'E' . ($showSong->episode < 10 ? '0' : '') . $showSong->episode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Scene') ?></th>
                    <td><?= h($showSong->scene) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creation') ?></th>
                    <td>
                    <?= h($showSong->creation) . ' ' . __('by') . ' ' ?>
                    <?= $this->Html->link($showSong->createur->pseudo, ['controller' => 'Users', 'action' => 'view', $showSong->createur->pseudo]) ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Modification') ?></th>
                    <td>
                    <?= h($showSong->modification) . ' ' . __('by') . ' ' ?>
                    <?= $this->Html->link($showSong->modificateur->pseudo, ['controller' => 'Users', 'action' => 'view', $showSong->modificateur->pseudo]) ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

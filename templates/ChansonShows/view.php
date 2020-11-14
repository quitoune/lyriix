<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChansonShow $chansonShow
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Chanson Show'), ['action' => 'edit', $chansonShow->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Chanson Show'), ['action' => 'delete', $chansonShow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chansonShow->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Chanson Shows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Chanson Show'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chansonShows view content">
            <h3><?= h($chansonShow->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Chanson') ?></th>
                    <td><?= $chansonShow->has('chanson') ? $this->Html->link($chansonShow->chanson->id, ['controller' => 'Chansons', 'action' => 'view', $chansonShow->chanson->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Show') ?></th>
                    <td><?= $chansonShow->has('show') ? $this->Html->link($chansonShow->show->id, ['controller' => 'Shows', 'action' => 'view', $chansonShow->show->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Episode') ?></th>
                    <td><?= h($chansonShow->episode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Scene') ?></th>
                    <td><?= h($chansonShow->scene) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $chansonShow->has('user') ? $this->Html->link($chansonShow->user->id, ['controller' => 'Users', 'action' => 'view', $chansonShow->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($chansonShow->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creation') ?></th>
                    <td><?= h($chansonShow->creation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modification') ?></th>
                    <td><?= h($chansonShow->modification) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

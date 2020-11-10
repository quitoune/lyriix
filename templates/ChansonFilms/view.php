<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChansonFilm $chansonFilm
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Chanson Film'), ['action' => 'edit', $chansonFilm->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Chanson Film'), ['action' => 'delete', $chansonFilm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chansonFilm->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Chanson Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Chanson Film'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chansonFilms view content">
            <h3><?= h($chansonFilm->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Chanson') ?></th>
                    <td><?= $chansonFilm->has('chanson') ? $this->Html->link($chansonFilm->chanson->id, ['controller' => 'Chansons', 'action' => 'view', $chansonFilm->chanson->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Film') ?></th>
                    <td><?= $chansonFilm->has('film') ? $this->Html->link($chansonFilm->film->id, ['controller' => 'Films', 'action' => 'view', $chansonFilm->film->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Scene') ?></th>
                    <td><?= h($chansonFilm->scene) ?></td>
                </tr>
                <tr>
                    <th><?= __('Utilisateur') ?></th>
                    <td><?= $chansonFilm->has('utilisateur') ? $this->Html->link($chansonFilm->utilisateur->id, ['controller' => 'Utilisateurs', 'action' => 'view', $chansonFilm->utilisateur->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($chansonFilm->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creation') ?></th>
                    <td><?= h($chansonFilm->creation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modification') ?></th>
                    <td><?= h($chansonFilm->modification) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

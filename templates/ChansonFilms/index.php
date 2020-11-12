<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChansonFilm[]|\Cake\Collection\CollectionInterface $chansonFilms
 */
?>
<div class="chansonFilms index content">
    <?= $this->Html->link(__('New Chanson Film'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Chanson Films') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('chanson_id') ?></th>
                    <th><?= $this->Paginator->sort('film_id') ?></th>
                    <th><?= $this->Paginator->sort('scene') ?></th>
                    <th><?= $this->Paginator->sort('creation') ?></th>
                    <th><?= $this->Paginator->sort('modification') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chansonFilms as $chansonFilm): ?>
                <tr>
                    <td><?= $this->Number->format($chansonFilm->id) ?></td>
                    <td><?= $chansonFilm->has('chanson') ? $this->Html->link($chansonFilm->chanson->titre, ['controller' => 'Chansons', 'action' => 'view', $chansonFilm->chanson->slug]) : '' ?></td>
                    <td><?= $chansonFilm->has('film') ? $this->Html->link($chansonFilm->film->titre, ['controller' => 'Films', 'action' => 'view', $chansonFilm->film->slug]) : '' ?></td>
                    <td><?= h($chansonFilm->scene) ?></td>
                    <td><?= h($chansonFilm->creation) ?></td>
                    <td><?= h($chansonFilm->modification) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $chansonFilm->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $chansonFilm->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $chansonFilm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chansonFilm->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ') ?>
            <?= $this->Paginator->prev('< ') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(' >') ?>
            <?= $this->Paginator->last(' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

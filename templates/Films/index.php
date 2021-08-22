<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film[]|\Cake\Collection\CollectionInterface $films
 */
?>
<div class="films index content">
    <?= $this->Html->link(__('New Film'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Films') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('titre') ?></th>
                    <th><?= $this->Paginator->sort('realisateur') ?></th>
                    <th><?= $this->Paginator->sort('annee') ?></th>
                    <th><?= $this->Paginator->sort('modification') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($films as $film): ?>
                <tr>
                    <td><?= $this->Number->format($film->id) ?></td>
                    <td><?= h($film->titre) ?></td>
                    <td><?= h($film->realisateur) ?></td>
                    <td><?= h($film->annee) ?></td>
                    <td><?= h($film->modification) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $film->slug]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $film->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $film->id], ['confirm' => __('Are you sure you want to delete # {0}?', $film->id)]) ?>
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
        <p><?= $this->Paginator->counter(__('Showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

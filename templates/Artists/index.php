<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artist[]|\Cake\Collection\CollectionInterface $artists
 */
?>
<div class="artists index content">
    <?= $this->Html->link(__('New Artist'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Artists') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nom') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($artists as $artist): ?>
                <tr>
                    <td><?= $this->Number->format($artist->id) ?></td>
                    <td><?= h($artist->nom) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $artist->slug]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $artist->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $artist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artist->nom)]) ?>
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
        <p><?= $this->Paginator->counter(__('Showing {{current}} item(s) out of {{count}} total')) ?></p>
    </div>
</div>

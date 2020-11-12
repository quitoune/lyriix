<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Traduction[]|\Cake\Collection\CollectionInterface $traductions
 */
?>
<div class="traductions index content">
    <?= $this->Html->link(__('New Traduction'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Traductions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('chanson_id') ?></th>
                    <th><?= $this->Paginator->sort('langue_id') ?></th>
                    <th><?= $this->Paginator->sort('modification') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($traductions as $traduction): ?>
                <tr>
                    <td><?= $this->Number->format($traduction->id) ?></td>
                    <td><?= $traduction->has('chanson') ? $this->Html->link($traduction->chanson->titre, ['controller' => 'Chansons', 'action' => 'view', $traduction->chanson->slug]) : '' ?></td>
                    <td><?= $traduction->has('langue') ? $this->Html->link($traduction->langue->nom, ['controller' => 'Langues', 'action' => 'view', $traduction->langue->code]) : '' ?></td>
                    <td><?= h($traduction->modification) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $traduction->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $traduction->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $traduction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $traduction->id)]) ?>
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

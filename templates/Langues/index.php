<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Langue[]|\Cake\Collection\CollectionInterface $langues
 */
?>
<div class="langues index content">
    <?= $this->Html->link(__('New Langue'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Langues') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('nom') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($langues as $langue): ?>
                <tr>
                    <td><?= $this->Number->format($langue->id) ?></td>
                    <td><?= h($langue->code) ?></td>
                    <td><?= h($langue->nom) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $langue->code]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $langue->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $langue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $langue->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

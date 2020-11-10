<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chanson[]|\Cake\Collection\CollectionInterface $chansons
 */
?>
<div class="chansons index content">
    <?= $this->Html->link(__('New Chanson'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Chansons') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('titre') ?></th>
                    <th><?= $this->Paginator->sort('interprete') ?></th>
                    <th><?= $this->Paginator->sort('annee') ?></th>
                    <th><?= $this->Paginator->sort('modification') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chansons as $chanson): ?>
                <tr>
                    <td><?= $this->Number->format($chanson->id) ?></td>
                    <td><?= h($chanson->titre) ?></td>
                    <td><?= h($chanson->interprete) ?></td>
                    <td><?= h($chanson->annee) ?></td>
                    <td><?= h($chanson->modification) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $chanson->slug]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $chanson->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $chanson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chanson->id)]) ?>
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

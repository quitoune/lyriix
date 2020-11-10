<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChansonShow[]|\Cake\Collection\CollectionInterface $chansonShows
 */
?>
<div class="chansonShows index content">
    <?= $this->Html->link(__('New Chanson Show'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Chanson Shows') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('chanson_id') ?></th>
                    <th><?= $this->Paginator->sort('show_id') ?></th>
                    <th><?= $this->Paginator->sort('episode') ?></th>
                    <th><?= $this->Paginator->sort('scene') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chansonShows as $chansonShow): ?>
                <tr>
                    <td><?= $this->Number->format($chansonShow->id) ?></td>
                    <td><?= $chansonShow->has('chanson') ? $this->Html->link($chansonShow->chanson->id, ['controller' => 'Chansons', 'action' => 'view', $chansonShow->chanson->id]) : '' ?></td>
                    <td><?= $chansonShow->has('show') ? $this->Html->link($chansonShow->show->id, ['controller' => 'Shows', 'action' => 'view', $chansonShow->show->id]) : '' ?></td>
                    <td><?= h($chansonShow->episode) ?></td>
                    <td><?= h($chansonShow->scene) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $chansonShow->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $chansonShow->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $chansonShow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chansonShow->id)]) ?>
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

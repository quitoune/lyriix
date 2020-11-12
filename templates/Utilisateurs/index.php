<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Utilisateur[]|\Cake\Collection\CollectionInterface $utilisateurs
 */
?>
<div class="utilisateurs index content">
    <?= $this->Html->link(__('New Utilisateur'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Utilisateurs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('pseudo') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $utilisateur): ?>
                <tr>
                    <td><?= $this->Number->format($utilisateur->id) ?></td>
                    <td><?= h($utilisateur->pseudo) ?></td>
                    <td><?= h($utilisateur->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $utilisateur->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $utilisateur->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $utilisateur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utilisateur->id)]) ?>
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

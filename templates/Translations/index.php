<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Translation[]|\Cake\Collection\CollectionInterface $translations
 */
?>
<div class="translations index content">
    <?= $this->Html->link(__('New Translation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Translations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('song_id') ?></th>
                    <th><?= $this->Paginator->sort('langue_id') ?></th>
                    <th><?= $this->Paginator->sort('modification') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($translations as $translation): ?>
                <tr>
                    <td><?= $this->Number->format($translation->id) ?></td>
                    <td><?= $translation->has('song') ? $this->Html->link($translation->song->titre, ['controller' => 'Songs', 'action' => 'view', $translation->song->slug]) : '' ?></td>
                    <td><?= $translation->has('language') ? $this->Html->link($translation->language->nom, ['controller' => 'languages', 'action' => 'view', $translation->language->code]) : '' ?></td>
                    <td><?= h($translation->modification) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $translation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $translation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $translation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $translation->id)]) ?>
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

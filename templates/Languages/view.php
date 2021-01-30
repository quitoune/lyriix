<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $language
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Language'), ['action' => 'edit', $language->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Language'), ['action' => 'delete', $language->id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Languages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Language'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="languages view content">
            <h3><?= __('ID') . ': ' . h($language->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Code') . ': ' ?></th>
                    <td><?= h($language->code) ?></td>
                    <th><?= __('Nom') . ': ' ?></th>
                    <td><?= h($language->nom) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Translations') ?></h4>
                <?php if (count($language->translations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Song') ?></th>
                            <th><?= __('Auteur') ?></th>
                        </tr>
                        <?php foreach ($language->translations as $translation) : ?>
                        <tr>
                            <td><?= h($translation->id) ?></td>
                            <td><?= $this->Html->link($translation->song->titre, ['controller' => 'Songs', 'action' => 'view', $translation->song->slug]) ?></td>
                            <td><?= h($translation->auteur) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php else: ?>
                <span class="center"><?= __('No translations associated.'); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Utilisateur $utilisateur
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Utilisateur'), ['action' => 'edit', $utilisateur->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Utilisateur'), ['action' => 'delete', $utilisateur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utilisateur->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Utilisateurs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Utilisateur'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="utilisateurs view content">
            <h3><?= __('ID') . ': ' . h($utilisateur->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pseudo') ?></th>
                    <td><?= h($utilisateur->pseudo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($utilisateur->email) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

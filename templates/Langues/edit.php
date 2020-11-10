<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Langue $langue
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $langue->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $langue->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Langues'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="langues form content">
            <?= $this->Form->create($langue) ?>
            <fieldset>
                <legend><?= __('Edit Langue') ?></legend>
                <?php
                    echo $this->Form->control('code');
                    echo $this->Form->control('nom');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

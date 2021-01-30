<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Song[]|\Cake\Collection\CollectionInterface $songs
 */
?>
<div class="songs index content">
    <?= $this->Html->link(__('New Song'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Songs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('titre') ?></th>
                    <th><?= __('Artists') ?></th>
                    <th><?= $this->Paginator->sort('annee') ?></th>
                    <th><?= $this->Paginator->sort('modification') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($songs as $song): ?>
                <tr>
                    <td><?= $this->Number->format($song->id) ?></td>
                    <td><?= h($song->titre) ?></td>
                    <td>
                    	<?php 
                            $artists = array('featuring' => array(), 'main' => array());
                            foreach($song->artist_songs as $artist_song){
                                if($artist_song->featuring){
                                    $artists['featuring'][$artist_song->artist->slug] = $artist_song->artist->nom;
                                } else {
                                    $artists['main'][$artist_song->artist->slug] = $artist_song->artist->nom;
                                }
                            }
                        ?>
                    	<?= implode(', ', $artists['main']) . (count($artists['featuring']) ? ' feat. ' : '') . implode(', ', $artists['featuring']) ?>
                    </td>
                    <td><?= h($song->annee) ?></td>
                    <td><?= h($song->modification) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $song->slug]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $song->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $song->id], ['confirm' => __('Are you sure you want to delete # {0}?', $song->id)]) ?>
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

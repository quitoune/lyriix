<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chanson $chanson
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Chanson'), ['action' => 'edit', $chanson->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Chanson'), ['action' => 'delete', $chanson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chanson->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Chansons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Chanson'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chansons view content">
            <h3><?= __('ID') . ': ' . h($chanson->id) ?></h3>
            <table class="center">
                <tr>
                    <th><?= __('Titre') ?></th>
                    <th><?= __('Interprete') ?></th>
                    <th><?= __('Annee') ?></th>
                </tr>
                <tr>
                    <td><?= h($chanson->titre) ?></td>
                    <td><?= h($chanson->interprete) ?></td>
                    <td><?= h($chanson->annee) ?></td>
                </tr>
                <tr>
                    <th colspan="3"><?= __('Paroles') ?></th>
                </tr>
                <tr>
                    <td colspan="3"><?= preg_replace("#\\n#", "<br>", file_get_contents('resources/chansons/' . $chanson->paroles)) ?></td>
                </tr>
                <tr>
                	<td colspan="3">
                		<?= __('Créée le ') . h($chanson->creation->format('d/m/Y à H:i')) . __(' par ') . h($chanson->createur->pseudo) ?>
                	</td>
                </tr>
                <tr>
                	<td colspan="3">
                		<?= __('Dernière modification: ') . h($chanson->modification->format('d/m/Y H:i')) . ' (' . h($chanson->modificateur->pseudo) . ')' ?>
                	</td>
                </tr>
            </table>
            <div class="related">
                <h4>
                	<?= __('Related Chanson Films') ?>
                	<?= $this->Html->link('+', ['action' => 'addFilm', $chanson->slug, 'controller' => 'ChansonFilms']) ?>
                </h4>
                <?php if (count($chanson->chanson_films)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Film') ?></th>
                            <th><?= __('Scene') ?></th>
                        </tr>
                        <?php foreach ($chanson->chanson_films as $chansonFilm) : ?>
                        <tr>
                            <td><?= h($chansonFilm->id) ?></td>
                            <td><?= $this->Html->link(h($chansonFilm->film->titre), ['action' => 'view', $chansonFilm->film->slug, 'controller' => 'Films']) ?></td>
                            <td><?= h($chansonFilm->scene) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php else: ?>
                <span class="center"><?= __('No films associated.'); ?></span>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4>
                	<?= __('Related Chanson Shows') ?>
                	<?= $this->Html->link('+', ['action' => 'addShow', $chanson->slug, 'controller' => 'ChansonShows']) ?>
                </h4>
                <?php if (count($chanson->chanson_shows)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Show') ?></th>
                            <th><?= __('Episode') ?></th>
                            <th><?= __('Scene') ?></th>
                        </tr>
                        <?php foreach ($chanson->chanson_shows as $chansonShow) : ?>
                        <tr>
                            <td><?= h($chansonShow->id) ?></td>
                            <td><?= $this->Html->link(h($chansonShow->show->titre), ['action' => 'view', $chansonShow->show->slug, 'controller' => 'Shows']) ?></td>
                            <td><?= h($chansonShow->episode) ?></td>
                            <td><?= h($chansonShow->scene) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php else: ?>
                <span class="center"><?= __('No traductions associated.'); ?></span>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Traductions') ?></h4>
                <?php if (count($chanson->traductions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Langue') ?></th>
                            <th><?= __('Texte') ?></th>
                            <th><?= __('Auteur') ?></th>
                        </tr>
                        <?php foreach ($chanson->traductions as $traduction) : ?>
                        <tr>
                            <td><?= h($traduction->id) ?></td>
                            <td><?= h($traduction->langue->nom) ?></td>
                            <td>
                            	<a data-id="<?= h($traduction->id) ?>" class="show_traduction">
                            		<?= __('Show the translation') ?>
                            	</a>
                            </td>
                            <td><?= h($traduction->auteur) ?></td>
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

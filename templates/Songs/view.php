<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Song $song
 * @var array $artists
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Song'), ['action' => 'edit', $song->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Song'), ['action' => 'delete', $song->id], ['confirm' => __('Are you sure you want to delete # {0}?', $song->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Song'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="songs view content">
            <h3><?= __('ID') . ': ' . h($song->id) ?></h3>
            <table class="center">
                <tr>
                    <th><?= __('Titre') ?></th>
                    <th><?= __('Annee') ?></th>
                </tr>
                <tr>
                    <td><?= h($song->titre) ?></td>
                    <td><?= h($song->annee) ?></td>
                </tr>
                <tr>
                    <th colspan="2"><?= __('Lyrics') ?></th>
                </tr>
                <tr>
                    <td colspan="2"><?= implode(', ', $artists['main']) . (count($artists['featuring']) ? ' feat. ' : '') . implode(', ', $artists['featuring']) ?></td>
                </tr>
                <tr>
                    <th colspan="2"><?= __('Artists') ?></th>
                </tr>
                <tr>
                    <td colspan="2"><?= preg_replace("#\\n#", "<br>", $song->paroles) ?></td>
                </tr>
                <tr>
                	<td colspan="2">
                		<?= __('Créée le ') . h($song->creation->format('d/m/Y à H:i')) . __(' par ') . h($song->createur->pseudo) ?>
                	</td>
                </tr>
                <tr>
                	<td colspan="2">
                		<?= __('Dernière modification: ') . h($song->modification->format('d/m/Y H:i')) . ' (' . h($song->modificateur->pseudo) . ')' ?>
                	</td>
                </tr>
            </table>
            <div class="related">
                <h4>
                	<?= __('Related Films') ?>
                	<?= $this->Html->link('+', ['action' => 'addFilm', $song->slug, 'controller' => 'FilmSongs']) ?>
                </h4>
                <?php if (count($song->film_songs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Film') ?></th>
                            <th><?= __('Scene') ?></th>
                        </tr>
                        <?php foreach ($song->film_songs as $filmSong) : ?>
                        <tr>
                            <td><?= h($filmSong->id) ?></td>
                            <td><?= $this->Html->link(h($filmSong->film->titre), ['action' => 'view', $filmSong->film->slug, 'controller' => 'Films']) ?></td>
                            <td><?= h($filmSong->scene) ?></td>
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
                	<?= __('Related Shows') ?>
                	<?= $this->Html->link('+', ['action' => 'addShow', $song->slug, 'controller' => 'ShowSongs']) ?>
                </h4>
                <?php if (count($song->show_songs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Show') ?></th>
                            <th><?= __('Episode') ?></th>
                            <th><?= __('Scene') ?></th>
                        </tr>
                        <?php foreach ($song->show_songs as $showSong) : ?>
                        <tr>
                            <td><?= h($showSong->id) ?></td>
                            <td><?= $this->Html->link(h($showSong->show->titre), ['action' => 'view', $showSong->show->slug, 'controller' => 'Shows']) ?></td>
                            <td><?= h('S' . ($showSong->saison < 10 ? '0' : '') . $showSong->saison . 'E' . ($showSong->episode < 10 ? '0' : '') . $showSong->episode) ?></td>
                            <td><?= h($showSong->scene) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php else: ?>
                <span class="center"><?= __('No translations associated.'); ?></span>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Translations') ?></h4>
                <?php if (count($song->translations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Language') ?></th>
                            <th><?= __('Paroles') ?></th>
                            <th><?= __('Auteur') ?></th>
                        </tr>
                        <?php foreach ($song->translations as $translation) : ?>
                        <tr>
                            <td><?= h($translation->id) ?></td>
                            <td><?= h($translation->language->nom) ?></td>
                            <td>
                            	<a data-id="<?= h($translation->id) ?>" class="show_translation">
                            		<?= __('Show the translation') ?>
                            	</a>
                            </td>
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

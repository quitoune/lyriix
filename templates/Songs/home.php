<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Song[]|\Cake\Collection\CollectionInterface $songs
 */

$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= __('Home') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['family', 'normalize.min', 'milligram.min', 'cake', 'home', 'lyriix', 'palette']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <?= $this->Html->image('logo.png', ['alt' => 'Lyriix', 'width' => '350']); ?>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="column">
                    	<h3><?= __('Last song added') ?></h3>
                    </div>
                </div>
                <div class="row line">
                	<?php foreach ($songs as $song): ?>
                		<div class="col-3">
                			<?= urldecode($this->Html->link($song->titre, ['action' => 'view', $song->slug, 'controller' => 'Songs'])) ?>
                		</div>
                	<?php endforeach; ?>
                </div>
                <hr>
                <div class="row">
                    <div class="column">
                        <h3><?= __('Elements') ?></h3>
                        <ul>
                        <li><?= $this->Html->link(__('Songs'), ['action' => 'index', 'controller' => 'Songs']) ?></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h3 style="color: white;"><?= __('Elements') ?></h3>
                        <ul>
                        <li><?= $this->Html->link(__('Artists'), ['action' => 'index', 'controller' => 'Artists']) ?></li>
                        <li><?= $this->Html->link(__('Artists Songs'), ['action' => 'index', 'controller' => 'ArtistSongs']) ?></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h3 style="color: white;"><?= __('Elements') ?></h3>
                        <ul>
                        <li><?= $this->Html->link(__('Films'), ['action' => 'index', 'controller' => 'Films']) ?></li>
                        <li><?= $this->Html->link(__('Films Songs'), ['action' => 'index', 'controller' => 'FilmSongs']) ?></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h3 style="color: white;"><?= __('Elements') ?></h3>
                        <ul>
                        <li><?= $this->Html->link(__('Shows'), ['action' => 'index', 'controller' => 'Shows']) ?></li>
                        <li><?= $this->Html->link(__('Songs Shows'), ['action' => 'index', 'controller' => 'ShowSongs']) ?></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h3 style="color: white;"><?= __('Elements') ?></h3>
                        <ul>
                        <li><?= $this->Html->link(__('Translations'), ['action' => 'index', 'controller' => 'Translations']) ?></li>
                        <li><?= $this->Html->link(__('Users'), ['action' => 'index', 'controller' => 'Users']) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

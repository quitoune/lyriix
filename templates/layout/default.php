<?php
use App\Model\Entity\User;

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 * @var string $title
 * @var User $utilisateur
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    	<?php if (isset($title)): ?>
        <?= $title ?>
        <?php else: ?>
        Lyriix
        <?php endif; ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['family', 'normalize.min', 'milligram.min', 'cake', 'select2.min', 'lyriix', 'palette']) ?>
    <?= $this->Html->script(['jquery-3.3.1.min', 'select2.full.min', 'lyriix']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Ly</span>riix</a>
        </div>
        <div class="top-nav-links">
        	<?php if (isset($utilisateur)): ?>
        	<?= $utilisateur->pseudo ?>
            <?= $this->Html->link(__('Logout'), ['action' => 'logout', 'controller' => 'Users']) ?>
            <?php else: ?>
            <?= $this->Html->link(__('Login'), ['action' => 'login', 'controller' => 'Users']) ?>
        	<?php endif; ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>

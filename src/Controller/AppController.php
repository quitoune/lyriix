<?php
declare(strict_types=1);

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
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Controller\Component\AuthComponent;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authorize'=> 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'pseudo',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // Si pas autorisé, on renvoit sur la page précédente
            'unauthorizedRedirect' => $this->referer()
        ]);
        
        // Permet à l'action "display" de notre PagesController de continuer
        // à fonctionner. Autorise également les actions "read-only".
        $this->Auth->allow(['display', 'view', 'index', 'home', 'add', 'edit', 'delete']);
        $this->Auth->allow(['addShow', 'showView', 'addFilm', 'showFilm']);
        $this->Auth->allow(['logout', 'login', 'languageView']);
    }
    
    public function createSlug(string $title): string
    {
        $slug = htmlentities($title, ENT_NOQUOTES, "utf-8" );
        
        $slug = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $slug);
        $slug = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $slug);
        $slug = preg_replace('#&[^;]+;#', '', $slug);
        
        $slug = str_replace(array("/", "\\", "'"), '-', $slug);
        $slug = str_replace(array("?", ",", "(", ")", ":", "[", "]", '"'), '', $slug);
        $slug = trim($slug);
        $slug = implode("_", explode(' ', $slug));
        
        return $slug;
    }
    
    public function isAuthorized($user)
    {
        // Par défaut, on refuse l'accès.
        return false;
    }
    
    public function updateModification($info): array
    {
        $date = date("Y-m-d H:i:s");
        $data = $info;
        $data['modification'] = $date;
        $data['modificateur_id'] = 1;
//         $data['modificateur_id'] = $this->Auth->user('id');
        
        return $data;
    }
    
    public function preCreationObjet($info): array
    {
        $date = date("Y-m-d H:i:s");
        $data = $info;
        $data['creation'] = $date;
        $data['modification'] = $date;
        $data['createur_id'] = 1;
        $data['modificateur_id'] = 1;
//         $data['createur_id'] = $this->Auth->user('id');
//         $data['modificateur_id'] = $this->Auth->user('id');
        
        return $data;
    }
}

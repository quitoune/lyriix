<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/4/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
    {
    }
    
    public function createSelect($data, $options = array()): string
    {
        $opt['id'] = '';
        $opt['name'] = '';
        $opt['classe'] = '';
        $opt['label'] = '';
        $opt['multiple'] = false;
        $opt['default'] = true;
        $opt['change'] = false;
        
        foreach($options as $key => $value){
            if(isset($opt[$key])){
                $opt[$key] = $value;
            }
        }
        
        $select = '<div class="input select">';
        $select .=  '<label for="' . $opt['id'] . '">' . $opt['label'] . '</label>';
        $select .=   '<select name="' . $opt['name'] . '" class="' . $opt['classe'] . '" id="' . $opt['id'] . '" ' . ($opt['multiple'] ? 'multiple' : '') . ($opt['change'] ? ' onchange="' . $opt['change'] . '"' : '') . '>';
        if($opt['default']){
            $select .=   '<option></option>';
        }
        foreach($data as $id => $nom){
            $select .=   '<option value="' . $id . '">' . $nom . '</option>';
        }
        $select .=   '</select>';
        $select .=   '</div>';
        
        return $select;
    }
}

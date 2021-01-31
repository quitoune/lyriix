<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;


class AppTable extends Table
{
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
        return true;
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
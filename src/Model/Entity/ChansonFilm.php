<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ChansonFilm Entity
 *
 * @property int $id
 * @property int $chanson_id
 * @property int $film_id
 * @property string|null $scene
 * @property \Cake\I18n\FrozenTime|null $creation
 * @property \Cake\I18n\FrozenTime|null $modification
 * @property int|null $createur_id
 * @property int|null $modificateur_id
 *
 * @property \App\Model\Entity\Chanson $chanson
 * @property \App\Model\Entity\Film $film
 * @property \App\Model\Entity\User $createur
 * @property \App\Model\Entity\User $modificateur
 */
class ChansonFilm extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'chanson_id' => true,
        'film_id' => true,
        'scene' => true,
        'creation' => true,
        'modification' => true,
        'createur_id' => true,
        'modificateur_id' => true,
        'createur' => true,
        'modificateur' => true,
        'chanson' => true,
        'film' => true,
    ];
}

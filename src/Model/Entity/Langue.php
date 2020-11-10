<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Langue Entity
 *
 * @property int $id
 * @property string $code
 * @property string $nom
 *
 * @property \App\Model\Entity\Traduction[] $traductions
 */
class Langue extends Entity
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
        'code' => true,
        'nom' => true,
        'traductions' => true,
    ];
}

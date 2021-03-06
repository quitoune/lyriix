<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShowSong Entity
 *
 * @property int $id
 * @property int $song_id
 * @property int $show_id
 * @property int $saison
 * @property int $episode
 * @property string|null $scene
 * @property \Cake\I18n\FrozenTime|null $creation
 * @property \Cake\I18n\FrozenTime|null $modification
 * @property int|null $createur_id
 * @property int|null $modificateur_id
 *
 * @property \App\Model\Entity\Song $song
 * @property \App\Model\Entity\Show $show
 * @property \App\Model\Entity\User $createur
 * @property \App\Model\Entity\User $modificateur
 */
class ShowSong extends Entity
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
        'song_id' => true,
        'show_id' => true,
        'saison' => true,
        'episode' => true,
        'scene' => true,
        'creation' => true,
        'modification' => true,
        'createur_id' => true,
        'modificateur_id' => true,
        'createur' => true,
        'modificateur' => true,
        'song' => true,
        'show' => true,
    ];
}

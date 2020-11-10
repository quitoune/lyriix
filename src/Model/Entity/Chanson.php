<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chanson Entity
 *
 * @property int $id
 * @property string $slug
 * @property string $titre
 * @property string|null $interprete
 * @property int $annee
 * @property string|null $paroles
 * @property \Cake\I18n\FrozenTime|null $creation
 * @property \Cake\I18n\FrozenTime|null $modification
 * @property int|null $createur_id
 * @property int|null $modificateur_id
 *
 * @property \App\Model\Entity\Utilisateur $createur
 * @property \App\Model\Entity\Utilisateur $modificateur
 * @property \App\Model\Entity\ChansonFilm[] $chanson_films
 * @property \App\Model\Entity\ChansonShow[] $chanson_shows
 * @property \App\Model\Entity\Traduction[] $traductions
 */
class Chanson extends Entity
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
        'slug' => true,
        'titre' => true,
        'interprete' => true,
        'annee' => true,
        'paroles' => true,
        'creation' => true,
        'modification' => true,
        'createur_id' => true,
        'modificateur_id' => true,
        'createur' => true,
        'modificateur' => true,
        'chanson_films' => true,
        'chanson_shows' => true,
        'traductions' => true,
    ];
}

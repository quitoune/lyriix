<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Song Entity
 *
 * @property int $id
 * @property string $slug
 * @property string $titre
 * @property int $annee
 * @property string|null $paroles
 * @property \Cake\I18n\FrozenTime|null $creation
 * @property \Cake\I18n\FrozenTime|null $modification
 * @property int|null $createur_id
 * @property int|null $modificateur_id
 *
 * @property \App\Model\Entity\User $createur
 * @property \App\Model\Entity\User $modificateur
 * @property \App\Model\Entity\ArtistSong[] $artist_songs
 * @property \App\Model\Entity\FilmSong[] $film_songs
 * @property \App\Model\Entity\ShowSong[] $show_songs
 * @property \App\Model\Entity\Traduction[] $traductions
 */
class Song extends Entity
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
        'annee' => true,
        'paroles' => true,
        'creation' => true,
        'modification' => true,
        'createur_id' => true,
        'modificateur_id' => true,
        'createur' => true,
        'modificateur' => true,
        'artist_songs' => true,
        'film_songs' => true,
        'show_songs' => true,
        'translations' => true,
    ];
}

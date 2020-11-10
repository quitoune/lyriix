<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TraductionsFixture
 */
class TraductionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'chanson_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'langue_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'texte' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'auteur' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'creation' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'modification' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'createur_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modificateur_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'traduction_chanson' => ['type' => 'index', 'columns' => ['chanson_id'], 'length' => []],
            'traduction_langue' => ['type' => 'index', 'columns' => ['langue_id'], 'length' => []],
            'traduction_createur' => ['type' => 'index', 'columns' => ['createur_id'], 'length' => []],
            'traduction_modificateur' => ['type' => 'index', 'columns' => ['modificateur_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'traduction_modificateur' => ['type' => 'foreign', 'columns' => ['modificateur_id'], 'references' => ['utilisateurs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'traduction_langue' => ['type' => 'foreign', 'columns' => ['langue_id'], 'references' => ['langues', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'traduction_createur' => ['type' => 'foreign', 'columns' => ['createur_id'], 'references' => ['utilisateurs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'traduction_chanson' => ['type' => 'foreign', 'columns' => ['chanson_id'], 'references' => ['chansons', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'chanson_id' => 1,
                'langue_id' => 1,
                'texte' => 'Lorem ipsum dolor sit amet',
                'auteur' => 'Lorem ipsum dolor sit amet',
                'creation' => '2020-11-10 19:40:04',
                'modification' => '2020-11-10 19:40:04',
                'createur_id' => 1,
                'modificateur_id' => 1,
            ],
        ];
        parent::init();
    }
}

<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChansonShowsFixture
 */
class ChansonShowsFixture extends TestFixture
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
        'show_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'episode' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'scene' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'creation' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'modification' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'createur_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modificateur_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'chanson_show_chanson' => ['type' => 'index', 'columns' => ['chanson_id'], 'length' => []],
            'chanson_show_show' => ['type' => 'index', 'columns' => ['show_id'], 'length' => []],
            'chanson_show_createur' => ['type' => 'index', 'columns' => ['createur_id'], 'length' => []],
            'chanson_show_modificateur' => ['type' => 'index', 'columns' => ['modificateur_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'chanson_show_show' => ['type' => 'foreign', 'columns' => ['show_id'], 'references' => ['shows', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'chanson_show_modificateur' => ['type' => 'foreign', 'columns' => ['modificateur_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'chanson_show_createur' => ['type' => 'foreign', 'columns' => ['createur_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'chanson_show_chanson' => ['type' => 'foreign', 'columns' => ['chanson_id'], 'references' => ['chansons', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'show_id' => 1,
                'episode' => 'Lorem ip',
                'scene' => 'Lorem ipsum dolor sit amet',
                'creation' => '2020-11-10 19:39:26',
                'modification' => '2020-11-10 19:39:26',
                'createur_id' => 1,
                'modificateur_id' => 1,
            ],
        ];
        parent::init();
    }
}

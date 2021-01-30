<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilmSongsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilmSongsTable Test Case
 */
class FilmSongsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FilmSongsTable
     */
    protected $FilmSongs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FilmSongs',
        'app.Songs',
        'app.Films',
        'app.Createurs',
        'app.Modificateurs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FilmSongs') ? [] : ['className' => FilmSongsTable::class];
        $this->FilmSongs = $this->getTableLocator()->get('FilmSongs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FilmSongs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

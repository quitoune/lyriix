<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArtistSongsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArtistSongsTable Test Case
 */
class ArtistSongsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArtistSongsTable
     */
    protected $ArtistSongs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ArtistSongs',
        'app.Artists',
        'app.Songs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ArtistSongs') ? [] : ['className' => ArtistSongsTable::class];
        $this->ArtistSongs = $this->getTableLocator()->get('ArtistSongs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ArtistSongs);

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

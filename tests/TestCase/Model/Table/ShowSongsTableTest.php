<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShowSongsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShowSongsTable Test Case
 */
class ShowSongsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShowSongsTable
     */
    protected $ShowSongs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ShowSongs',
        'app.Songs',
        'app.Shows',
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
        $config = $this->getTableLocator()->exists('ShowSongs') ? [] : ['className' => ShowSongsTable::class];
        $this->ShowSongs = $this->getTableLocator()->get('ShowSongs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ShowSongs);

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

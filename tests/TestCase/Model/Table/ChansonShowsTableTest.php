<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChansonShowsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChansonShowsTable Test Case
 */
class ChansonShowsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChansonShowsTable
     */
    protected $ChansonShows;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ChansonShows',
        'app.Chansons',
        'app.Shows',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ChansonShows') ? [] : ['className' => ChansonShowsTable::class];
        $this->ChansonShows = $this->getTableLocator()->get('ChansonShows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ChansonShows);

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

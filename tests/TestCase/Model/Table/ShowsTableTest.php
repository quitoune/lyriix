<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShowsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShowsTable Test Case
 */
class ShowsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShowsTable
     */
    protected $Shows;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Shows',
        'app.Utilisateurs',
        'app.ChansonShows',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Shows') ? [] : ['className' => ShowsTable::class];
        $this->Shows = $this->getTableLocator()->get('Shows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Shows);

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

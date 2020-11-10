<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChansonsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChansonsTable Test Case
 */
class ChansonsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChansonsTable
     */
    protected $Chansons;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Chansons',
        'app.Utilisateurs',
        'app.ChansonFilms',
        'app.ChansonShows',
        'app.Traductions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Chansons') ? [] : ['className' => ChansonsTable::class];
        $this->Chansons = $this->getTableLocator()->get('Chansons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Chansons);

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

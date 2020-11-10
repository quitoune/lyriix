<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChansonFilmsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChansonFilmsTable Test Case
 */
class ChansonFilmsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChansonFilmsTable
     */
    protected $ChansonFilms;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ChansonFilms',
        'app.Chansons',
        'app.Films',
        'app.Utilisateurs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ChansonFilms') ? [] : ['className' => ChansonFilmsTable::class];
        $this->ChansonFilms = $this->getTableLocator()->get('ChansonFilms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ChansonFilms);

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
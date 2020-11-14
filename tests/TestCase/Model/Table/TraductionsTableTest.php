<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TraductionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TraductionsTable Test Case
 */
class TraductionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TraductionsTable
     */
    protected $Traductions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Traductions',
        'app.Chansons',
        'app.Langues',
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
        $config = $this->getTableLocator()->exists('Traductions') ? [] : ['className' => TraductionsTable::class];
        $this->Traductions = $this->getTableLocator()->get('Traductions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Traductions);

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

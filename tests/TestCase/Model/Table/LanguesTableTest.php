<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LanguesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LanguesTable Test Case
 */
class LanguesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LanguesTable
     */
    protected $Langues;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Langues',
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
        $config = $this->getTableLocator()->exists('Langues') ? [] : ['className' => LanguesTable::class];
        $this->Langues = $this->getTableLocator()->get('Langues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Langues);

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
}

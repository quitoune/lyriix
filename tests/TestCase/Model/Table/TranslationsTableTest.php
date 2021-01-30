<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TranslationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TranslationsTable Test Case
 */
class TranslationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TranslationsTable
     */
    protected $Translations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Translations',
        'app.Songs',
        'app.Languages',
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
        $config = $this->getTableLocator()->exists('Translations') ? [] : ['className' => TranslationsTable::class];
        $this->Translations = $this->getTableLocator()->get('Translations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Translations);

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

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssetsTypeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssetsTypeTable Test Case
 */
class AssetsTypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AssetsTypeTable
     */
    protected $AssetsType;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AssetsType',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AssetsType') ? [] : ['className' => AssetsTypeTable::class];
        $this->AssetsType = $this->getTableLocator()->get('AssetsType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AssetsType);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AssetsTypeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

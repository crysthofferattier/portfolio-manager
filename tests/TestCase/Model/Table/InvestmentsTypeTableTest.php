<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvestmentsTypeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvestmentsTypeTable Test Case
 */
class InvestmentsTypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InvestmentsTypeTable
     */
    protected $InvestmentsType;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.InvestmentsType',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('InvestmentsType') ? [] : ['className' => InvestmentsTypeTable::class];
        $this->InvestmentsType = $this->getTableLocator()->get('InvestmentsType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->InvestmentsType);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InvestmentsTypeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

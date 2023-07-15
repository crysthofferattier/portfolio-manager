<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvestmentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvestmentsTable Test Case
 */
class InvestmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InvestmentsTable
     */
    protected $Investments;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Investments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Investments') ? [] : ['className' => InvestmentsTable::class];
        $this->Investments = $this->getTableLocator()->get('Investments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Investments);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InvestmentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

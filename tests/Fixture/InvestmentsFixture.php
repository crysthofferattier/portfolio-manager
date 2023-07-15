<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvestmentsFixture
 */
class InvestmentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'symbol' => 'Lorem ip',
                'quantity' => 1.5,
                'value' => 1.5,
                'total' => 1.5,
                'trade_date' => '2023-06-27',
                'type_id' => 1,
                'created' => '2023-06-27 22:42:05',
            ],
        ];
        parent::init();
    }
}

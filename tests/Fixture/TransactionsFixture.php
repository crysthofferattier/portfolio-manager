<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionsFixture
 */
class TransactionsFixture extends TestFixture
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
                'asset_id' => 1,
                'user_id' => 1,
                'quantity' => 1.5,
                'value' => 1.5,
                'total' => 1.5,
                'trade_date' => '2023-08-21',
                'created' => '2023-08-21 21:24:11',
            ],
        ];
        parent::init();
    }
}

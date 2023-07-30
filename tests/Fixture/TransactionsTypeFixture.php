<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionsTypeFixture
 */
class TransactionsTypeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'transactions_type';
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
                'created' => '2023-07-30 20:45:49',
            ],
        ];
        parent::init();
    }
}

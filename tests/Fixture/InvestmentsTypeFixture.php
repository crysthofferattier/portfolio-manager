<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvestmentsTypeFixture
 */
class InvestmentsTypeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'investments_type';
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
                'created' => '2023-06-27 22:54:29',
            ],
        ];
        parent::init();
    }
}

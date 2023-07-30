<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DividendsFixture
 */
class DividendsFixture extends TestFixture
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
                'date' => '2023-07-30',
                'value' => 1.5,
            ],
        ];
        parent::init();
    }
}

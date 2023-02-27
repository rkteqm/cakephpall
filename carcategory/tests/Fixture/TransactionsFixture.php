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
                'car_id' => 1,
                'user_id' => 1,
                'transaction_id' => 'Lorem ipsum dolor sit amet',
                'currency' => 'Lorem ipsum dolor sit amet',
                'amount' => 1,
                'amount_captured' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2023-02-24 14:24:26',
            ],
        ];
        parent::init();
    }
}

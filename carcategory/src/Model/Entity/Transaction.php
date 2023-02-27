<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $car_id
 * @property int $user_id
 * @property string $transaction_id
 * @property string $currency
 * @property int $amount
 * @property int $amount_captured
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created_at
 *
 * @property \App\Model\Entity\Car $car
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Transaction extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'car_id' => true,
        'user_id' => true,
        'transaction_id' => true,
        'currency' => true,
        'amount' => true,
        'amount_captured' => true,
        'status' => true,
        'created_at' => true,
        'car' => true,
        'user' => true,
        'transactions' => true,
    ];
}
